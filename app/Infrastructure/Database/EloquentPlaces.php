<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use App\Domain\Place\Place;
use App\Domain\Place\Places;
use App\Domain\Place\PlaceNotFound;
use App\Infrastructure\Database\Models\PlaceModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentPlaces implements Places
{
    public function __construct(
        private readonly PlaceModel $model
    ) {
    }

    public function list(): LengthAwarePaginator
    {
        try {

            $place = $this->model->advancedFilter();

        } catch (ModelNotFoundException) {
            throw new PlaceNotFound($this->model->id);
        }
        return $place;
    }

    /**
     * @throws PlaceNotFound
     */
    public function get(int $id): Place
    {
        try {
            $place = $this->model->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new PlaceNotFound($id);
        }

        return Place::fromArray($place->toArray());
    }

    public function create(Place $place): Place
    {

        $place = $this->model->create($place->toArray());
        return Place::fromArray($place->toArray());
    }

    public function update(PlaceModel $place, array $params): Place
    {
        $placeData = $this->model->findOrFail($place->id);

        if (!$placeData) {
            throw new \Exception('Place not found');
        }

        $placeData->update($params);


        return Place::fromArray($placeData->toArray());
    }

    public function delete(int $place): bool|null
    {
        $place = $this->model->find($place);

        if (!$place) {
            throw new \Exception('Place not found');
        }

        return $place->delete();
    }
}
