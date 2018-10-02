<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2/002
 * Time: 14:26
 * 接口配置获取数据
 */

namespace App\Repository;


use App\Models\FieldApiConfiguration;

class ApiConfigurationRepository
{
    /**
     * 获取接口配置数据
     * @param $id
     * @return array
     */
    public function getOaApiConfigurationResult($id)
    {
        $data = FieldApiConfiguration::find($id);
        if (is_null($data))
            abort(404, '数据不存在');
        $url = $data->url;
        try{
            $result = app('curl')->get($url);
        }catch(\Exception $e){
            abort(400,'接口地址错误');
        }
        $columns = array_keys($result[0]);
        if(!in_array($data->value,$columns) || !in_array($data->text,$columns)){
            abort(400,'接口配置 '.$data->name.'的显示值或者显示文本不存在');
        }
        $response = [];
        foreach($result as $k=>$v){
            $item['value'] = $v[$data->value];
            $item['text'] = $v[$data->text];
            $response[] = $item;
        }
        return $response;
    }
}