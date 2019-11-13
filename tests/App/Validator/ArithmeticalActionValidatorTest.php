<?php

namespace App\Tests\App\Validator;

use PHPUnit\Framework\TestCase;
use App\Validator\ArithmeticalActionValidator;

class ArithmeticalActionValidatorTest extends TestCase
{
    private $validator;

    protected function setUp()
    {
        $this->validator = new ArithmeticalActionValidator();
    }

    /**
     * @expectedException App\Exception\ArithmeticValidationException
     */
    public function testValidatorShouldThrowAnErrorWhenZeroDevision()
    {
        $this->validator->validate(0, '/');
    }
}
