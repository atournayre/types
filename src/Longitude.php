<?php

namespace Atournayre\Types;

class Longitude extends StringType
{
    protected function __construct(string $longitude)
    {
//        Assert::longitude($longitude);

        $this->string = $longitude;
    }
}
