<?php

namespace App\Http\Requests\Web;

use App\Repository\Web\FlowRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PresetRequest extends FormRequest
{
    protected $step;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $flowRepository = new FlowRepository();
        if ($this->has('step_run_id') && intval($this->step_run_id)) {
            //通过 预提交
            $this->step = $flowRepository->getCurrentStep($this->step_run_id);
        } else {
            //发起 预提交
            $this->step = $flowRepository->getFlowFirstStep($this->flow_id);
        }

        $basicRules = [
            'flow_id'=>[
                Rule::exists('flows','id')->where('is_active',1)->whereNull('deleted_at')
            ],
            'step_run_id' => [
                Rule::exists('step_run', 'id')->where('flow_id', $this->flow_id)
            ],
            'form_data' => [
                'present',
                'array',
            ],
        ];
        $fieldsRules = app('validation')->makeStepFormValidationRules($this->step);
        return array_collapse([$basicRules, $fieldsRules]);
    }

    public function attributes()
    {
        $fieldAttributes = $this->step->flow->form->fields->mapWithKeys(function ($field) {
            $msg  =[];
            if ($field->grid) {
                $msg =  ['form_data.' . $field->grid->key . '.*.' . $field->key => $field->name, 'form_data.' . $field->grid->key => $field->grid->name];
                switch($field->type){
                    case 'region':
                        $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.province_id'] = $field->name.'的省';
                        $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.city_id'] = $field->name.'的市';
                        $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.county_id'] = $field->name.'的区、县';
                        $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.address'] = $field->name.'的详情地址';
                        break;
                    case 'staff':
                        if($field->is_checkbox == 0){
                            $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.value'] = $field->name.'的员工';
                        }else{
                            $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.*.value'] = $field->name.'的员工';
                        }
                        break;
                    case 'department':
                        if($field->is_checkbox == 0){
                            $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.value'] = $field->name.'的部门';
                        }else{
                            $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.*.value'] = $field->name.'的部门';
                        }
                        break;
                    case 'shop':
                        if($field->is_checkbox == 0){
                            $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.value'] = $field->name.'的店铺';
                        }else{
                            $msg['form_data.'.$field->grid->key.'.*.'.$field->key.'.*.value'] = $field->name.'的店铺';
                        }
                        break;
                }
            }
            $msg['form_data.' . $field->key ] =  $field->name;
            $msg['form_data.' . $field->key.'.province_id' ] =  $field->name.'的省';
            $msg['form_data.' . $field->key.'.city_id' ] =  $field->name.'的市';
            $msg['form_data.' . $field->key.'.county_id' ] =  $field->name.'的区、县';
            $msg['form_data.' . $field->key.'.address' ] =  $field->name.'的详情地址';
            return $msg;
        })->toArray();
        return array_collapse([$fieldAttributes, [
            'step_run_id' => '步骤运行ID',
            'form_data' => '表单数据',
        ]]);
    }
}
