<?php

namespace Database\Seeders;

use App\Models\Userinformation;
use Illuminate\Database\Seeder;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =new Userinformation();
        $user->user_id = 1;
        $user->role_id = 1;
        $user->device_id = 1;
        $user->town_id = 1;
        $user->save();

        $user =new Userinformation();
        $user->user_id = 2;
        $user->role_id = 2;
        $user->device_id = 2;
        $user->town_id = 2;
        $user->save();

        $user =new Userinformation();
        $user->user_id = 3;
        $user->role_id = 3;
        $user->device_id = 3;
        $user->town_id = 3;
        $user->save();

        $user =new Userinformation();
        $user->user_id = 4;
        $user->role_id = 4;
        $user->device_id = 4;
        $user->town_id = 4;
        $user->save();
    }
}
