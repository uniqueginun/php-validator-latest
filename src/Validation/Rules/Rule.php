<?php


namespace Uniqueginun\Validation\Rules;


abstract class Rule
{
    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    abstract public function passes($field, $value);

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    abstract public function message($field);
}
