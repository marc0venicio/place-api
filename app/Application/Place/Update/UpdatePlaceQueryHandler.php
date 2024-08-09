<?php

declare(strict_types=1);

namespace App\Application\Place\Update;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\Place\Place;
use App\Domain\Place\Places;

class UpdateplaceQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly places $places
    ) {
    }

    /**
     * @param UpdatePlaceQuery $command
     * @param array $params
     */
    public function handle(Query $command, ?array $params=null): Place
    {
        return $this->places->update($command->place, $params);
    }
}
