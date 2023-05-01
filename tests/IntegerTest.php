<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\Integer;
use Atournayre\Types\NegativeInteger;
use Atournayre\Types\PositiveInteger;

class IntegerTest extends \PHPUnit\Framework\TestCase
{
    public function testFromInt(): void
    {
        $integer = Integer::fromInt(1);

        self::assertSame(1, $integer->value);
    }

    public function testFromIntWithNegativeValue(): void
    {
        $integer = Integer::fromInt(-1);

        self::assertSame(-1, $integer->value);
    }

    public function testFromIntWithZero(): void
    {
        $integer = Integer::fromInt(0);

        self::assertSame(0, $integer->value);
    }

    public function testFromIntWithMaxValue(): void
    {
        $integer = Integer::fromInt(PHP_INT_MAX);

        self::assertSame(PHP_INT_MAX, $integer->value);
    }

    public function testFromIntWithMinValue(): void
    {
        $integer = Integer::fromInt(PHP_INT_MIN);

        self::assertSame(PHP_INT_MIN, $integer->value);
    }

    public function testFromIntWithZeroIsAPositiveInteger(): void
    {
        $integer = PositiveInteger::fromInt(0);

        self::assertInstanceOf(PositiveInteger::class, $integer);
    }

    public function testFromIntWithZeroIsANegativeInteger(): void
    {
        $integer = NegativeInteger::fromInt(0);

        self::assertInstanceOf(NegativeInteger::class, $integer);
    }
}
