<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Person extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
          'id' => $this->id,
          'attributes' => [
              'name' => $this->name,
              'created_at' => $this->created_at,
              'updated_at' => $this->updated_at,
          ],

      ];
    }
}
