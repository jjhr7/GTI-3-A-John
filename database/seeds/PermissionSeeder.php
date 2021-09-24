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
        $permission->name = 'manage_role';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'manage_permission';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'manage_user';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'manage_sales';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'manage_projects';
        $permission->guard_name = 'web';
        $permission->save();
    }
}
