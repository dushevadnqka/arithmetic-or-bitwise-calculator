<?php

namespace App\Validator;

use App\Exception\ArithmeticValidationException;

class ArithmeticCalculatorValidator implements CalculatorValidatorInterface
{
    private static $allowedTypes = ['integer', 'double'];

    public function validate($value1, $value2)
    {
        if (!(in_array(gettype($value1), static::$allowedTypes) && in_array(gettype($value2), static::$allowedTypes))) {
            throw new ArithmeticValidationException('The both values should be with valid numeric types.', 400);
        }
    }
}
