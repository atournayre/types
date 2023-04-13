<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Bic
{
    public readonly ?string $bic;

    private function __construct(string $bic)
    {
        Assert::notWhitespaceOnly($bic);
        Assert::alnum($bic);
//        Assert::isBIC($bic);

        $this->bic = $bic;
    }

    public static function fromString(string $bic): self
    {
        return new static($bic);
    }
}
