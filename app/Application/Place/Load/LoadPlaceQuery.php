<?php

declare(strict_types=1);

namespace App\Application\Place\Load;

use App\Application\Query;

class LoadPlaceQuery implements Query
{
    public function __construct(
        public readonly int $id,
    ) {
    }
}
