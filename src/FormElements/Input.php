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
        $this->placeholder = $this->params->get('placeholder');
    }

    protected function setType()
    {
        $this->type = $this->params->get('type');
    }

    protected function setDefaultClass()
    {
        $this->class[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.input');
        $this->labelClass[] = config('blade-form-components.themes.'.$this->getTheme().'.labels.input');
    }
}
