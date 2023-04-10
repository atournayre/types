<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class EmailAddress
{
    public readonly ?string $email;

    private function __construct(string $email)
    {
        Assert::email($email);

        $this->email = $email;
    }

    public static function fromString(string $email): self
    {
        return new static($email);
    }
}
