<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use Illuminate\Contracts\Support\Htmlable;
use SoareCostin\BladeFormComponents\Form;

class CloseComponent implements Htmlable
{
    /** @var Form */
    protected $form;

    public function __construct()
    {
        $this->form = app(Form::class);
        $this->form->delete();
    }

    public function toHtml()
    {
        return view(
            'blade-form-components::form-close'
        );
    }
}
