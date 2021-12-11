<?php

namespace Database\Factories;

use App\Models\Read;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReadFactory extends Factory
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
            'user_id' => $this->faker->numberBetween(1,10),
            'device_id' => $this->faker->numberBetween(1,10),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'type_read' => $this->faker->streetSuffix,
            'value' => $this->faker->randomNumber(2),
            'date' =>  Carbon::now()->toRfc850String(),
        ];
    }
}
