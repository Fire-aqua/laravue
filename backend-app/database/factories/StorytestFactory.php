<?php

namespace Database\Factories;

use App\Models\Storytest;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorytestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Storytest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phrase' => $this->faker->sentence,
            'phrase_number' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
