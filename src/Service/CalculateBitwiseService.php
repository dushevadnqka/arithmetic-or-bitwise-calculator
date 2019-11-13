<?php

namespace App\Service;

use App\Validator\CalculatorValidatorInterface;

class CalculateBitwiseService implements CalculateServiceInterface
{
    private $validator;

    public function __construct(CalculatorValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function applyOperation(array $data): string
    {
        list ($value1, $value2, $operator) = $data;

        $this->validator->validate($value1, $value2);

        switch ($operator) {
            case 'AND':
                return $value1 & $value2;
                break;

            case 'OR':
                return $value1 | $value2;
                break;

            default:
                throw new \Exception('There is more bitwise operators, but we are presenting only these.');
                break;
        }
    }
}
