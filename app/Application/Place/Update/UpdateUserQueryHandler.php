<?php

declare(strict_types=1);

namespace App\Application\User\Update;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\User\User;
use App\Domain\User\Users;

class UpdateUserQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly Users $users
    ) {
    }

    /**
     * @param UpdateUserQuery $command
     * @param array $params
     */
    public function handle(Query $command, ?array $params=null): User
    {
        return $this->users->update($command->user, $params);
    }
}
