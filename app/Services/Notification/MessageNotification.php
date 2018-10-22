<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17/017
 * Time: 14:15
 */

namespace App\Services\Notification;


use App\Repository\Web\FormRepository;

class MessageNotification
{
    //待办
    use Todo;
    //工作通知
    use Message;


    /**
     * 获取表单前三字段数据
     * @param array $formData
     */
    protected function getTopThreeFormData(array $formData, int $formId)
    {
        $formRepository = new FormRepository();
        $fields = $formRepository->getFields($formId);
        //可展示的字段
        $formField = $fields['form']->filter(function ($field, $key) use ($formData) {
            return (in_array($field->type, ['int', 'text', 'date', 'datetime', 'time', 'select', 'shop', 'staff', 'department']) && ($field->is_checkbox == 0));
        });
        //表单键值处理
        $newFormData = [];
        $count = 0;
        $formField->map(function ($field) use ($formData, &$newFormData, &$count) {
            $key = $field->name;
            $value = $formData[$field->key];
            if (!empty($value)) {
                $count = $count + 1;
                if (is_string($value)) {
                    $newValue = json_decode($value, true);
                    if (is_array($newValue) && $newValue && !is_null($newValue)) {
                        $value = $newValue['text'];
                    }
                } else if (is_array($value) && array_has($value, 'text')) {
                    $value = $value['text'];
                }

                if ($count < 4) {
                    $newFormData[] = ['key' => $key, 'value' => $value];
                }
            }
        })->all();
        return $newFormData;
    }
}