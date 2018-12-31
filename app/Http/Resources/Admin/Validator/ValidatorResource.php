<?php

namespace App\Http\Resources\Admin\Validator;

use Illuminate\Http\Resources\Json\Resource;

class ValidatorResource extends Resource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'type'=>$this->type,
            'params'=>$this->params
        ];
    }
}
