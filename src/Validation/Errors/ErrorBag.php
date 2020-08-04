<?php


namespace Uniqueginun\Validation\Errors;


class ErrorBag
{
    /***
     * @var array of errors
     */
    public $errors = [];

    /**
     * @param $key
     * @param $value
     */
    public function add($key, $value)
    {
        $this->errors[$key][] = $value;
    }

    public function hasErrors()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}