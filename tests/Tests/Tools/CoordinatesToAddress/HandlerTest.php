<?php

namespace Tests\Tests\Tools\CoordinatesToAddress;

use App\Services\Geo\Exception\InvalidResponseException;
use App\Services\Geo\GeoService;
use App\Tools\CoordinatesToAddress\Handler;
use Exception;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class HandlerTest extends TestCase
{
    /** @test */
    public function can_get_address_from_coordinates()
    {
        $geo = new class implements GeoService {
            public function getAddress(float $latitude, float $longitude): string
            {
                return 'Sample Address';
            }

            public function getCoordinates(string $address): array
            {
                return [];
            }
        };

        $generated = (new Handler($geo))->generate([
            'latitude' => 10,
            'longitude' => 20,
        ]);

        $this->assertEquals('Sample Address', $generated['address']);
    }

    /** @test */
    public function throw_invalid_response_exception()
    {
        $geo = new class implements GeoService {
            public function getAddress(float $latitude, float $longitude): string
            {
                throw new InvalidResponseException();
            }

            public function getCoordinates(string $address): array
            {
                return [];
            }
        };

        $this->expectException(ValidationException::class);

        (new Handler($geo))->generate([
            'latitude' => 10,
            'longitude' => 20,
        ]);
    }

    /** @test */
    public function throw_generic_exception()
    {
        $geo = new class implements GeoService {
            public function getAddress(float $latitude, float $longitude): string
            {
                throw new Exception();
            }

            public function getCoordinates(string $address): array
            {
                return [];
            }
        };

        $this->expectException(ValidationException::class);

        (new Handler($geo))->generate([
            'latitude' => 10,
            'longitude' => 20,
        ]);
    }
}
