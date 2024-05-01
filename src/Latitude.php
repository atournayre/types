<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Latitude extends StringType
{
    protected function __construct(string $latitude)
    {
        Assert::latitude($latitude);

        $this->string = $latitude;
    }

    public static function fromFloat(float $latitude): static
    {
        return new static((string) $latitude);
    }
}
