<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\FormElements\Select;

class SelectComponent implements Htmlable
{
    /** @var \SoareCostin\BladeFormComponents\FormElements\Select */
    protected $element;

    public function __construct(array $params = [])
    {
        $this->element = new Select($params);
    }

    public function toHtml()
    {
        return view(
            'blade-form-components::themes.'.$this->element->getTheme().'.select', ['element' => $this->element]
        );
    }
}
