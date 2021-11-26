<?php

namespace Database\Factories;

use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;

class TownFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Town::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'postal_code' => $this->faker->postcode,
            'name' => $this->faker->city,
            'area' => $this->faker->randomNumber(4),
            'altitude' => $this->faker->randomNumber(3),
            'o2avg' => $this->faker->randomNumber(2),
        ];
    }
}
