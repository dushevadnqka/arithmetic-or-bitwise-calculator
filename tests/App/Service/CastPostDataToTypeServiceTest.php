<?php

namespace App\Tests\App\Service;

use PHPUnit\Framework\TestCase;
use App\Service\CastPostDataToTypeService;

class CastPostDataToTypeServiceTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        $this->service = new CastPostDataToTypeService();
    }

    public function testCastToDigitsMethodShouldReturnFloatVavIfTheInputStringContainsCommaOrDot()
    {
        $numberString = '3,14';

        $castNumber = $this->service->castToDigits($numberString);

        $this->assertTrue(gettype($castNumber) === 'double');
    }

    public function testCastToDigitsMethodShouldReturnIntVavIfTheInputStringNotContainsCommaOrDot()
    {
        $numberString = '45';

        $castNumber = $this->service->castToDigits($numberString);

        $this->assertTrue(gettype($castNumber) === 'integer');
    }
}
