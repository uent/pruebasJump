<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PeopleTableSeeder::class);
        $this->call(HousesTableSeeder::class);
        $this->call(Person_HouseSeeder::class);
    }
}