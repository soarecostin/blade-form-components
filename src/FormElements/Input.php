<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Input extends FormElement
{
    /** @var string */
    public $type = 'text';

    /** @var string */
    public $placeholder;

    protected function attributesList()
    {
        return [
            'id', 'name', 'type', 'placeholder', 'value', 'class', 'required', 'disabled', 'readonly', 'autocomplete',
        ];
    }

    protected function setSpecificAttributes()
    {
        $this->setPlaceholder();
        $this->setType();
    }

    protected function setPlaceholder()
    {
        if (isset($this->params['placeholder']) && ! empty($this->params['placeholder'])) {
            $this->placeholder = $this->params['placeholder'];
        }
    }

    protected function setType()
    {
        if (isset($this->params['type']) && ! empty($this->params['type'])) {
            $this->type = $this->params['type'];
        }
    }

    protected function setDefaultClass()
    {
        $this->class[] = config('bfc-themes.'.$this->getTheme().'.fields.input');
    }
}
