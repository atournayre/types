<?php

namespace Atournayre\Types;

class Longitude
{
    public readonly ?string $longitude;

    private function __construct(string $longitude)
    {
//        Assert::longitude($longitude);

        $this->longitude = $longitude;
    }

    public static function fromString(string $longitude): self
    {
        return new static($longitude);
    }
}
