<?php

namespace App\Tests\App\Validator;

use PHPUnit\Framework\TestCase;
use App\Validator\ArithmeticCalculatorValidator;

class ArithmeticCalculatorValidatorTest extends TestCase
{
    private $validator;

    protected function setUp()
    {
        $this->validator = new ArithmeticCalculatorValidator();
    }

    /**
     * @expectedException App\Exception\ArithmeticValidationException
     */
    public function testValidatorShouldThrowAnErrorWhenOneOfInputValuesAreNotDigits()
    {
        $this->validator->validate(0, '/');
    }
}
