<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Submit extends FormElement
{
    protected function attributesList()
    {
        return [
            'class', 'disabled',
        ];
    }

    protected function setLabel()
    {
        parent::setLabel();

        if (empty($this->label)) {
            $this->label = is_null($this->model) ? 'Create' : 'Edit';
        }
    }

    protected function setStyles()
    {
        $this->class[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.submit');
    }
}
