<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/31/031
 * Time: 16:37
 */

namespace App\Services\Admin\Form;


use App\Models\Field;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class FormDataTableService
{
    use FormDataFieldTypeTable;//表单data字段类型控件表

    //表单ID
    private $formId;
    //表单data的表名
    private $tableName;

    public function __construct($formId)
    {
        $this->formId = $formId;
        $this->tableName = 'form_data_' . $formId;
    }

    /**
     * 创建表单data表
     */
    public function createFormDataTable()
    {
        $fields = $this->getFormFields()->toArray();
        $formFields = $this->analyticalFields($fields);
        $this->createTable($formFields);
        //创建表单data字段控件表
        $this->createFormDataFieldTypeTable($fields);
    }

    /**
     * 创建表单data控件表
     * @param $data
     */
    public function createFormGridTable($data)
    {
        $this->tableName = $this->tableName . '_' . $data['key'];
        $gridFields = $this->analyticalFields($data['fields']);//解析字段
        $gridFields[] = ['type' => 'int', 'key' => 'data_id', 'description' => '表单dataId'];
        $this->createTable($gridFields);
        //创建表单data字段控件表
        $this->createFormDataFieldTypeTable($data['fields']);
    }

    /**
     * 获取表单data数据条数
     */
    public function getFormDataCount()
    {
        if (!Schema::hasTable($this->tableName))
            $this->createFormDataTable();
        $formDataCount = DB::table($this->tableName)->limit(1)->count();
        return $formDataCount;
    }

    /**
     * 删除表单data控件表
     * @param $formGridKey
     */
    public function destroyFormGridTable($formGridKey)
    {
        $this->tableName = $this->tableName . '_' . $formGridKey;
        Schema::dropIfExists($this->tableName);
    }

    /**
     * 修改表单data表
     */
    public function updateFormDataTable()
    {
        $fields = $this->getFormFields()->toArray();
        //删除表单data表
        Schema::dropIfExists($this->tableName);
        //创建表单Ddata表
        $this->createTable($this->analyticalFields($fields));
        //创建表单字段控件表
        $this->createFormDataFieldTypeTable($fields);
    }

    /**
     * 获取表单的字段
     */
    public function getFormFields()
    {
        return Field::where('form_id', $this->formId)->whereNull('form_grid_id')->get();
    }

    protected function createTable($formFields)
    {
        if (!Schema::hasTable($this->tableName)) {
            Schema::create($this->tableName, function (Blueprint $table) use ($formFields) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->unsignedInteger('run_id')->index()->comment('运行id');
                foreach ($formFields as $k => $v) {
                    switch ($v['type']) {
                        case 'int':
                            $table->unsignedInteger($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'decimal':
                            $table->decimal($v['key'], $v['max'], $v['scale'])->nullable()->comment($v['description']);
                            break;
                        case 'char':
                            $table->char($v['key'], $v['max'])->nullable()->comment($v['description']);
                            break;
                        case 'text':
                            $table->text($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'date':
                            $table->date($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'datetime':
                            $table->dateTime($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'time':
                            $table->time($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'string':
                            $table->string($v['key'])->nullable()->comment($v['description']);
                    }
                }
                $table->nullableTimestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * 解析字段
     */
    protected function analyticalFields(array $fields)
    {
        $data = [];
        foreach ($fields as $k => $v) {
            $item = $v;
            $data[$k] = $this->field($item);
        }
        return $data;
    }

    protected function field($v)
    {
        switch ($v['type']) {
            case 'int':
                $v = $this->int($v);
                break;
            case 'text':
                $v = $this->text($v);
                break;
            case 'date':
                $v = $this->date($v);
                break;
            case 'datetime':
                $v = $this->datetime($v);
                break;
            case 'time':
                $v = $this->time($v);
                break;
            case 'file':
                $v = $this->file($v);
                break;
            case 'array':
                $v = $this->array($v);
                break;
            case'department':
                $v = $this->department($v);
                break;
            case'staff':
                $v = $this->staff($v);
                break;
            case'shop':
                $v = $this->shop($v);
                break;
            case'region'://地区
                $v = $this->region($v);
                break;
        }
        return $v;
    }

    private function int($v)
    {
        if ($v['scale'] == 0 || $v['scale'] == null || $v['scale'] == '') {
            //无小数位数
            $v['type'] = 'int';
        } else {
            //含有小数
            $v['max'] = strlen($v['max']);
            $v['type'] = 'decimal';
        }
        return $v;
    }

    private function text($v)
    {
        if ($v['max'] && $v['max'] < 255) {
            $v['type'] = 'char';
        } else {
            $v['type'] = 'text';
        }
        return $v;
    }

    private function array($v)
    {
        $v['type'] = 'text';
        return $v;
    }

    /**
     * @return mixed
     */
    private function date($v)
    {
        $v['type'] = 'date';
        return $v;
    }

    private function datetime($v)
    {
        $v['type'] = 'datetime';
        return $v;
    }

    private function time($v)
    {
        $v['type'] = 'time';
        return $v;
    }

    private function file($v)
    {
        $v['type'] = 'text';
        return $v;
    }

    private function department($v)
    {
        $v['type'] = 'string';
        return $v;
    }

    private function staff($v)
    {
        $v['type'] = 'string';
        return $v;
    }

    private function shop($v)
    {
        $v['type'] = 'string';
        return $v;
    }

    private function region($v)
    {
        $v['type'] = 'string';
        return $v;
    }
}