<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\FormElements\Textarea;

class TextareaComponent implements Htmlable
{
    /** @var \SoareCostin\BladeFormComponents\FormElements\Textarea */
    protected $element;

    public function __construct(array $params = [])
    {
        $this->element = new Textarea($params);
    }

    public function toHtml()
    {
        return view(
            'blade-form-components::textarea', [
                'element' => $this->element,
                'theme' => $this->element->getTheme(),
                'id' => $this->element->getId(),
            ]
        );
    }
}
