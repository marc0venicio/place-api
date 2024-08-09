<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Create;

use App\Application\User\Create\CreatePlaceCommandHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreatePlaceController
{
    public function __construct(
        private readonly CreatePlaceCommandHandler $createHandler
    ) {
    }

    public function __invoke(CreatePlaceRequest $request): JsonResponse | Response
    {
        $user = $this->createHandler->handle($request->toCommand());

        return new JsonResponse($user, Response::HTTP_CREATED);
    }
}
