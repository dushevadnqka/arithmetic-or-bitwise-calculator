<?php

namespace App\Tests\App\Validator;

use PHPUnit\Framework\TestCase;
use App\Validator\BitwiseCalculatorValidator;

class BitwiseCalculatorValidatorTest extends TestCase
{
    private $validator;

    protected function setUp()
    {
        $this->validator = new BitwiseCalculatorValidator();
    }

    /**
     * @expectedException App\Exception\BitwiseValidationException
     */
    public function testValidatorShouldThrowAnErrorWhenOneOfInputValuesAreNotInteger()
    {
        $this->validator->validate(0, 2.13);
    }
}
