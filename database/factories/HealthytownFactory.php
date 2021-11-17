<?php

namespace Database\Factories;

use App\Models\Healthytown;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthytownFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Healthytown::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'town_id' => $this->faker->numberBetween(1,20),
            'date' => $this->faker->date(),
        ];
    }
}
