<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\DecimalValue;
use Atournayre\Types\PositiveDecimalValue;

class PositiveDecimalValueTest extends \PHPUnit\Framework\TestCase
{
    public function testFromInt()
    {
        $positiveDecimalValue = PositiveDecimalValue::fromInt(123, 2);
        $this->assertEquals(123, $positiveDecimalValue->value);
        $this->assertEquals(2, $positiveDecimalValue->precision);
    }

    public function testFromString()
    {
        $positiveDecimalValue = PositiveDecimalValue::fromString('123.45');
        $this->assertEquals(12345, $positiveDecimalValue->value);
        $this->assertEquals(2, $positiveDecimalValue->precision);
    }

    public function testFromFloat()
    {
        $positiveDecimalValue = PositiveDecimalValue::fromFloat(123.45, 2);
        $this->assertEquals(12345, $positiveDecimalValue->value);
        $this->assertEquals(2, $positiveDecimalValue->precision);
    }

    public function testFromDecimalValue()
    {
        $decimalValue = DecimalValue::fromInt(123, 2);
        $positiveDecimalValue = PositiveDecimalValue::fromDecimalValue($decimalValue);
        $this->assertEquals(123, $positiveDecimalValue->value);
        $this->assertEquals(2, $positiveDecimalValue->precision);
    }

    public function testFromDecimalValueWithNegativeValue()
    {
        $decimalValue = DecimalValue::fromInt(-123, 2);
        $this->expectException(\InvalidArgumentException::class);
        PositiveDecimalValue::fromDecimalValue($decimalValue);
    }

    public function testToFloat()
    {
        $positiveDecimalValue = PositiveDecimalValue::fromInt(123, 2);
        $this->assertEquals(1.23, $positiveDecimalValue->toFloat());
    }
}
