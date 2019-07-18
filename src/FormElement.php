<?php

namespace SoareCostin\BladeFormComponents;

use Illuminate\Support\ViewErrorBag;
use SoareCostin\BladeFormComponents\Traits\GluesAttributes;

abstract class FormElement
{
    use GluesAttributes;

    /** @var array */
    protected $params;

    /** @var Form */
    protected $form;

    /** @var object */
    public $model = null;

    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var mixed */
    public $value;

    /** @var string */
    public $label;

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

    /** @var bool */
    public $autocomplete;

    /** @var string */
    public $desc;

    /** @var string */
    public $help;

    public function __construct(array $params)
    {
        $this->params = $params;

        $this->setForm();
        $this->setModel();
        $this->setCommonAttributes();
        $this->setSpecificAttributes();
    }

    protected function setForm()
    {
        $this->form = app(Form::class);
    }

    protected function setModel()
    {
        if (isset($this->params['model']) && ! empty($this->params['model'])) {
            $this->model = $this->params['model'];
        }

        // Check to see if the model was added on the form opening tag
        if (is_null($this->model) && ! is_null($this->form->model)) {
            $this->model = $this->form->model;
        }
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
    }

    protected function setSpecificAttributes()
    {
        // ...
    }

    protected function setName()
    {
        if (isset($this->params['name']) && ! empty($this->params['name'])) {
            $this->name = $this->id = $this->params['name'];
        }
    }

    protected function setLabel()
    {
        // First, check if we receive an explicit label
        if (isset($this->params['label']) && ! empty($this->params['label'])) {
            $this->label = $this->params['label'];

            return;
        }

        // Check if we receive a label that is false, so we don't display it
        if (isset($this->params['label']) && $this->params['label'] === false) {
            $this->label = false;

            return;
        }

        // Fallback: construct the label from the name
        if (isset($this->name)) {
            $this->label = ucwords(str_replace('_', ' ', $this->name));
        }
    }

    protected function setRequired()
    {
        if (isset($this->params['required']) && $this->params['required'] == true) {
            $this->required = true;
        }
    }

    protected function setDisabled()
    {
        if (isset($this->params['disabled']) && $this->params['disabled'] == true) {
            $this->disabled = true;
        }
    }

    protected function setReadonly()
    {
        if (isset($this->params['readonly']) && $this->params['readonly'] == true) {
            $this->readonly = true;
        }
    }

    protected function setValue()
    {
        if (is_null($this->name)) {
            return;
        }

        if (! is_null($this->value)) {
            $computedValue = $this->value;
        } elseif (! is_null($this->model) && isset($this->model->{str_replace('[]', '', $this->name)})) {
            $computedValue = $this->model->{str_replace('[]', '', $this->name)};
        }

        $this->value = old($this->name, $computedValue ?? '');
    }

    protected function setAutocomplete()
    {
        // Set default autocomplete option (true/false) from cofing file
        $this->autocomplete = config('blade-form-components.autocomplete');

        if (isset($this->params['autocomplete'])) {
            $this->autocomplete = $this->params['autocomplete'];
        }
    }

    protected function setDesc()
    {
        if (isset($this->params['desc'])) {
            $this->desc = $this->params['desc'];
        }
    }

    protected function setHelp()
    {
        if (isset($this->params['help'])) {
            $this->help = $this->params['help'];
        }
    }

    protected function setClass()
    {
        $this->setDefaultClass();

        // Attach the error class if an error is displayed against this field
        $errors = session()->get('errors', app(ViewErrorBag::class));
        if ($errors->has($this->name)) {
            $this->class[] = config('blade-form-components.styles.field.error');
        }

        // Attach other user-defined classes
        if (isset($this->params['class'])) {
            $this->class[] = $this->params['class'];
        }
    }

    protected function setDefaultClass()
    {
        // Default class applied to all form elements (Eg 'form-control' for Bootstrap)
        $this->class[] = config('blade-form-components.styles.field.input');
    }

    protected function customAttributes()
    {
        // Additional, custom attributes set by the user (eg: data, v-model)
        
        if (isset($this->params['attributes']['input']) && ! empty($this->params['attributes']['input'])) {
            return $this->params['attributes']['input'];
        }
        return [];
    }
}
