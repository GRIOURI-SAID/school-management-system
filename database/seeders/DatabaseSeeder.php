<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(NationaliteSeeder::class);
         $this->call(GenderTableSeeder::class);
         $this->call(SpecialisationTableSeeder::class);
    }
}
