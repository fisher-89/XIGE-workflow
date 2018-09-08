<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6/006
 * Time: 11:52
 */

namespace App\Rules\Admin\Form;


use App\Models\Validator;
use App\Repository\RegionRepository;

trait Fields
{
    /**
     * 验证默认值
     * @param $field
     */
    protected function checkDefaultValue($field)
    {
        switch ($field['type']) {
            case 'text':
                return $this->text($field);
                break;
            case 'int':
                return $this->int($field);
                break;
            case 'date':
                return $this->date($field);
                break;
            case 'datetime':
                return $this->datetime($field);
                break;
            case 'time':
                return $this->time($field);
                break;
            case 'file':
                return $this->file($field);
                break;
            case 'array':
                return $this->checkArray($field);
                break;
            case 'select':
                return $this->select($field);
                break;
            case 'department':
                return $this->availableOptions($field);
                break;
            case 'staff':
                return $this->availableOptions($field);
                break;
            case 'shop':
                return $this->availableOptions($field);
                break;
            case 'region':
                return $this->region($field);
                break;
            default:
                return true;
        }
    }

    protected function text($field)
    {
        if ($field['default_value']) {
            if ($field['max'] && empty($field['min']) && strlen($field['default_value']) > $field['max']) {
                $this->msg = $field['name'].'的 默认值长度不能大于最大值';
                return false;
            }
            if (empty($field['max']) && $field['min'] && strlen($field['default_value']) < $field['min']) {
                $this->msg = $field['name'].'的 默认值长度不能小于最小值';
                return false;
            }
            if ($field['max'] && $field['min'] && (strlen($field['default_value']) < $field['min'] || strlen($field['default_value']) > $field['max'])) {
                $this->msg = $field['name'].'的 默认值长度必须介于最小值与最小值之间';
                return false;
            }
        }
        return true;
    }

    protected function int($field)
    {
        if ($field['scale'] && $field['scale'] != 0) {
            if (empty($field['max']) || $field['max'] == 0) {
                $this->msg = $field['name'] . '的 最大值不能为空';
                return false;
            }
            $maxIndex = strpos($field['max'], '.');

            if (!$maxIndex || $maxIndex == 0 || ($maxIndex + 1) == strlen($field['max'])) {
                $this->msg = $field['name'] . '的 最大值必须是正确的浮点型';
                return false;
            }
            $maxValueArray = explode('.', $field['max']);

            if (strlen($maxValueArray[1]) != $field['scale']) {
                $this->msg = $field['name'] . '的 最大值的小数位数不匹配';
                return false;
            }
        }
        return true;
    }

    protected function date($field)
    {
        if ($field['default_value']) {
            $unixTime = strtotime($field['default_value']);
            //判断日期格式 与 当前日期格式（date当前时间）
            if (date('Y-m-d', $unixTime) != $field['default_value'] && $field['default_value'] != 'date') {
                $this->msg = $field['name'] . '的 默认值：' . $field['default_value'] . '格式不是日期类型';
                return false;
            }
        }
        return true;
    }

    protected function datetime($field)
    {
        if ($field['default_value']) {
            $unixTime = strtotime($field['default_value']);
            //判断日期时间格式 与 当前日期时间格式（date当前时间）
            if (date('Y-m-d H:i', $unixTime) != $field['default_value'] && $field['default_value'] != 'datetime') {
                $this->msg = $field['name'] . '的 默认值：' . $field['default_value'] . '格式不是日期时间类型';
                return false;
            }
        }
        return true;
    }

    protected function time($field)
    {
        if ($field['default_value']) {
            $unixTime = strtotime($field['default_value']);
            if (date('H:i', $unixTime) != $field['default_value'] && $field['default_value'] != 'time') {
                $this->msg = $field['name'] . '的 默认值：' . $field['default_value'] . '格式不是时间类型';
                return false;
            }
        }
        return true;
    }

    protected function file($field)
    {
        $validator = Validator::find($field['validator_id']);
        $message = '';
        $count = $validator->filter(function ($v) use (&$message) {
            if ($v->type != 'mimes') {
                $message .= $v->name . ',';
            }
            return $v->type == 'mimes';
        })->count();
        if ($validator->count() != $count) {
            $this->msg = $field['name'] . '的 验证规则有误，' . $message;
            return false;
        }
        return true;
    }

