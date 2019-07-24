<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\FormElements\Checkbox;

class CheckboxComponent implements Htmlable
{
    /** @var \SoareCostin\BladeFormComponents\FormElements\Checkbox */
    protected $element;

    public function __construct(array $params = [])
    {
        $this->element = new Checkbox($params);
    }

    public function toHtml()
    {
        return view(
            'blade-form-components::checkbox', [
                'element' => $this->element,
                'theme' => $this->element->getTheme(),
                'id' => $this->element->getId()
            ]
        );
    }
}
