<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Update;

use App\Application\User\Update\UpdateUserQuery;
use App\Application\User\Update\UpdateUserQueryHandler;
use App\Domain\User\UserNotFound;
use App\Infrastructure\Database\Models\UserModel;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserController
{
    public function __construct(
        private readonly UpdateUserQueryHandler $updateHandler
    ) {
    }

    public function __invoke(UpdateUserRequest $request, UserModel $userId): JsonResponse | Response
    {
        try{
            $query = new UpdateUserQuery($userId);
            $user = $this->updateHandler->handle($query, $request->validated());
        }catch(UserNotFound $e){
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details'=>
                $e->getDetails()
            ], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse(
            $user, Response::HTTP_OK);
    }
}
