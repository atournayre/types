<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\Coordinates;
use Atournayre\Types\Latitude;
use Atournayre\Types\Longitude;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    public function testCoordinates(): void
    {
        $coordinates = Coordinates::fromString('48.8534', '2.3488');
        $this->assertSame('48.8534', $coordinates->latitude);
        $this->assertSame('2.3488', $coordinates->longitude);

        $coordinates = Coordinates::fromArray(['lat' => '48.8534', 'lng' => '2.3488']);
        $this->assertSame('48.8534', $coordinates->latitude);
        $this->assertSame('2.3488', $coordinates->longitude);

        $coordinates = Coordinates::fromJson('{"lat": "48.8534", "lng": "2.3488"}');
        $this->assertSame('48.8534', $coordinates->latitude);
        $this->assertSame('2.3488', $coordinates->longitude);
    }

    public function testLatitude(): void
    {
        $latitude = Latitude::fromString('48.8534');
        $this->assertSame('48.8534', $latitude->toString());
    }

    public function testLatitudeFromFloat(): void
    {
        $latitude = Latitude::fromFloat(48.8534);
        $this->assertSame('48.8534', $latitude->toString());
    }

    public function testInvalidLatitude(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Latitude should be between -90 and 90. Got: -100');
        Latitude::fromString('-100');
    }

    public function testInvalidLatitudeFromFloat(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Latitude should be between -90 and 90. Got: -100');
        Latitude::fromFloat(-100);
    }

    public function testLongitude(): void
    {
        $longitude = Longitude::fromString('2.3488');
        $this->assertSame('2.3488', $longitude->toString());
    }

    public function testLongitudeFromFloat(): void
    {
        $longitude = Longitude::fromFloat(2.3488);
        $this->assertSame('2.3488', $longitude->toString());
    }

    public function testInvalidLongitude(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Longitude should be between -180 and 180. Got: -200');
        Longitude::fromString('-200');
    }

    public function testInvalidLongitudeFromFloat(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Longitude should be between -180 and 180. Got: -200');
        Longitude::fromFloat(-200);
    }
}