    protected function checkArray($field)
    {
        if (!is_array($field['default_value'])) {
            $this->msg = $field['name'] . '的 默认值不是数组';
            return false;
        }
        if ($field['min']) {
            if ($field['default_value'] && count($field['default_value']) < $field['min']) {
                $this->msg = $field['name'] . '的 默认值最小数量必须是' . $field['min'];
                return false;
            }
        }
        if ($field['max']) {
            if ($field['default_value'] && count($field['default_value']) > $field['max']) {
                $this->msg = $field['name'] . '的 默认值最大数量必须是' . $field['max'];
                return false;
            }
        }
        return true;
    }

    protected function select($field)
    {
        if (!is_array($field['default_value'])) {
            $this->msg = $field['name'] . '的 默认值不是数组';
            return false;
        }
        if ($field['max']) {
            if (count($field['options']) > $field['max']) {
                $this->msg = $field['name'] . '的 可选值的数量不能大于' . $field['max'];
                return false;
            }
        }
        if ($field['min']) {
            if (count($field['options']) < $field['min']) {
                $this->msg = $field['name'] . '的 可选值的数量不能小于' . $field['min'];
                return false;
            }
        }
        if ($field['is_checkbox'] == 1) {
            //多选
            if (count($field['options']) < 2) {
                $this->msg = $field['name'] . '的 可选值的数量不能小于2';
                return false;
            }
        } else {
            //单选
            if ($field['default_value'] && count($field['default_value']) > 1) {
                $this->msg = $field['name'] . '的 默认值的数量不能大于1';
                return false;
            }
        }
        foreach ($field['default_value'] as $value) {
            if (!in_array($value, $field['options'])) {
                $this->msg = $field['name'] . '的 默认值:' . $value . '不在可选值里';
                return false;
            }
        }
        return true;
    }

