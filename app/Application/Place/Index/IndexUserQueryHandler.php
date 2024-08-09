<?php

declare(strict_types=1);

namespace App\Application\User\Index;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\User\Users;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexUserQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly Users $users
    ) {
    }

    /**
     * @param IndexUserQuery $command
     */
    public function handle(Query $command, ?array $params =null): LengthAwarePaginator
    {
        return $this->users->list();
    }
}
