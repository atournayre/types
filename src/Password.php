<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Password
{
    public readonly ?string $password;

    private function __construct(string|int|float $password)
    {
        $password = (string)$password;
        Assert::stringNotEmpty($password);

        $this->password = $password;
    }

    public static function fromString(string $password): self
    {
        return new static($password);
    }
}
