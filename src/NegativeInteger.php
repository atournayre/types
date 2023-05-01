<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class NegativeInteger
{
    public readonly int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function fromInt(int $value): NegativeInteger
    {
        Assert::lessThanEq($value, 0);
        Assert::greaterThanEq($value, PHP_INT_MIN);

        return new NegativeInteger($value);
    }
}
