<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Checkbox extends FormElement
{
    /** @var string */
    public $type = 'checkbox';

    /** @var bool */
    public $checked = false;

    protected function attributesList()
    {
        return [
            'id', 'name', 'type', 'value', 'class', 'checked', 'required', 'disabled', 'readonly', 'autocomplete',
        ];
    }

    protected function setSpecificAttributes()
    {
        $this->setChecked();
        $this->overwriteValue();
    }

    protected function setChecked()
    {
        if ($this->value) {
            $this->checked = true;
        }
    }

    protected function overwriteValue()
    {
        // Overwrite the value to 1
        $this->value = 1;
    }

    protected function setStyles()
    {
        $this->class[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.checkbox') ?? config('blade-form-components.themes.'.$this->getTheme().'.fields.default');
        $this->labelClass[] = config('blade-form-components.themes.'.$this->getTheme().'.labels.checkbox');

        // Attach the error class if an error is displayed against this field
        if ($this->form->errors->has($this->name)) {
            $this->labelClass[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.is-error');
        }
    }
}
