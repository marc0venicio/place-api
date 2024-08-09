<?php

namespace Database\Seeders;

use App\Infrastructure\Database\Models\PlaceModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PlaceModel::factory()->count(10)->create();
    }
}
