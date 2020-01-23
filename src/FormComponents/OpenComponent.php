<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\Form;

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
            'blade-form-components::form-open', ['form' => $this->form]
        );
    }
}
