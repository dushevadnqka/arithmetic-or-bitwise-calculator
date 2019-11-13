<?php

namespace App\Validator;

use App\Exception\BitwiseValidationException;

class BitwiseCalculatorValidator implements CalculatorValidatorInterface
{
    public function validate($value1, $value2)
    {
        if (!(gettype($value1) === 'integer' && gettype($value2) === 'integer')) {
            throw new BitwiseValidationException('The both values should be valid Base-10 integers', 400);
        }
    }
}
