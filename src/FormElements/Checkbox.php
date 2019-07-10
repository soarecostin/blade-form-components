<?php

namespace SoareCostin\BladeFormComponents\FormElements;

use Illuminate\Support\ViewErrorBag;
use SoareCostin\BladeFormComponents\FormElement;

class Checkbox extends FormElement
{
    /** @var string */
    public $type = 'checkbox';

    /** @var bool */
    public $checked = false;

    /** @var array */
    public $attributesList = [
        'id', 'name', 'type', 'value', 'class', 'checked', 'required', 'disabled', 'readonly', 'autocomplete',
    ];

    protected function setSpecificAttributes()
    {
        $this->setChecked();
        $this->overwriteValue();
        $this->addClasses();
    }

    protected function setChecked()
    {
        if ($this->value) {
            $this->checked = true;
        }
    }

    protected function overwriteValue()
    {
        // Overwrite the value to 1
        $this->value = 1;
    }

    protected function setDefaultClass()
    {
        // Specific to Bootstrap, will need to abstract it
        $this->class[] = 'custom-control-input';
        $this->labelClass[] = 'custom-control-label';
    }

    protected function addClasses()
    {
        // Attach the error class if an error is displayed against this field
        $errors = session()->get('errors', app(ViewErrorBag::class));
        if ($errors->has($this->name)) {
            $this->labelClass[] = config('blade-form-components.styles.field.error');
        }
    }
}
