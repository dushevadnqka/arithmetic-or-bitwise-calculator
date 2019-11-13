<?php

namespace App\Tests\App\Service;

use PHPUnit\Framework\TestCase;
use App\Service\CalculateBitwiseService;
use App\Validator\BitwiseCalculatorValidator;

class CalculateBitwiseServiceTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        $validator = new BitwiseCalculatorValidator();
        $this->service = new CalculateBitwiseService($validator);
    }

    public function testApplyOperationShouldReturnBitwiseSolution()
    {
        $data = [
            1,
            2,
            'OR',
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
            'XOR',
        ];

        $this->service->applyOperation($data);
    }
}
