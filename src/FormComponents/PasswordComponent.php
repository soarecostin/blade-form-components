<?php

namespace SoareCostin\BladeFormComponents\FormComponents;

class PasswordComponent extends InputComponent
{
    public function __construct(array $params = [])
    {
        parent::__construct($params);

        $this->element->type = 'password';
    }
}
