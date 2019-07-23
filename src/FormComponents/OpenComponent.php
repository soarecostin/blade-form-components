<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use SoareCostin\BladeFormComponents\Form;
use Illuminate\Contracts\Support\Htmlable;

class OpenComponent implements Htmlable
{
    /** @var Form */
    protected $form;

    public function __construct(array $params = [])
    {
        $this->form = app(Form::class);
        $this->form->setup($params);
    }

    public function toHtml()
    {
        return view(
            'blade-form-components::themes.'.$this->form->theme.'.form-open', ['form' => $this->form]
        );
    }
}
