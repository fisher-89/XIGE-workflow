<?php

namespace App\Rules\Admin\Validator;

use Illuminate\Contracts\Validation\Rule;

class Params implements Rule
{
    protected $type;
    protected $msg='';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        switch ($this->type) {
            case 'regex':
                $regex= '/^\/.*\/$/';
                if(!preg_match($regex,$value)){
                    $this->msg = '正则类型的规则参数配置错误';
                    return false;
                }
                break;
            case 'in':
                $regex = '/^.*$/';
                if(!preg_match($regex,$value)){
                    $this->msg = '可选值类型的规则参数配置错误';
                    return false;
                }
                break;
            case 'mimes':
                $mimeTypes = [
                    'jpeg','png','gif','psd','swf','bmp','emf','txt','html','htm','pdf','xlsx','xls','doc','docx','ppt','zip','rar','log','sql','mp4','3gp','avi','wmv','mp3','wmv','wave'
                ];
                $reqParams = explode(',',$value);
                foreach ($reqParams as $v){
                    if(!in_array($v,$mimeTypes)){
                        $this->msg = '文件类型的规则参数配置错误';
                        return false;
                    }
                }
                break;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
