<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Submit extends FormElement
{
    protected function setLabel()
    {
        parent::setLabel();

        if (is_null($this->label)) {
            $this->label = is_null($this->model) ? 'Create' : 'Edit';
        }
    }
}
