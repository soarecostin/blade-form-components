<?php

namespace SoareCostin\BladeFormComponents;

use Illuminate\Support\ViewErrorBag;
use SoareCostin\BladeFormComponents\Traits\GluesAttributes;

class Form
{
    use GluesAttributes;

    /** @var \Illuminate\Support\Collection */
    protected $params;

    /** @var string */
    public $theme;

    /** @var string */
    public $action;

    /** @var string */
    public $method;

    /** @var string */
    public $httpMethod;

    /** @var bool */
    public $files;

    /** @var \Illuminate\Support\ViewErrorBag */
    public $errors;

    /** @var string */
    public $enctype;

    /** @var \Illuminate\Database\Eloquent\Model */
    public $model = null;

    /** @var string */
    public $autocomplete = 'off';

    protected function attributesList()
    {
        return ['action', 'method', 'enctype', 'autocomplete'];
    }

    /**
     * Will be called when the form is opened.
     */
    public function setup(array $params)
    {
        $this->params = collect($params);
        $this->theme = config('blade-form-components.theme');

        $this->setModel();
        $this->setAction();
        $this->setMethod();
        $this->setFiles();
        $this->setErrors();
        $this->setAutocomplete();
    }

    /**
     * Will be called when the form is closed.
     */
    public function delete()
    {
        $this->params = null;
        $this->model = null;
        $this->action = null;
        $this->method = null;
        $this->files = null;
    }

    protected function setModel()
    {
        $this->model = $this->params->get('model');
    }

    protected function setAction()
    {
        $this->action = $this->params->get('url');
    }

    protected function setMethod()
    {
        $this->method = $this->httpMethod = $this->params->get('method', 'post');

        if (in_array(strtoupper($this->method), ['GET', 'POST', 'PUT', 'DELETE'])) {
            $this->method = $this->httpMethod = strtoupper($this->method);

            // If the form type is POST but we have sent an existing model make it a PUT request
            if ($this->httpMethod == 'POST' && ! is_null($this->model)) {
                $this->httpMethod = 'PUT';
            }

            // The 'method' attribute is used to be used on the <form> element and can only by GET or POST
            if ($this->method !== 'GET') {
                $this->method = 'POST';
            }
        }
    }

    protected function setFiles()
    {
        $this->files = $this->params->get('files', 'false');
        $this->enctype = $this->files ? 'multipart/form-data' : '';
    }

    protected function setErrors()
    {
        $sessionErrors = session()->get('errors', app(ViewErrorBag::class));
        $this->errors = $this->params->get('errors', $sessionErrors->getBag('default'));
    }

    protected function setAutocomplete()
    {
        // Set default autocomplete option (on/off) from cofing file
        $this->autocomplete = $this->params->get('autocomplete', config('blade-form-components.autocomplete'));
    }
}
