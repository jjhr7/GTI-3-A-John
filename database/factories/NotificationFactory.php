<?php

namespace Database\Factories;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'date' => Carbon::now('CET')->toRfc850String(),
            'message' => $this->faker->realText(50,2),
            'type' => $this->faker->randomElement(['Information','Warnning','Danger','Device']),
        ];
    }
}
