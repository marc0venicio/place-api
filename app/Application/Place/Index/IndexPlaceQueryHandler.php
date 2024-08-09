<?php

declare(strict_types=1);

namespace App\Application\Place\Index;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\Place\Places;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexPlaceQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly Places $places
    ) {
    }

    /**
     * @param IndexPlaceQuery $command
     */
    public function handle(Query $command, ?array $params =null): LengthAwarePaginator
    {
        return $this->places->list();
    }
}
