<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Submit extends FormElement
{
    /** @var array */
    public $attributesList = [
        'class', 'disabled'
    ];

    protected function setLabel()
    {
        parent::setLabel();

        if (is_null($this->label)) {
            $this->label = is_null($this->model) ? 'Create' : 'Edit';
        }
    }
    
    protected function setDefaultClass()
    {
        // Specific to Bootstrap, we need to add it to config
        $this->class[] = 'btn btn-primary';
    }
}
