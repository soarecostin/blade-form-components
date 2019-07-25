<?php

namespace SoareCostin\BladeFormComponents;

use SoareCostin\BladeFormComponents\Traits\GluesAttributes;

abstract class FormElement
{
    use GluesAttributes;

    /** @var \Illuminate\Support\Collection */
    protected $params;

    /** @var Form */
    protected $form;

    /** @var object */
    public $model = null;

    /** @var string */
    public $id;

    /** @var string */
    public $name = '';

    /** @var mixed */
    public $value;

    /** @var string */
    public $label = '';

    /** @var array */
    public $class = [];

    /** @var array */
    public $labelClass = [];

    /** @var bool */
    public $required = false;

    /** @var bool */
    public $disabled = false;

    /** @var bool */
    public $readonly = false;

    /** @var string */
    public $autocomplete = 'off';

    /** @var string */
    public $desc;

    /** @var string */
    public $help;

    /** @var array */
    public $addons;

    public function __construct(array $params)
    {
        $this->params = collect($params);

        $this->setForm();
        $this->setModel();
        $this->setCommonAttributes();
        $this->setSpecificAttributes();
        $this->setStyles();
    }

    public function getId()
    {
        return md5(serialize($this));
    }

    public function getTheme()
    {
        return optional($this->form)->theme ?? config('blade-form-components.theme');
    }

    public function getErrors()
    {
        return $this->form->errors;
    }

    protected function setForm()
    {
        $this->form = app(Form::class);
    }

    protected function setModel()
    {
        $this->model = $this->params->get('model', $this->form->model);
    }

    protected function setCommonAttributes()
    {
        $this->setName();
        $this->setLabel();
        $this->setValue();
        $this->setClass();
        $this->setRequired();
        $this->setDisabled();
        $this->setReadonly();
        $this->setAutocomplete();
        $this->setDesc();
        $this->setHelp();
        $this->setAddons();
    }

    protected function setSpecificAttributes()
    {
        // ...
    }

    protected function setStyles()
    {
        // ...
    }

    protected function setName()
    {
        $this->name = $this->id = $this->params->get('name');
    }

    protected function setLabel()
    {
        // Check if we receive a label that is false, so we don't display it
        if ($this->params->get('label') === false) {
            $this->label = '';

            return;
        }

        // Fallback: construct the label from the name
        $fallbackLabel = ! empty($this->name) ? ucwords(str_replace('_', ' ', $this->name)) : '';

        // Check if we receive an explicit label
        $this->label = $this->params->get('label', $fallbackLabel);
    }

    protected function setRequired()
    {
        $this->required = $this->params->get('required', false);
    }

    protected function setDisabled()
    {
        $this->disabled = $this->params->get('disabled', false);
    }

    protected function setReadonly()
    {
        $this->readonly = $this->params->get('readonly', false);
    }

    protected function setValue()
    {
        if (empty($this->name)) {
            return;
        }

        $this->value = $this->params->get('value');

        if (! is_null($this->value)) {
            $computedValue = $this->value;
        } elseif (! is_null($this->model) && isset($this->model->{str_replace('[]', '', $this->name)})) {
            $computedValue = $this->model->{str_replace('[]', '', $this->name)};
        }

        $this->value = old($this->name, $computedValue ?? '');
    }

    protected function setAutocomplete()
    {
        // Set default autocomplete option (on/off) from cofing file
        $this->autocomplete = $this->params->get('autocomplete', config('blade-form-components.autocomplete'));
    }

    protected function setDesc()
    {
        $this->desc = $this->params->get('desc');
    }

    protected function setHelp()
    {
        $this->help = $this->params->get('help');
    }

    protected function setAddons()
    {
        $this->addons = $this->params->get('addons');
    }

    protected function setClass()
    {
        // Attach the error class if an error is displayed against this field
        if (! empty($this->name) && $this->form->errors->has($this->name)) {
            $this->class[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.is-error');
        }

        // Attach other user-defined classes
        if ($this->params->has('class')) {
            $this->class[] = $this->params->get('class');
        }
    }

    protected function customAttributes()
    {
        // Additional, custom attributes set by the user (eg: data, v-model)
        $customAttributes = $this->params->get('attributes', []);

        return isset($customAttributes['input'])
                ? $customAttributes['input']
                : [];
    }
}
