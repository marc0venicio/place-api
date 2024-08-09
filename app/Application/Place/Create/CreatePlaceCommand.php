<?php

declare(strict_types=1);

namespace App\Application\User\Create;

use App\Application\Command;

class CreatePlaceCommand extends Command
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $cpf,
        public readonly string $password
    ) {
    }
}
