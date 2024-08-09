<?php

declare(strict_types=1);

namespace App\Application\place\Delete;

use App\Application\Query;

class DeleteplaceQuery implements Query
{
    public function __construct(
        public readonly int $id,
    ) {
    }
}
