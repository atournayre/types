<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class PositiveInteger
{
    public readonly int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function fromInt(int $value): static
    {
        Assert::greaterThanEq($value, 0);
        Assert::lessThanEq($value, PHP_INT_MAX);

        return new static($value);
    }
}
