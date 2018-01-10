<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Person;

class PersonCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
          'status' => 'success',
          'message' => 'Ok',
          'resource' => 'person',
          'code' => '200',
          'total' => $this->collection->count(),
          'data' => $this->collection,
      ];
    }
}
