<?php

namespace App\Tests\App\Service;

use PHPUnit\Framework\TestCase;
use App\Service\InputResolver;
use App\Service\CalculateArithmeticService;
use App\Service\CalculateBitwiseService;

class InputResolverTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        $this->service = new InputResolver();
    }

    public function testGetCalculatorMethodShouldReturnArithmeticCalcService()
    {
        $testOperator = '+';

        $arithmeticCalculator = $this->service->getCalculator($testOperator);

        $this->assertInstanceOf(CalculateArithmeticService::class, $arithmeticCalculator);
    }

    public function testGetCalculatorMethodShouldReturnBitwiseCalcService()
    {
        $testOperator = 'AND';

        $bitwiseOperator = $this->service->getCalculator($testOperator);

        $this->assertInstanceOf(CalculateBitwiseService::class, $bitwiseOperator);
    }

    /**
     * @expectedException App\Exception\InvalidArgumentException
     */
    public function testGetCalculatorMethodShouldThrowAnErrorIfOperatorIsUnknown()
    {
        $testOperator = 'XOR';

        $this->service->getCalculator($testOperator);
    }
}
