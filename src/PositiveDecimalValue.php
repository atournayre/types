<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;
use Atournayre\Types\Contracts\IsDecimalValueInterface;

class PositiveDecimalValue extends DecimalValue
{
    protected function __construct(int $value, int $precision)
    {
        Assert::greaterThan($value, 0);
        parent::__construct($value, $precision);
    }

    public static function fromInt(
        int $value,
        int $precision
    ): static {
        return new static($value, $precision);
    }

    public static function fromString(string $value): static
    {
        $result = preg_match('/^(\d+)\.(\d+)/', $value, $matches);
        if ($result == 0) {
            throw new \InvalidArgumentException();
        }

        $wholeNumber = $matches[1];
        $decimals = $matches[2];

        $valueWithoutDecimalSign = $wholeNumber . $decimals;

        return new static(
            (int)$valueWithoutDecimalSign,
            strlen($decimals)
        );
    }

    public static function fromFloat(
        float $value,
        int $precision
    ): static {
        return new static(
            (int)round($value * pow(10, $precision)),
            $precision
        );
    }

    public static function fromDecimalValue(DecimalValue $decimalValue): static
    {
        Assert::greaterThan($decimalValue->value, 0);
        return new static($decimalValue->value, $decimalValue->precision);
    }

    public static function changePrecision(IsDecimalValueInterface $decimalValue, int $newPrecision): static
    {
        if ($decimalValue->precision === $newPrecision) {
            return new static($decimalValue->value, $decimalValue->precision);
        }

        Assert::greaterThan($decimalValue->precision, $newPrecision, 'New precision must be greater than current precision');

        $value = $decimalValue->value * pow(10, $newPrecision - $decimalValue->precision);
        return new static($value, $newPrecision);
    }
}
