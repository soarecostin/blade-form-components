<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use SoareCostin\BladeFormComponents\FormElement;

class Textarea extends FormElement
{
    /** @var string */
    public $placeholder;

    /** @var int */
    public $rows = 5;

    /** @var array */
    public $attributesList = [
        'id', 'name', 'placeholder', 'rows', 'class', 'required', 'disabled', 'readonly', 'autocomplete'
    ];

    protected function setSpecificAttributes()
    {
        $this->setPlaceholder();
        $this->setRows();
    }

    protected function setPlaceholder()
    {
        if (isset($this->params['placeholder']) && !empty($this->params['placeholder'])) {
            $this->placeholder = $this->params['placeholder'];
        }
    }

    protected function setRows()
    {
        if (isset($this->params['rows']) && !empty($this->params['rows'])) {
            $this->rows = $this->params['rows'];
        }
    }
}