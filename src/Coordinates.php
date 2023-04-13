<?php

namespace Atournayre\Types;

use Atournayre\Assert\Assert;

class Coordinates
{
    public readonly ?string $latitude;
    public readonly ?string $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    private function __construct(float $latitude, float $longitude)
    {
        Assert::notNull($latitude);
        Assert::notNull($longitude);
        Assert::latitude($latitude);
        Assert::longitude($longitude);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function fromString(string $latitude, string $longitude): self
    {
        return new static(
            (float) $latitude,
            (float) $longitude
        );
    }

    /**
     * Returns the coordinates as a tuple.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [$this->longitude, $this->latitude];
    }
}
