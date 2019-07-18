<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\FormElements\Submit;

class SubmitComponent implements Htmlable
{
    /** @var \SoareCostin\BladeFormComponents\FormElements\Submit */
    protected $element;

    public function __construct(array $params = [])
    {
        $this->element = new Submit($params);
    }

    public function toHtml()
    {
        $theme = config('blade-form-components.theme');

        return view(
            'blade-form-components::themes.'.$theme.'.submit', ['element' => $this->element]
        );
    }
}
