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
        $role->name = 'Super admin';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Admin';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Town Manager';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Factory device';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Member';
        $role->guard_name = 'web';
        $role->save();
    }
}
