<?php

namespace Database\Factories;

use App\Models\Read;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReadsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Read::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data' => $this->faker->randomNumber(3),
            'read_date' => $this->faker->date(),
            'device_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
