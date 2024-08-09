<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use App\Application\Common\Support\HasAdvancedFilter;
use App\Application\User\Responses\UserListResponse;
use App\Domain\User\User;
use App\Domain\User\UserNotFound;
use App\Domain\User\Users;
use App\Infrastructure\Database\Models\UserModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentUsers implements Users
{
    public function __construct(
        private readonly UserModel $model
    ) {
    }

    public function list(): LengthAwarePaginator
    {
        try {
            $user = $this->model->advancedFilter();
        } catch (ModelNotFoundException) {
            // throw new UserNotFound();
        }
        return $user;
    }

    /**
     * @throws UserNotFound
     */
    public function get(int $id): User
    {
        try {
            $user = $this->model->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new UserNotFound($id);
        }

        return User::fromArray($user->toArray());
    }

    public function create(User $user): User
    {
        $user = $this->model->create($user->toArray());
        return User::fromArray($user->toArray());
    }

    public function update(UserModel $user, array $params): User
    {
        $userData = $this->model->findOrFail($user->id);

        if (!$userData) {
            throw new \Exception('User not found');
        }

        $params['password'] = bcrypt($params['password']);
        $userData->update($params);


        return User::fromArray($userData->toArray());
    }

    public function delete(int $user): bool|null
    {
        $user = $this->model->find($user);

        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user->delete();
    }
}
