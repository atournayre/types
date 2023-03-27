<?php

namespace Atournayre\Types\Contracts;

interface IsDecimalValueInterface
{
    public static function fromInt(int $value, int $precision): IsDecimalValueInterface;

    public static function fromFloat(float $value, int $precision): IsDecimalValueInterface;

    public static function fromString(string $value): IsDecimalValueInterface;

    public static function changePrecision(IsDecimalValueInterface $decimalValue, int $newPrecision): IsDecimalValueInterface;

    public function toFloat(): float;
}
