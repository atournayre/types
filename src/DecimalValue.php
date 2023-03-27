<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;
use Atournayre\Types\Contracts\IsDecimalValueInterface;

class DecimalValue implements Contracts\IsDecimalValueInterface
{
    public readonly int $value;
    public readonly int $precision;

    protected function __construct(int $value, int $precision)
    {
        $this->value = $value;

        Assert::greaterThanEq($precision, 0);
        $this->precision = $precision;
    }

    public static function create($value, int $precision): DecimalValue
    {
        if (is_int($value)) {
            return self::fromInt($value, $precision);
        }
        if (is_float($value)) {
            return self::fromFloat($value, $precision);
        }
        if (is_string($value)) {
            return self::fromString($value);
        }

        throw new \InvalidArgumentException();
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
            throw new \InvalidArgumentException();
        }

        $wholeNumber = $matches[1];
        $decimals = $matches[2];

        $valueWithoutDecimalSign = $wholeNumber . $decimals;

        return new DecimalValue(
            (int)$valueWithoutDecimalSign,
            strlen($decimals)
        );
    }

    public static function changePrecision(IsDecimalValueInterface $decimalValue, int $newPrecision): DecimalValue
    {
        if ($decimalValue->precision === $newPrecision) {
            return new DecimalValue($decimalValue->value, $decimalValue->precision);
        }

        Assert::greaterThan($decimalValue->precision, $newPrecision, 'New precision must be greater than current precision');

        $value = $decimalValue->value * pow(10, $newPrecision - $decimalValue->precision);
        return new DecimalValue($value, $newPrecision);
    }

    public function toFloat(): float
    {
        return $this->value / pow(10, $this->precision);
    }
}
