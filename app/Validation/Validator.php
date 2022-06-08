<?php

namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;


class Validator
{
    public array $errors = [];

    public function validate($request, array $rules): array
    {

        foreach ($rules as $param => $rule) {
            try {
                $rule->setName($param)->assert($request->getParam($param));
            } catch (NestedValidationException $exception) {
                array_push($this->errors, $exception->getFullMessage());
            }
        }
        return [
            'request' => $request,
            'errors' => $this->errors
        ];
    }
}
