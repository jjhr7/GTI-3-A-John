<?php

namespace Database\Seeders;

use App\Models\Town;
use Illuminate\Database\Seeder;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $town = new Town();
        $town->postal_code = 000;
        $town->name = 'Sin Municipio';
        $town->area = 1234;
        $town->altitude = 123;
        $town->o2avg = 15;
        $town->save();

    }
}
