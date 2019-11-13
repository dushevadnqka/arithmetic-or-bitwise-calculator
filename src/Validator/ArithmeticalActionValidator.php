<?php

namespace App\Validator;

use App\Exception\ArithmeticValidationException;

class ArithmeticalActionValidator
{
    public function validate($value2, string $operator)
    {
        if ($value2 === 0 && $operator === '/') {
            throw new ArithmeticValidationException('Division on 0 is not allowed.', 400);
        }
    }
}
