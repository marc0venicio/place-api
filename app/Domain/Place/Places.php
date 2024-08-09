<?php

declare(strict_types=1);

namespace App\Domain\Place;

use App\Infrastructure\Database\Models\PlaceModel;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface Places
{
    public function list(): LengthAwarePaginator;
    public function get(int $id): Place;
    public function create(Place $user): Place;
    public function update(PlaceModel $user, array $params): Place;
    public function delete(int $id): bool|null;

}
