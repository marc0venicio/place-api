<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Delete;

use App\Application\User\Delete\DeleteUserQuery;
use App\Application\User\Delete\DeleteUserQueryHandler;
use App\Domain\User\UserNotFound;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteUserController
{
    public function __construct(
        private readonly DeleteUserQueryHandler $loadHandler
    ) {
    }

    public function __invoke(int $userId): JsonResponse | Response
    {
        try{
            $query = new DeleteUserQuery($userId);
            $user = $this->loadHandler->handle($query);
        }catch(UserNotFound $e){
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details'=>
                $e->getDetails()
            ], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse($user, Response::HTTP_NO_CONTENT);
    }
}
