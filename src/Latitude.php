<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Latitude extends StringType
{
    private function __construct(string $latitude)
    {
        Assert::latitude($latitude);

        $this->string = $latitude;
    }
}
