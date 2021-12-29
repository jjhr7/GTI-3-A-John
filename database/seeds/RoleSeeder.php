<?php

namespace Database\Seeders;

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->guard_name = 'admin';
        $role->save();

        $role = new Role();
        $role->name = 'User manager';
        $role->guard_name = 'user_manager';
        $role->save();

        $role = new Role();
        $role->name = 'Town manager';
        $role->guard_name = 'town_manager';
        $role->save();

        $role = new Role();
        $role->name = 'Device manager';
        $role->guard_name = 'device_manager';
        $role->save();

        $role = new Role();
        $role->name = 'Member';
        $role->guard_name = 'member';
        $role->save();
    }
}
