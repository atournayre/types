<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Integer
{
    public readonly int $value;

    private function __construct(mixed $value)
    {
        if (\is_double($value)) {
            throw new \InvalidArgumentException(sprintf('Expected value to be an integer, got %s.', \gettype($value)));
        }

        if ($value < PHP_INT_MIN || $value > PHP_INT_MAX) {
            throw new \InvalidArgumentException(sprintf('Expected value to be between %d and %d, got %d.', PHP_INT_MIN, PHP_INT_MAX, $value));
        }

        $this->value = $value;
    }

    public static function fromInt(int $value): self
    {
        return new static($value);
    }
}
