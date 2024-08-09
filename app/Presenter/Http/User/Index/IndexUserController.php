<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Index;

use App\Application\User\Index\IndexUserQuery;
use App\Application\User\Index\IndexUserQueryHandler;
use App\Domain\User\UserNotFound;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexUserController
{
    public function __construct(
        private readonly IndexUserQueryHandler $loadHandler
    ) {
    }

    public function __invoke(Request $request): JsonResponse | Response
    {
        try{

            $query = new IndexUserQuery($request->all());
            $user = $this->loadHandler->handle($query);


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
