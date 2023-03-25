<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

final class DecimalValue
{
    public readonly int $value;
    public readonly int $precision;

    private function __construct(int $value, int $precision)
    {
        $this->value = $value;

        Assert::greaterThanEq($precision, 0);
        $this->precision = $precision;
    }

    public static function fromInt(
        int $value,
        int $precision
    ): DecimalValue {
        return new DecimalValue($value, $precision);
    }

    public static function fromFloat(
        float $value,
        int $precision
    ): DecimalValue {
        return new DecimalValue(
            (int)round($value * pow(10, $precision)),
            $precision
        );
    }

    public static function fromString(string $value): DecimalValue
    {
        $result = preg_match('/^(\d+)\.(\d+)/', $value, $matches);
        if ($result == 0) {
            throw new \InvalidArgumentException(/* ... */);
        }

        $wholeNumber = $matches[1];
        $decimals = $matches[2];

        $valueWithoutDecimalSign = $wholeNumber . $decimals;

        return new DecimalValue(
            (int)$valueWithoutDecimalSign,
            strlen($decimals)
        );
    }

    public static function changePrecision(DecimalValue $decimalValue, int $newPrecision): DecimalValue
    {
        Assert::greaterThan($newPrecision, $decimalValue->precision, 'New precision must be greater than current precision');

        $value = $decimalValue->value * pow(10, $newPrecision - $decimalValue->precision);
        return new DecimalValue($value, $newPrecision);
    }

    public function toFloat(): float
    {
        return $this->value / pow(10, $this->precision);
    }
}
