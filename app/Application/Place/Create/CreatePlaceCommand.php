<?php

declare(strict_types=1);

namespace App\Application\Place\Create;

use App\Application\Command;

class CreatePlaceCommand extends Command
{
    public function __construct(
        public readonly string $name,
        public readonly string $slug,
        public readonly string $city,
        public readonly string $state
    ) {
    }
}
