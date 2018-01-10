<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\House;

class HouseCollection extends ResourceCollection
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
          'resource' => 'house',
          'code' => '200',
          'total' => $this->collection->count(),
          'data' => $this->collection,
      ];
    }
}
