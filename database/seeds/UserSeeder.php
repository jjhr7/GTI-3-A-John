<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =new User();
        $user->name = 'Super Admin';
        $user->email = 'admin@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'Project Manager';
        $user->email = 'pm@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'Sales Manager';
        $user->email = 'sm@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'HR';
        $user->email = 'hr@test.com';
        $user->password = Hash::make('123456789');
        $user->save();


    }
}
