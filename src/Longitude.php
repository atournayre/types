<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Longitude extends StringType
{
    protected function __construct(string $longitude)
    {
        Assert::longitude($longitude);

        $this->string = $longitude;
    }

    public static function fromFloat(float $longitude): static
    {
        return new static((string) $longitude);
    }
}
