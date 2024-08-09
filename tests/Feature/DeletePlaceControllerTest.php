<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Infrastructure\Database\Models\PlaceModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class DeletePlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testDeletesPlaceSuccessfully()
    {
        $place = PlaceModel::create([
            'name' => 'Place to Delete',
            'slug' => 'place-to-delete',
            'city' => 'City to Delete',
            'state' => 'State to Delete',
        ]);

        $response = $this->deleteJson('api/v1/places/' . $place->id);

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('places', [
            'id' => $place->id,
        ]);
    }
}
