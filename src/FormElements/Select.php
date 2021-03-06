<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Select extends FormElement
{
    /** @var array */
    public $options = [];

    /** @var bool */
    public $multiple = false;

    /** @var string */
    public $nulloption;

    /** @var array */
    public $selected = [];

    protected function attributesList()
    {
        return [
            'id', 'name', 'class', 'multiple', 'required', 'disabled', 'readonly', 'autocomplete',
        ];
    }

    protected function setSpecificAttributes()
    {
        $this->setOptions();
        $this->setNulloption();
        $this->setMultiple();
    }

    protected function setOptions()
    {
        if (isset($this->params['options']) && ! empty($this->params['options'])) {
            $this->options = $this->params['options'];

            foreach ($this->options as $value => $label) {
                if (is_array($this->value)) {
                    if (in_array($value, $this->value)) {
                        $this->selected[] = $value;
                    }
                } else {
                    if ($value == $this->value) {
                        $this->selected[] = $value;
                    }
                }
            }
        }
    }

    protected function setNulloption()
    {
        $this->nulloption = $this->params->get('nulloption');
    }

    protected function setMultiple()
    {
        $this->multiple = $this->params->get('multiple');
    }

    protected function setStyles()
    {
        $this->class[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.select') ?? config('blade-form-components.themes.'.$this->getTheme().'.fields.default');
        $this->labelClass[] = config('blade-form-components.themes.'.$this->getTheme().'.labels.default');
    }
}
