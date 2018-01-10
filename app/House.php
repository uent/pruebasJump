<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
  protected $fillable = [
    'name'
  ];

  public function hasOwner()
  {
      return $this->hasOne('App\Person');
  }

  public function hasHabitants()
  {
      return $this->belongsToMany('App\Person');
  }
}
