<?php

namespace App\Tests\App\Service;

use PHPUnit\Framework\TestCase;
use App\Service\CalculateArithmeticService;
use App\Validator\ArithmeticCalculatorValidator;

class CalculateArithmeticServiceTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        $validator = new ArithmeticCalculatorValidator();
        $this->service = new CalculateArithmeticService($validator);
    }

    public function testApplyOperationShouldReturnArithmeticSolution()
    {
        $data = [
            1,
            2,
            '+',
        ];

        $result = $this->service->applyOperation($data);

        $this->assertEquals($result, 3);
    }

    /**
     * @expectedException Exception
     */
    public function testApplyOperationShouldThrowAnErrorIfOperatorIsUnknown()
    {
        $data = [
            1,
            2,
            '^',
        ];

        $this->service->applyOperation($data);
    }
}
