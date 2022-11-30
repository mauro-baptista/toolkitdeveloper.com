<?php

namespace App\Tools\Slugify;

use App\Tools\HandlerContract;

class Handler implements HandlerContract
{
    public function generate(array $request): array
    {
        return [
            'slug' => str($request['text'])->slug()->toString(),
        ];
    }
}
