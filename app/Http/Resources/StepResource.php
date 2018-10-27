<?php

namespace App\Http\Resources;

use App\Models\FormGrid;
use App\Models\Step;
use Illuminate\Http\Resources\Json\Resource;

class StepResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name' => $this->name,
            'description' => $this->description,
            'flow_id'=>$this->flow_id,
            'step_key' => $this->step_key,
            'prev_step_key'=>$this->prev_step_key,
            'next_step_key'=>$this->next_step_key,
            'available_fields'=>$this->available_fields,
            'hidden_fields' => $this->hidden_fields,
            'editable_fields' => $this->editable_fields,
            'required_fields' => $this->required_fields,
            'allow_condition'=>$this->allow_condition,
            'skip_condition'=>$this->skip_condition,
            'reject_type'=>$this->reject_type,
            'concurrent_type'=>$this->concurrent_type,
            'merge_type'=>$this->merge_type,
        ];
    }
}
