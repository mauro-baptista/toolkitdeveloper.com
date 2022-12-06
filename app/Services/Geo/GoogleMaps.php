<?php

namespace App\Services\Geo;

use App\Services\Geo\Exception\InvalidResponseException;
use GuzzleHttp\Client;

class GoogleMaps implements GeoService
{
    public function __construct(private string $key) {}

    private function get(array $query): array
    {
        $query = http_build_query(array_merge($query, [
            'sensor' => false,
            'key' => $this->key,
        ]));

        $content = (new Client())->get('https://maps.google.com/maps/api/geocode/json?' . $query)
            ->getBody()
            ->getContents();

        $result = json_decode($content, true);

        throw_if(!isset($result['status']) || $result['status'] !== 'OK', InvalidResponseException::class);

        return $result['results'];
    }

    public function getAddress(float $latitude, float $longitude): string
    {
        $result = $this->get([
            'latlng' => $latitude . ',' . $longitude,
        ]);

        return $result[0]['formatted_address'];
    }

    public function getCoordinates(string $address): array
    {
        $result = $this->get([
            'address' => $address,
        ]);

        return [
            'latitude' => $result[0]['geometry']['location']['lat'] ?? null,
            'longitude' => $result[0]['geometry']['location']['lng'] ?? null,
        ];
    }
}
