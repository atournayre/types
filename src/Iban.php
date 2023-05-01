<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Iban extends StringType
{
    protected function __construct(string $iban)
    {
        Assert::notWhitespaceOnly($iban);
        Assert::alnum($iban);
        Assert::isIBAN($iban);

        $this->string = $iban;
    }
}
