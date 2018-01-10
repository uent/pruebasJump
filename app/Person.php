<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  protected $fillable = [
    'name'
  ];

  public function hasHouses()
  {
      return $this->hasMany('App\House');
  }
}
