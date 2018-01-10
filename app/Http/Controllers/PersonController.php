<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;


class PersonController extends Controller
{

 public function index()
 {
     return  Person::all();
 }

 public function show($id)
 {
     return  Person::find($id);
 }

 public function store(Request $request)
 {
   $person = new Person;
   $person->name = $request->name;
   $person->save();
 }

}
