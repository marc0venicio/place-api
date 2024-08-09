<?php

declare(strict_types=1);

namespace App\Application\Place\Load;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\Place\Place;
use App\Domain\Place\Places;

class LoadPlaceQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly Places $places
    ) {
    }

    /**
     * @param LoadPlaceQuery $command
     */
    public function handle(Query $command, ?array $params =null): Place
    {
        return $this->places->get($command->id);
    }
}
