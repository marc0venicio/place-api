<?php

declare(strict_types=1);

namespace App\Presenter\Http\Places\Load;

use App\Application\Place\Load\LoadPlaceQuery;
use App\Application\Place\Load\LoadPlaceQueryHandler;
use App\Domain\Place\PlaceNotFound;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoadPlaceController
{
    public function __construct(
        private readonly LoadPlaceQueryHandler $loadHandler
    ) {
    }

    public function __invoke(int $placeId): JsonResponse | Response
    {
        try{
            $query = new LoadPlaceQuery($placeId);
            $place = $this->loadHandler->handle($query);
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
