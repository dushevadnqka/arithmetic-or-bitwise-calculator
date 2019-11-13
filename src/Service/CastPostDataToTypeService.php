<?php
namespace App\Service;

class CastPostDataToTypeService
{
    private $transformedValue1;

    private $transformedValue2;

    public function castToDigits(string $value)
    {
        if (strpos($value, '.') || strpos($value, ',')) {
            return (float) $value;
        }

        return (int) $value;
    }
}
