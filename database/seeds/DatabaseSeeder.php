<?php
namespace Database\Seeders;


use App\Models\Healthytown;
use App\Models\Notification;
use App\Models\Town;
use App\Models\Useraccountinformation;
use App\Models\Userinformation;
use App\Models\Zone;
use App\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\GasSeedeer;
use App\Models\Device;
use App\Models\Read;
use Database\Seeders\UserAccountInformationSeeder;
use App\Models\Gas;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        User::factory(6)->create();
        $this->call(PermissionSeeder::class);
        $this->call(UserAccountInformationSeeder::class);
        Device::factory(10)->create();
        Town::factory(20)->create();
        Zone::factory(40)->create();
        $this->call(UserInformationSeeder::class);
        Useraccountinformation::factory(6)->create();
        Userinformation::factory(6)->create();
        Healthytown::factory(5)->create();
        Read::factory(10)->create();
        Notification::factory(10)->create();
        $this->call(GasSeedeer::class);

    }
}
