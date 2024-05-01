<?php

namespace Atournayre\Types;

use Webmozart\Assert\Assert;

class EmailAddress extends StringType
{
    protected function __construct(string $email)
    {
        Assert::email($email);

        $this->string = $email;
    }
}