    /**
     * 部门、员工、店铺
     * @param $field
     * @return bool
     */
    protected function availableOptions($field)
    {
        if ($field['available_options'] && $field['is_checkbox'] == 0) {
            //单选
            if (count($field['default_value']) != count($field['default_value'], 1)) {
                $this->msg = $field['name'] . '的 默认值必须是对象';
                return false;
            }
            //检查默认值是否在可选值里
            if ($field['default_value']) {
                $value = $field['default_value']['value'];
                $availableOptionsValues = array_pluck($field['available_options'], 'value');
                if (!in_array($value, $availableOptionsValues) && !in_array($value, ['staff', 'department', 'shop'])) {
                    $this->msg = $field['name'] . '的 默认值不在可选值里';
                    return false;
                }
            }
        } elseif ($field['available_options'] && $field['is_checkbox'] == 1) {
            //多选
            if ($field['default_value'] && count($field['default_value']) == count($field['default_value'], 1)) {
                $this->msg = $field['name'] . '的 默认值必须是一个数组';
                return false;
            }
            //检查默认值是否在可选值里
            $value = array_pluck($field['default_value'], 'value');
            $availableOptionsValues = array_pluck($field['available_options'], 'value');
            foreach ($value as $v) {
                if (!in_array($v, $availableOptionsValues) && !in_array($value, ['staff', 'department', 'shop'])) {
                    $this->msg = $field['name'] . '的 默认值不在可选值里';
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 验证地区
     * @param $field
     */
    protected function region($field)
    {
        //地区级数 （1.省 ，2.省市，3省市区，4省市区详细地址）
        $regionLevel = $field['region_level'];
        $regionRepository = new RegionRepository();
        $region = $regionRepository->getCacheRegion();
        if ($field['default_value']) {
            switch ($regionLevel) {
                case 1 :
                    return $this->province($field['default_value'], $region);
                    break;
                case 2 :
                    return $this->city($field['default_value'], $region);
                    break;
                case 3 :
                    return $this->county($field['default_value'], $region);
                    break;
                case 4 :
                    return $this->address($field['default_value'], $region);
                    break;
            }
        }
        return true;
    }

    protected function province($defaultValue, $region)
    {
        if (!empty($defaultValue['city_id']) || !empty($defaultValue['county_id']) || !empty($defaultValue['address']) || empty($defaultValue['province_id'])) {
            $this->msg = "默认值与地区级数不匹配";
            return false;
        }
        if (!in_array($defaultValue['province_id'], array_pluck($region['province'], 'id'))) {
            $this->msg = "省地区不存在";
            return false;
        }
        return true;
    }

    protected function city($defaultValue, $region)
    {
        if (empty($defaultValue['city_id']) || !empty($defaultValue['county_id']) || !empty($defaultValue['address']) || empty($defaultValue['province_id'])) {
            $this->msg = "默认值与地区级数不匹配";
            return false;
        }
        if (!in_array($defaultValue['province_id'], array_pluck($region['province'], 'id'))) {
            $this->msg = "省地区不存在";
            return false;
        }
        if (!in_array($defaultValue['city_id'], array_pluck($region['city'], 'id'))) {
            $this->msg = "市地区不存在";
            return false;
        }
        $cityData = array_where($region['city'], function ($v) use ($defaultValue) {
            return $v['id'] == $defaultValue['city_id'];
        });
        $cityData = array_collapse($cityData);
        if ($cityData['parent_id'] != $defaultValue['province_id']) {
            $this->msg = "市地区不在该省地区里";
            return false;
        }
        return true;
    }

    protected function county($defaultValue, $region)
    {
        if (empty($defaultValue['city_id']) || empty($defaultValue['county_id']) || !empty($defaultValue['address']) || empty($defaultValue['province_id'])) {
            $this->msg = "默认值与地区级数不匹配";
            return false;
        }
        if (!in_array($defaultValue['province_id'], array_pluck($region['province'], 'id'))) {
            $this->msg = "省地区不存在";
            return false;
        }
        if (!in_array($defaultValue['city_id'], array_pluck($region['city'], 'id'))) {
            $this->msg = "市地区不存在";
            return false;
        }
        if (!in_array($defaultValue['county_id'], array_pluck($region['county'], 'id'))) {
            $this->msg = "区、县地区不存在";
            return false;
        }
        $cityData = array_where($region['city'], function ($v) use ($defaultValue) {
            return $v['id'] == $defaultValue['city_id'];
        });
        $cityData = array_collapse($cityData);
        if ($cityData['parent_id'] != $defaultValue['province_id']) {
            $this->msg = "市地区不在该省地区里";
            return false;
        }
        $countyData = array_where($region['county'], function ($v) use ($defaultValue) {
            return $v['id'] == $defaultValue['county_id'];
        });
        $countyData = array_collapse($countyData);
        if ($countyData['parent_id'] != $defaultValue['city_id']) {
            $this->msg = "区、县地区不在该市地区里";
            return false;
        }
        return true;
    }

    protected function address($defaultValue, $region)
    {
        if (empty($defaultValue['city_id']) || empty($defaultValue['county_id']) || empty($defaultValue['province_id'])) {
            $this->msg = "默认值与地区级数不匹配";
            return false;
        }
        if (!in_array($defaultValue['province_id'], array_pluck($region['province'], 'id'))) {
            $this->msg = "省地区不存在";
            return false;
        }
        if (!in_array($defaultValue['city_id'], array_pluck($region['city'], 'id'))) {
            $this->msg = "市地区不存在";
            return false;
        }
        if (!in_array($defaultValue['county_id'], array_pluck($region['county'], 'id'))) {
            $this->msg = "区、县地区不存在";
            return false;
        }
        $cityData = array_where($region['city'], function ($v) use ($defaultValue) {
            return $v['id'] == $defaultValue['city_id'];
        });
        $cityData = array_collapse($cityData);
        if ($cityData['parent_id'] != $defaultValue['province_id']) {
            $this->msg = "市地区不在该省地区里";
            return false;
        }
        $countyData = array_where($region['county'], function ($v) use ($defaultValue) {
            return $v['id'] == $defaultValue['county_id'];
        });
        $countyData = array_collapse($countyData);
        if ($countyData['parent_id'] != $defaultValue['city_id']) {
            $this->msg = "区、县地区不在该市地区里";
            return false;
        }
        return true;
    }
}