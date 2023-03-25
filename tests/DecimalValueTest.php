<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\DecimalValue;
use PHPUnit\Framework\TestCase;

class DecimalValueTest extends TestCase
{
    public function testFromInt(): void
    {
        $decimalValue = DecimalValue::fromInt(123, 2);
        $this->assertSame(123, $decimalValue->value);
        $this->assertSame(2, $decimalValue->precision);
    }

    public function testFromFloat(): void
    {
        $decimalValue = DecimalValue::fromFloat(1.23, 2);
        $this->assertSame(123, $decimalValue->value);
        $this->assertSame(2, $decimalValue->precision);
    }

    public function testFromString(): void
    {
        $decimalValue = DecimalValue::fromString('1.23');
        $this->assertSame(123, $decimalValue->value);
        $this->assertSame(2, $decimalValue->precision);
    }

    public function testChangePrecision(): void
    {
        $decimalValue = DecimalValue::fromString('1.23');
        $newDecimalValue = DecimalValue::changePrecision($decimalValue, 1);
        $this->assertSame(12, $newDecimalValue->value);
        $this->assertSame(1, $newDecimalValue->precision);
    }

    public function testFromIntWithNegativePrecision(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        DecimalValue::fromInt(123, -2);
    }

    public function testFromFloatWithNegativePrecision(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        DecimalValue::fromFloat(1.23, -2);
    }

    public function testChangePrecisionDoesNotModifyOriginalDecimalValue(): void
    {
        $decimalValue = DecimalValue::fromString('1.23');
        DecimalValue::changePrecision($decimalValue, 1);
        $this->assertSame(123, $decimalValue->value);
        $this->assertSame(2, $decimalValue->precision);
    }
}
