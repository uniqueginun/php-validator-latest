<?php

use Uniqueginun\Validation\Validator;

require_once 'vendor/autoload.php';

$validator = new Validator([
    'username' => 'uniqueginun',
    'email' => 'uniqueginun@gmail.com'
]);

$validator->setRules([
    'username' => [
        new \Uniqueginun\Validation\Rules\RequiredRule()
    ],
    'email' => [
        new \Uniqueginun\Validation\Rules\RequiredRule(),
        new \Uniqueginun\Validation\Rules\EmailRule()
    ]
]);


if(! $validator->validate()) {
    dump($validator->getErrors());
} else {
    dump("passed");
}

