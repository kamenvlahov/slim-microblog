<?php

namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;


class Validator
{
    protected array $errors;

    public function validate($request, array $rules)
    {

        foreach ($rules as $param => $rule) {
            try {
                $rule->setName($param)->assert($request->getParam($param));
            } catch (NestedValidationException $exception) {
                echo $exception->getFullMessage();
            }
        }
    }
}
