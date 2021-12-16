<?php

namespace Database\Factories;

use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'o2avg' => $this->faker->randomNumber(2),
            'area' => $this->faker->randomNumber(4),
            'town_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
