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

    public static function fromInt(int $value): PositiveInteger
    {
        Assert::greaterThan($value, 0);

        return new PositiveInteger($value);
    }
}
