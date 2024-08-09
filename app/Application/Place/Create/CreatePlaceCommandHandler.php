<?php

declare(strict_types=1);

namespace App\Application\Place\Create;

use App\Application\Command;
use App\Application\CommandHandler;
use App\Domain\Place\Place;
use App\Domain\Place\Places;

class CreatePlaceCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly Places $places
    ) {
    }

    /**
     *
     * @param Command $command
     * @return Place
     */
    public function handle(Command $command, ?array $params = null): Place
    {
        $user = Place::create(null, ...$command->getProperties());
        return $this->places->create($user);
    }
}
