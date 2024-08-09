<?php

declare(strict_types=1);

namespace App\Application\Place\Update;

use App\Application\Query;
use App\Infrastructure\Database\Models\PlaceModel;

class UpdatePlaceQuery implements Query
{
    public function __construct(
        public readonly PlaceModel $place,
    ) {
    }
}
