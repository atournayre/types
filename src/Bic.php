<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Bic extends StringType
{
    protected function __construct(string $bic)
    {
        Assert::notWhitespaceOnly($bic);
        Assert::alnum($bic);
        Assert::isBIC($bic);

        $this->string = $bic;
    }
}
