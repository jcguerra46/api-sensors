<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sensor::class, 400)->create();
    }
}
