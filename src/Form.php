<?php

namespace SoareCostin\BladeFormComponents;

class Form
{
    /** @var array */
    protected $params;

    /** @var string */
    public $action;

    /** @var string */
    public $method;

    /** @var bool */
    public $files;

    /** @var Illuminate\Database\Eloquent\Model */
    public $model = null;

    /** @var bool */
    public $autocomplete;

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
        $this->parmas = null;
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
        $this->method = 'post';

        // Check method in params
        if (isset($this->params['method']) && ! empty($this->params['method'])) {
            $this->method = $this->params['method'];
        }

        if (in_array(strtoupper($this->method), ['GET', 'POST', 'PUT', 'DELETE'])) {
            $this->method = strtoupper($this->method);

            // If the form type is POST but we have sent an existing model make it a PUT request
            if ($this->method == 'POST' && ! is_null($this->model)) {
                $this->method = 'PUT';
            }
        }
    }

    protected function setFiles()
    {
        if (isset($this->params['files']) && ! empty($this->params['files'])) {
            $this->files = $this->params['files'];
        }
    }

    protected function setAutocomplete()
    {
        // Set default autocomplete option (true/false) from cofing file
        $this->autocomplete = config('blade-form-components.autocomplete');

        if (isset($this->params['autocomplete'])) {
            $this->autocomplete = $this->params['autocomplete'];
        }
    }
}
