<?php

declare(strict_types=1);

namespace App\Presenter\Http\Places\Index;

use App\Application\Place\Index\IndexPlaceQuery;
use App\Application\Place\Index\IndexPlaceQueryHandler;
use App\Domain\Place\PlaceNotFound;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexPlaceController
{
    public function __construct(
        private readonly IndexPlaceQueryHandler $loadHandler
    ) {
    }

    public function __invoke(Request $request): JsonResponse | Response
    {
        try{

            $query = new IndexPlaceQuery($request->all());
            $places = $this->loadHandler->handle($query);

        }catch(PlaceNotFound $e){
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details'=>
                $e->getDetails()
            ], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse(
            $places, Response::HTTP_OK);
    }
}
