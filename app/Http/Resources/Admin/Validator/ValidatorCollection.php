<?php

namespace App\Http\Resources\Admin\Validator;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ValidatorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($validator){
            return $validator->only(['id','name','description','type','params']);
        })->all();
    }
}
