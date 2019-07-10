<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Input extends FormElement
{
    /** @var string */
    public $type = 'text';

    /** @var string */
    public $placeholder;

    /** @var array */
    public $attributesList = [
        'id', 'name', 'type', 'placeholder', 'value', 'class', 'required', 'disabled', 'readonly', 'autocomplete',
    ];

    protected function setSpecificAttributes()
    {
        $this->setPlaceholder();
    }

    protected function setPlaceholder()
    {
        if (isset($this->params['placeholder']) && ! empty($this->params['placeholder'])) {
            $this->placeholder = $this->params['placeholder'];
        }
    }
}
