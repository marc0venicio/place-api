<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Infrastructure\Database\Models\PlaceModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoadPlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testLoadsPlaceSuccessfully()
    {
        $place = PlaceModel::create([
            'name' => 'Existing Place',
            'slug' => 'existing-place',
            'city' => 'Existing City',
            'state' => 'Existing State',
        ]);

        $response = $this->getJson('api/v1/places/' . $place->id);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'name' => 'Existing Place',
            'slug' => 'existing-place',
            'city' => 'Existing City',
            'state' => 'Existing State',
        ]);
    }
}
