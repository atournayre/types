<?php

namespace Atournayre\Types;

class Latitude
{
    public readonly ?string $latitude;

    private function __construct(string $latitude)
    {
//        Assert::latitude($latitude);

        $this->latitude = $latitude;
    }

    public static function fromString(string $latitude): self
    {
        return new static($latitude);
    }
}
