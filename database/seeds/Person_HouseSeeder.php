<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\House;
use App\Person;
use App\Person_House;


class Person_HouseSeeder extends Seeder
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
      $houses = House::pluck('id')->toArray();

      for($i=1; $i<300; $i++){
        $perHou = new Person_House;
        $perHou->person_id = $faker->randomElement($people);
        $perHou->house_id = $faker->randomElement($houses);
        $perHou->save();
      }
    }
}
