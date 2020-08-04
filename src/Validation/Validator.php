<?php

namespace Uniqueginun\Validation;

use Uniqueginun\Validation\Errors\ErrorBag;
use Uniqueginun\Validation\Rules\Rule;

class Validator
{

    /**
     * @var array
     */
    protected $data;


    /**
     * @var array
     */
    protected $rules;

    /**
     * @var error bag
     */
    protected $errors;


    public function __construct(array $data)
    {
        $this->data = $data;
        $this->errors = new ErrorBag();
    }

    /***
     * @param array $rules
     */

    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                $this->validateRule($field, $rule);
            }
        }

        return $this->errors->hasErrors();
    }

    protected function validateRule($field, Rule $rule)
    {
        if (! $rule->passes($field, $this->getFieldValue($field, $this->data))) {
            $this->errors->add($field, $rule->message($field));
        }
    }

    protected function getFieldValue($field, $data)
    {
        return $data[$field] ?? null;
    }

    public function getErrors()
    {
        return $this->errors->getErrors();
    }
}