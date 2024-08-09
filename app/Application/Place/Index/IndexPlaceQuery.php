<?php

declare(strict_types=1);

namespace App\Application\Place\Index;

use App\Application\Query;

class IndexPlaceQuery implements Query
{
    public function __construct(
        public readonly array $filters,
    ) {
    }
}
