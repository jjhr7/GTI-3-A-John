<?php

namespace Database\Factories;

use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'time_activity' => $this->faker->randomNumber(2),
            'distance_traveled' => $this->faker->randomNumber(3),
            'date' => Carbon::now('CET')->toRfc850String()
        ];
    }
}
