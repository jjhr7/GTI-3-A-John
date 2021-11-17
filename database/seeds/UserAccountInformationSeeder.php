<?php

namespace Database\Seeders;

use App\Models\Useraccountinformation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserAccountInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =new Useraccountinformation();
        $user->user_id = 1;
        $user->email_verified = 1;
        $user->access_token = Str::random(10);
        $user->save();

        $user =new Useraccountinformation();
        $user->user_id = 2;
        $user->email_verified = 1;
        $user->access_token = Str::random(10);
        $user->save();

        $user =new Useraccountinformation();
        $user->user_id = 3;
        $user->email_verified = 1;
        $user->access_token = Str::random(10);
        $user->save();

        $user =new Useraccountinformation();
        $user->user_id = 4;
        $user->email_verified = 1;
        $user->access_token = Str::random(10);
        $user->save();
    }
}
