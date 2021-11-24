<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->name = 'Manage user';
        $permission->guard_name = 'manage_user';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Manage permission';
        $permission->guard_name = 'manage_permision';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Manage rol';
        $permission->guard_name = 'manage_rol';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Manage town';
        $permission->guard_name = 'manage_town';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Manage device';
        $permission->guard_name = 'manage_device';
        $permission->save();
    }
}
