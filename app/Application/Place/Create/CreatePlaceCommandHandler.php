<?php

declare(strict_types=1);

namespace App\Application\User\Create;

use App\Application\Command;
use App\Application\CommandHandler;
use App\Domain\User\User;
use App\Domain\User\Users;

class CreatePlaceCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly Users $users
    ) {
    }

    /**
     *
     * @param Command $command
     * @return User
     */
    public function handle(Command $command, ?array $params = null): User
    {
        $user = User::create(null, ...$command->getProperties());
        return $this->users->create($user);
    }
}
