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
            'step_key' => $this->step_key,
            'prev_step' => $prevSteps,
            'next_step' => $nextSteps,
            'hidden_fields' => $this->hidden_fields,
            'editable_fields' => $this->editable_fields,
            'required_fields' => $this->required_fields,

        ];
//        $fields = app('field')->analysisFormFieldsDefaultValue($this,$request);//解析表单字段的默认值变量
//        $fields = $this->flow->form->fields->filter(function ($field) {
//            return $field->form_grid_id == null;
//        });
//        $fields = array_merge($fields->toArray());
//        $startStep = $this->flow->steps->filter(function($item){
//            return $item->prev_step_key == [];
//        });
//
//        $fields = $this->analysisFieldsDefaultValue($fields,$startStep);//解析默认值
        $gridFields = FormGrid::with('fields')->where('form_id', $this->flow->form_id)->whereNull('deleted_at')->get();
        $prevSteps = Step::select(['id', 'name', 'description', 'step_key', 'approvers'])
            ->where('flow_id', $this->flow->id)
            ->whereIn('step_key', $this->prev_step_key)
            ->get();
        $nextSteps = Step::select(['id', 'name', 'description', 'step_key', 'approvers'])
            ->where('flow_id', $this->flow->id)
            ->whereIn('step_key', $this->next_step_key)
            ->get();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'step_key' => $this->step_key,
            'prev_step' => $prevSteps,
            'next_step' => $nextSteps,
            'hidden_fields' => $this->hidden_fields,
            'editable_fields' => $this->editable_fields,
            'required_fields' => $this->required_fields,
            'flow' => [
                'id' => $this->flow->id,
                'name' => $this->flow->name,
                'description' => $this->flow->description,
            ],
            'form' => [
                'id' => $this->flow->form->id,
                'name' => $this->flow->form->name,
                'description' => $this->flow->form->description,
            ],
//            'fields' => $fields,
//            'grid_fields' => $gridFields,
        ];
    }

//    protected function getFormFields($model){
//        $fields = $model->flow->form->fields->filter(function ($field) {
//            return $field->form_grid_id == null;
//        });
//        $fields = array_merge($fields->toArray());
//    }
    /***
     * 解析字段的默认值
     * @param $fields
     */
//    private function analysisFieldsDefaultValue($fields,$startStep)
//    {
//        foreach ($fields as $k => $v) {
//            $newDefaultValue = $v['default_value'];
//            if ($v['default_value']){
////                $newDefaultValue = app('field')->variate($v['default_value']);//解析系统变量
//                $newDefaultValue =app('field')->analysisFieldsDefaultValue($v['default_value'],$fields,$startStep);
//            }
//
//            $fields[$k]['default_value'] = $newDefaultValue;
//        }
//        return $fields;
//    }
}
