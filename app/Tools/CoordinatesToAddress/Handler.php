<?php

namespace App\Tools\CoordinatesToAddress;

use App\Services\Geo\GeoService;
use App\Tools\HandlerContract;

class Handler implements HandlerContract
{
    public function __construct(private GeoService $geoService) {}

    public function generate(array $request): array
    {
        return [
            'address' => $this->geoService->getAddress($request['latitude'], $request['longitude']),
        ];
    }
}
