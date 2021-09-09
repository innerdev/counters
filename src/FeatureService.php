<?php

declare(strict_types=1);

namespace App;

use App\Counters\CounterType;
use App\Counters\CountersResource;
use App\Counters\CountersRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FeatureService
{
    public function process(): AnonymousResourceCollection
    {
        // Let's pretend that Frontend sends us something in $request.
        $counters = (new CountersRepository())->getByTypeFavouritesFirst(CounterType::MINUTES);
        return CountersResource::collection($counters->all());
    }
}