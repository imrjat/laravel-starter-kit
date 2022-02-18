<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  ['Sehore', 'Ashta', 'Gwali', 'Panchapura', 'Jawar'];

        foreach ($data as $name) {
            City::create(['name' => $name]);
        }
    }
}
