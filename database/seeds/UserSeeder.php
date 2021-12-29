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
        $user->name = 'John Hernández';
        $user->email = 'admin@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'Jose Julio Peñaranda';
        $user->email = 'townmanager@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'Andrey Kuzmin';
        $user->email = 'devicemanager@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'Leire Villarroya';
        $user->email = 'member@test.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user =new User();
        $user->name = 'Belén Grande';
        $user->email = 'member2@test.com';
        $user->password = Hash::make('123456789');
        $user->save();


    }
}
