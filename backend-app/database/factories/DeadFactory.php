<?php

namespace Database\Factories;

use App\Models\Dead;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'date_of_death' => $this->faker->dateTimeBetween('1953-01-01', '01-01-2020'),
            'age' => $this->faker->numberBetween(18, 90),
            'height' => $this->faker->numberBetween(5200, 8848)
        ];
    }
}
