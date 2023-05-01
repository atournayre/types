<?php

namespace Atournayre\Types;

class Latitude extends StringType
{
    private function __construct(string $latitude)
    {
//        Assert::latitude($latitude);

        $this->string = $latitude;
    }
}
