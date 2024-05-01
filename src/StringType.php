<?php

namespace Atournayre\Types;

class StringType
{
    protected ?string $string;

    public static function fromString(string $string): static
    {
        return new static($string);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->string;
    }
}
