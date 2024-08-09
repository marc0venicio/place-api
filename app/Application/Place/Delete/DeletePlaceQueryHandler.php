<?php

declare(strict_types=1);

namespace App\Application\Place\Delete;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\Place\Place;
use App\Domain\Place\Places;

class DeletePlaceQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly Places $places
    ) {
    }

    /**
     * @param DeletePlaceQuery $command
     */
    public function handle(Query $command, ?array $params = null): bool|null
    {
        return $this->places->delete($command->id);
    }
}
