<?php

declare(strict_types=1);

namespace App\Presenter\Http\Places\Delete;

use App\Application\Place\Delete\DeletePlaceQuery;
use App\Application\Place\Delete\DeletePlaceQueryHandler;
use App\Domain\Place\PlaceNotFound;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeletePlaceController
{
    public function __construct(
        private readonly DeletePlaceQueryHandler $loadHandler
    ) {
    }

    public function __invoke(int $placeId): JsonResponse | Response
    {
        try{
            $query = new DeletePlaceQuery($placeId);
            $place = $this->loadHandler->handle($query);
        }catch(PlaceNotFound $e){
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details'=>
                $e->getDetails()
            ], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse($place, Response::HTTP_NO_CONTENT);
    }
}
