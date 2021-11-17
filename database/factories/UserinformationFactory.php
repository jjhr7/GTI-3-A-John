<?php

namespace Database\Factories;

use App\Models\Userinformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserinformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Userinformation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(5,10),
            'role_id' => $this->faker->numberBetween(1,5),
            'device_id' => $this->faker->numberBetween(5,10),
            'town_id' => $this->faker->numberBetween(1,20)

        ];
    }
}
