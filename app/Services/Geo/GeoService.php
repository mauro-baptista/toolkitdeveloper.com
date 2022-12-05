<?php

namespace App\Services\Geo;

interface GeoService
{
    public function getAddress(float $latitude, float $longitude): string;

    public function getCoordinates(string $address): array;
}
