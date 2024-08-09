<?php

declare(strict_types=1);

namespace App\Presenter\Http\Places\Create;

use App\Application\Place\Create\CreatePlaceCommandHandler;
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
        $place = $this->createHandler->handle($request->toCommand());

        return new JsonResponse($place, Response::HTTP_CREATED);
    }
}
