<?php

namespace App\Service;

use App\Model\Operator;
use App\Exception\InvalidArgumentException;
use App\Validator\ArithmeticCalculatorValidator;
use App\Validator\BitwiseCalculatorValidator;

class InputResolver
{
    public function getCalculator($operator): CalculateServiceInterface
    {
        if (in_array($operator, Operator::ARITHMETIC_OPERATORS)) {
            return new CalculateArithmeticService(new ArithmeticCalculatorValidator());
        }

        if (in_array($operator, Operator::BITWISE_OPERATORS)) {
            return new CalculateBitwiseService(new BitwiseCalculatorValidator());
        }

        throw new InvalidArgumentException('The operator should be set from arithmetic or bitwise type.');
    }
}
