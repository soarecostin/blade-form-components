<?php 

namespace SoareCostin\BladeFormComponents\FormComponents;

use SoareCostin\BladeFormComponents\FormElements\Submit;
use Illuminate\Contracts\Support\Htmlable;

class SubmitComponent implements Htmlable
{
    public function __construct(array $params = [])
    {
        $this->element = new Submit($params);
    }

    public function toHtml()
    {
        $theme = config('blade-form-components.theme');
        $fallbackLabel = is_null($this->element->model) ? 'Create' : 'Edit';

        return view(
            'blade-form-components::themes.'.$theme.'.submit', ['element' => $this->element]
        );
    }
}
