<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Person;
use App\Http\Resources\HouseCollection;
use App\Http\Resources\House as HouseResource;



class casasController extends Controller
{
    public function index()
    {
      return new HouseCollection(House::get());
    }

    public function showHousesForIdPerson($id)
    {
      $person = Person::find($id);

      return [
          'status' => 'success',
          'message' => 'Ok',
          'resource' => 'house',
          'code' => '200',
          'total' => count($person),
          'data' => [
              $person,
          ]
      ];
    }

    public function showHabitantsHousesForIdPerson(Request $request)
    {
      //$houses = House::all();
      $houses = House::where('person_id', $request->idPerson)->first()->hasOwner;
      dd($houses);
      //$houses = House::where($request->idPerson,'idPerson')->hasHouses->hasOwner;
      //
      //$people = $houses->hasHabitants;
      /*
      return [
          'status' => 'success',
          'message' => 'Ok',
          'resource' => 'area',
          'code' => '200',
          'total' => count($houses),
          'data' => [
              new PersonCollection($houses),
          ]
      ];
      */
    }



}
