<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
class CreatePlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testCreatesPlaceSuccessfully()
    {
        $placeData = [
            'name' => 'New Place',
            'slug' => 'new-place',
            'city' => 'City Name',
            'state' => 'State Name',
        ];

        $this->post('api/v1/places', $placeData)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJson([
            'name' => 'New Place',
            'slug' => 'new-place',
            'city' => 'City Name',
            'state' => 'State Name',
        ]);
    }
}
