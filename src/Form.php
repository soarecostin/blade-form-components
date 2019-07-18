<?php

namespace SoareCostin\BladeFormComponents;

use SoareCostin\BladeFormComponents\Traits\GluesAttributes;

class Form
{
    use GluesAttributes;

    /** @var array */
    protected $params;

    /** @var string */
    public $action;

    /** @var string */
    public $method;

    /** @var string */
    public $httpMethod;

    /** @var bool */
    public $files;

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
        $this->params = $params;

        $this->setModel();
        $this->setAction();
        $this->setMethod();
        $this->setFiles();
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
        if (isset($this->params['model']) && ! empty($this->params['model'])) {
            $this->model = $this->params['model'];
        }
    }

    protected function setAction()
    {
        if (isset($this->params['url']) && ! empty($this->params['url'])) {
            $this->action = $this->params['url'];
        }
    }

    protected function setMethod()
    {
        // Set default
        $this->method = $this->httpMethod = 'post';

        // Check method in params

        if (isset($this->params['method']) && ! empty($this->params['method'])) {
            $this->method = $this->httpMethod = $this->params['method'];
        }

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
        if (isset($this->params['files']) && ! empty($this->params['files'])) {
            $this->files = $this->params['files'];
            $this->enctype = 'multipart/form-data';
        }
    }

    protected function setAutocomplete()
    {
        // Set default autocomplete option (on/off) from cofing file
        $this->autocomplete = config('blade-form-components.autocomplete');

        if (isset($this->params['autocomplete'])) {
            $this->autocomplete = $this->params['autocomplete'];
        }
    }
}
