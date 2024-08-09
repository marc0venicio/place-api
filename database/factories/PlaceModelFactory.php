<?php

namespace Database\Factories;

use App\Infrastructure\Database\Models\PlaceModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlaceModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = PlaceModel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $name = $this->faker->city;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
