<?php

namespace App\Service;

use App\Validator\CalculatorValidatorInterface;
use App\Validator\ArithmeticalActionValidator;

class CalculateArithmeticService implements CalculateServiceInterface
{
    private $validator;
    private $actionValidator;

    public function __construct(CalculatorValidatorInterface $validator)
    {
        $this->validator = $validator;
        $this->actionValidator = new ArithmeticalActionValidator();
    }

    public function applyOperation(array $data)
    {
        list($value1, $value2, $operator) = $data;

        $this->validator->validate($value1, $value2);
        $this->actionValidator->validate($value2, $operator);

        switch ($operator) {
        case '+':
            return $value1 + $value2;
                break;

        case '-':
            return $value1 - $value2;
                break;

        case '*':
            return $value1 * $value2;
                break;

        case '/':
            return $value1 / $value2;
                break;

        default:
            throw new \Exception('There is more arithmetic operators, but we are presenting only these.');
                break;
        }
    }
}
