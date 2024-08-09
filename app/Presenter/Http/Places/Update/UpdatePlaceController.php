<?php

declare(strict_types=1);

namespace App\Presenter\Http\Places\Update;

use App\Application\Place\Update\UpdatePlaceQuery;
use App\Application\Place\Update\UpdatePlaceQueryHandler;
use App\Domain\Place\PlaceNotFound;
use App\Infrastructure\Database\Models\PlaceModel;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdatePlaceController
{
    public function __construct(
        private readonly UpdatePlaceQueryHandler $updateHandler
    ) {
    }

    public function __invoke(UpdatePlaceRequest $request, PlaceModel $placeId): JsonResponse | Response
    {
        try{
            $query = new UpdatePlaceQuery($placeId);
            $place = $this->updateHandler->handle($query, $request->validated());
        }catch(PlaceNotFound $e){
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details'=>
                $e->getDetails()
            ], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse(
            $place, Response::HTTP_OK);
    }
}
