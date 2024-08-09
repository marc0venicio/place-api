<?php

namespace Tests\Units;

use App\Application\Place\Index\IndexPlaceQueryHandler;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Mockery;
use Tests\TestCase;

class IndexPlaceControllerTest extends TestCase
{
    public function test_it_returns_a_list_of_places_successfully()
    {
        $mock = Mockery::mock(IndexPlaceQueryHandler::class);

        $items = Collection::make([
            ['name' => 'Place 1', 'city' => 'City 1', 'state' => 'State 1'],
            ['name' => 'Place 2', 'city' => 'City 2', 'state' => 'State 2'],
        ]);

        $perPage = 10;
        $currentPage = 1;
        $total = $items->count();

        $paginator = new LengthAwarePaginator($items, $total, $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $mock->shouldReceive('handle')
            ->once()
            ->andReturn($paginator);

        $this->app->instance(IndexPlaceQueryHandler::class, $mock);

        $response = $this->getJson('/api/v1/places');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => ['name', 'city', 'state']
            ]
        ]);
    }
}
