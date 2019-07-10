<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\FormElements\Select;

class SelectComponent implements Htmlable
{
    public function __construct(array $params = [])
    {
        $this->element = new Select($params);
    }

    public function toHtml()
    {
        $theme = config('blade-form-components.theme');

        return view(
            'blade-form-components::themes.'.$theme.'.select', ['element' => $this->element, 'theme' => $theme]
        );
    }
}
