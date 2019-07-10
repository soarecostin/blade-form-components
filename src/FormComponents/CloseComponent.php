<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

use SoareCostin\BladeFormComponents\Form;
use Illuminate\Contracts\Support\Htmlable;

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
        $theme = config('blade-form-components.theme');

        return view(
            'blade-form-components::themes.'.$theme.'.form-close'
        );
    }
}