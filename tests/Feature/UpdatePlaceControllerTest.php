<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use App\Infrastructure\Database\Models\PlaceModel;

class UpdatePlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testUpdatesPlaceSuccessfully()
    {
        $place = PlaceModel::create([
            'name' => 'Old Place',
            'slug' => 'old-place',
            'city' => 'Old City',
            'state' => 'Old State',
        ]);

        $updateData = [
            'name' => 'Updated Place',
            'slug' => 'updated-place',
            'city' => 'Updated City',
            'state' => 'Updated State',
        ];

        $response = $this->putJson('api/v1/places/' . $place->id, $updateData);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'name' => 'Updated Place',
            'slug' => 'updated-place',
            'city' => 'Updated City',
            'state' => 'Updated State',
        ]);
    }
}
