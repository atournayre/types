<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Iban
{
    public readonly ?string $iban;

    private function __construct(string $iban)
    {
        Assert::notWhitespaceOnly($iban);
        Assert::alnum($iban);
        Assert::isIBAN($iban);

        $this->iban = $iban;
    }

    public static function fromString(string $iban): self
    {
        return new static($iban);
    }
}
