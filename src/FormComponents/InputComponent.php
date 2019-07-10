<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\FormElements\Input;

class InputComponent implements Htmlable
{
    /** @var SoareCostin\BladeFormComponents\FormElements\Input */
    protected $element;

    public function __construct(array $params = [])
    {
        $this->element = new Input($params);
    }

    public function toHtml()
    {
        $theme = config('blade-form-components.theme');

        return view(
            'blade-form-components::themes.'.$theme.'.input', ['element' => $this->element]
        );
    }
}
