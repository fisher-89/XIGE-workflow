<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/1/001
 * Time: 9:55
 */

namespace App\Services\Admin;


use App\Models\Field;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FormFieldsService
{
    use FormGrids;

    public $formId;
    public $tableName;

    public function __construct($formId)
    {
        $this->formId = $formId;
        $this->tableName = 'form_data_' . $formId;
    }


    /**
     * 获取表单的字段
     */
    public function getFormFields()
    {
        return Field::where('form_id', $this->formId)->whereNull('form_grid_id')->get();
    }

    /**
     * 创建表单数据表
     */
    public function createFormDataTable()
    {
        $fields = $this->getFormFields();
        $formFields = $this->analyticalFields($fields);
        $this->createTable($formFields);
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

    public function createTable($formFields)
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
     * 修改表单数据表字段
     */
    public function updateFormDataTable()
    {
        Schema::dropIfExists($this->tableName);
        $fields = $this->getFormFields();
        $this->createTable($this->analyticalFields($fields));
    }

    /**
     * 解析字段
     */
    public function analyticalFields($fields)
    {
        $data = [];
        foreach ($fields as $k => $v) {
            $data[$k] = $this->field($v);
        }
        return $data;
    }


    private function field($v)
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
    public function date($v)
    {
        $v['type'] = 'date';
        return $v;
    }

    public function datetime($v)
    {
        $v['type'] = 'datetime';
        return $v;
    }

    public function time($v)
    {
        $v['type'] = 'time';
        return $v;
    }

    public function file($v)
    {
        $v['type'] = 'text';
        return $v;
    }

    public function department($v)
    {
        $v['type'] = 'string';
        return $v;
    }

    public function staff($v)
    {
        $v['type'] = 'string';
        return $v;
    }

    public function shop($v)
    {
        $v['type'] = 'string';
        return $v;
    }

    public function region($v)
    {
        $v['type'] = 'string';
        return $v;
    }
}