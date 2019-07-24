<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Textarea extends FormElement
{
    /** @var string */
    public $placeholder;

    /** @var int */
    public $rows = 5;

    protected function attributesList()
    {
        return [
            'id', 'name', 'placeholder', 'rows', 'class', 'required', 'disabled', 'readonly', 'autocomplete',
        ];
    }

    protected function setSpecificAttributes()
    {
        $this->setPlaceholder();
        $this->setRows();
    }

    protected function setPlaceholder()
    {
        $this->placeholder = $this->params->get('placeholder');
    }

    protected function setRows()
    {
        $this->rows = $this->params->get('rows');
    }

    protected function setStyles()
    {
        $this->class[] = config('blade-form-components.themes.'.$this->getTheme().'.fields.textarea') ?? config('blade-form-components.themes.'.$this->getTheme().'.fields.default');
        $this->labelClass[] = config('blade-form-components.themes.'.$this->getTheme().'.labels.default');
    }
}
