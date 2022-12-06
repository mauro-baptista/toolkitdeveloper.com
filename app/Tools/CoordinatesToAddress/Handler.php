<?php

namespace App\Tools\CoordinatesToAddress;

use App\Services\Geo\Exception\InvalidResponseException;
use App\Services\Geo\GeoService;
use App\Tools\HandlerContract;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler implements HandlerContract
{
    public function __construct(private GeoService $geoService) {}

    public function generate(array $request): array
    {
        try {
            $address = $this->geoService->getAddress($request['latitude'], $request['longitude']);
        } catch (InvalidResponseException $exception) {
            throw ValidationException::withMessages([
                'coordinates' => 'Sorry, we couldn\'t get data from these coordinates.',
            ]);
        } catch (Throwable $exception) {
            report($exception);

            throw ValidationException::withMessages([
                'coordinates' => 'An error has occurred',
            ]);
        }

        return [
            'address' => $address,
        ];
    }
}
