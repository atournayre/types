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

    public static function fromArray(array $coordinates): self
    {
        Assert::keyExists($coordinates, 'lat');
        Assert::keyExists($coordinates, 'lng');

        return new static(
            (float) $coordinates['lat'],
            (float) $coordinates['lng']
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

    /**
     * Returns the coordinates as a JSON string.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode([
            'lat' => $this->latitude,
            'lng' => $this->longitude,
        ]);
    }
}
