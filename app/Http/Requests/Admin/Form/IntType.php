<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11/011
 * Time: 14:07
 */

namespace App\Http\Requests\Admin\Form;


use Illuminate\Validation\Rule;

trait IntType
{
    protected $key;
    protected $gridIndex;

    protected function getIntTypeRule($key, $field, $gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;

        $intRule = [];
        if ($field['scale']) {
            //有小数
            $intRule = $this->scaleRule($field);
        } else {
            $intRule = $this->notScaleRule($field);
        }
        //去除默认值含有运算符号、系统变量、字段类型的验证
        $regex = '/(({<(\d+)>})|({{(\w+)}})|({\?(\w+)\?}))/';
        if ($field['default_value'] && preg_match($regex, $field['default_value'])) {
            $intRule['fields.' . $this->key . '.default_value'] = 'string';
        }
        //控件字段
        if (!is_null($this->gridIndex)) {
            $gridIntRule = [];
            foreach ($intRule as $k => $v) {
                $k = 'grids.' . $this->gridIndex . '.' . $k;
                $gridIntRule[$k] = $v;
            }
            $intRule = $gridIntRule;
        }

        $this->intMessage();
        return $intRule;
    }

    protected function notScaleRule($field)
    {
        return [
            'fields.' . $this->key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $this->key . '.min' => [
                'numeric',
                'max:' . ($field['max'] && $field['max'] < 9223372036854775807 ?: 9223372036854775807),
            ],
            'fields.' . $this->key . '.max' => [
                'numeric',
                'min:' . ($field['min'] ?: 0)
            ],
            'fields.' . $this->key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $this->key . '.default_value' => [
                'numeric',
                'between:' . ($field['min'] ?: 0) . ',' . ($field['max'] && $field['max'] < 9223372036854775807 ?: 9223372036854775807)
            ],
            'fields.' . $this->key . '.options' => [
                'array',
            ]
        ];
    }

    protected function scaleRule($field)
    {
        $scaleRegex = '/^-?\d+(\.\d{' . $field['scale'] . '})?$/';
        return [
            'fields.' . $this->key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $this->key . '.min' => [
                'numeric',
                'regex:' . $scaleRegex,
                'max:' . ($field['max'] && $field['max'] < 9223372036854775807 ?: 9223372036854775807),
            ],
            'fields.' . $this->key . '.max' => [
                'numeric',
                'regex:' . $scaleRegex,
                'min:' . ($field['min'] ?: 0)
            ],
            'fields.' . $this->key . '.scale' => [
                'numeric',
                'required',
            ],
            'fields.' . $this->key . '.default_value' => [
                'nullable',
                'numeric',
                'regex:' . $scaleRegex,
                'between:' . ($field['min'] ?: 0) . ',' . (($field['max'] && $field['max'] < 9223372036854775807) ? $field['max'] : 9223372036854775807)
            ],
            'fields.' . $this->key . '.options' => [
                'array',
            ]
        ];
    }

    protected function intMessage()
    {
        $message = [
            'fields.' . $this->key . '.region_level' => '地区级数',
            'fields.' . $this->key . '.min' => '最小值',
            'fields.' . $this->key . '.max' => '最大值',
            'fields.' . $this->key . '.scale' => '小数位数',
            'fields.' . $this->key . '.default_value' => '默认值',
            'fields.' . $this->key . '.options' => '可选值',
        ];
        //控件字段
        if (!is_null($this->gridIndex)) {
            $gridMessage = [];
            foreach ($message as $k => $v) {
                $k = 'grids.' . $this->gridIndex . '.' . $k;
                $gridMessage[$k] = $v;
            }
            $message = $gridMessage;
        }
        $this->msg = array_collapse([$this->msg, $message]);
    }
}