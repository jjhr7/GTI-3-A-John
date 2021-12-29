<?php

namespace Database\Factories;

use App\Models\Useraccountinformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class UseraccountinformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Useraccountinformation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'email_verified' => $this->faker->boolean,
            'access_token' => $this->faker->macPlatformToken,
            'phone_number' => $this->faker->phoneNumber
        ];
    }
}
