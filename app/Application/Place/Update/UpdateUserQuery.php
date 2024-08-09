<?php

declare(strict_types=1);

namespace App\Application\User\Update;

use App\Application\Query;
use App\Infrastructure\Database\Models\UserModel;

class UpdateUserQuery implements Query
{
    public function __construct(
        public readonly UserModel $user,
    ) {
    }
}
