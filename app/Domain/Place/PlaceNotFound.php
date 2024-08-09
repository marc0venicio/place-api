<?php

declare(strict_types=1);

namespace App\Domain\Place;

use App\Domain\EntityNotFound;

class PlaceNotFound extends EntityNotFound
{
    public function __construct(int $id)
    {
        parent::__construct('User', ['id' => $id]);
    }
}
