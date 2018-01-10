<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\House;
use App\Person;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $people = Person::pluck('id')->toArray();

      for($i=1; $i<100; $i++){
        $house = new House;
        $house->person_id = $faker->randomElement($people);
        $house->address = $faker->address;
        $house->save();
      }
    }
}
