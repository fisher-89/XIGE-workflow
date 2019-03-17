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
        $this->createTable($fields);
        //创建表单data字段控件表
        $this->createFormDataFieldTypeTable($fields);
    }

    /**
     * 创建表单data控件表
     * @param $data
     */
    public function createFormGridTable(array $data)
    {
        $this->tableName = $this->tableName . '_' . $data['key'];
        $this->createTable($data['fields']);
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
     * 修改表单data表(form_data表无数据)
     */
    public function updateFormDataTable()
    {
        $fields = $this->getFormFields()->toArray();
        //删除表单data表
        Schema::dropIfExists($this->tableName);
        //创建表单Ddata表
        $this->createTable($fields);
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

    protected function createTable(array $formFields)
    {
        if (!Schema::hasTable($this->tableName)) {
            Schema::create($this->tableName, function (Blueprint $table) use ($formFields) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->unsignedInteger('run_id')->index()->comment('运行id');
                $gridIds = array_pluck($formFields, 'form_grid_id');
                if (!empty($gridIds[0])) {
                    //控件关联表单Data的ID
                    $table->unsignedInteger('data_id')->nullable()->comment('表单dataId')->index();
                }
                foreach ($formFields as $k => $v) {
                    switch ($v['type']) {
                        case 'int':
                            if ($v['scale']) {
                                $max = $v['max']?strlen($v['max']) - 1:20;
                                $table->decimal($v['key'], $max, $v['scale'])->nullable()->comment($v['name']);
                            } else {
                                $table->bigInteger($v['key'])->nullable()->comment($v['name']);
                            }
                            break;
                        case 'text':
                            if ($v['max'] && $v['max'] < 255) {
                                $table->string($v['key'])->nullable()->comment($v['name'])->default('');
                            } else {
                                $table->text($v['key'])->nullable()->comment($v['name']);
                            }
                            break;
                        case 'date':
                            $table->date($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'datetime':
                            $table->dateTime($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'time':
                            $table->time($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'array':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'select':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'file':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'staff':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'department':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'shop':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        case 'region':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            switch ($v['region_level']) {
                                case 1:
                                    $table->string($v['key'].'_province_id')->nullable()->index()->comment($v['name'].'的省编码')->default('');
                                    break;
                                case 2:
                                    $table->string($v['key'].'_province_id')->nullable()->index()->comment($v['name'].'的省编码')->default('');
                                    $table->string($v['key'].'_city_id')->nullable()->index()->comment($v['name'].'的市编码')->default('');
                                    break;
                                case 3:
                                    $table->string($v['key'].'_province_id')->nullable()->index()->comment($v['name'].'的省编码')->default('');
                                    $table->string($v['key'].'_city_id')->nullable()->index()->comment($v['name'].'的市编码')->default('');
                                    $table->string($v['key'].'_county_id')->nullable()->index()->comment($v['name'].'的区、县编码')->default('');
                                    break;
                                case 4:
                                    $table->string($v['key'].'_province_id')->nullable()->index()->comment($v['name'].'的省编码')->default('');
                                    $table->string($v['key'].'_city_id')->nullable()->index()->comment($v['name'].'的市编码')->default('');
                                    $table->string($v['key'].'_county_id')->nullable()->index()->comment($v['name'].'的区、县编码')->default('');
                                    $table->text($v['key'].'_address')->nullable()->comment($v['name'].'的详细地址');
                                    break;
                            }
                            break;
                        case 'api':
                            $table->text($v['key'])->nullable()->comment($v['name']);
                            break;
                        default :
                            $table->text($v['key'])->nullable()->comment($v['name']);
                    }
                }
                $table->nullableTimestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * 修改表单data表（追加字段）
     * @param array $field
     */
    public function saveFormFieldTable(array $field)
    {
        Schema::table($this->tableName,function(Blueprint $table)use($field){
            switch ($field['type']) {
                case 'int':
                    if ($field['scale']) {
                        $max = $field['max']?strlen($field['max']) - 1:20;
                        $table->decimal($field['key'], $max, $field['scale'])->nullable()->comment($field['name']);
                    } else {
                        $table->bigInteger($field['key'])->nullable()->comment($field['name']);
                    }
                    break;
                case 'text':
                    if ($field['max'] && $field['max'] < 255) {
                        $table->string($field['key'])->nullable()->comment($field['name'])->default('');
                    } else {
                        $table->text($field['key'])->nullable()->comment($field['name']);
                    }
                    break;
                case 'date':
                    $table->date($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'datetime':
                    $table->dateTime($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'time':
                    $table->time($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'array':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'select':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'file':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'staff':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'department':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'shop':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                case 'region':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    switch ($field['region_level']) {
                        case 1:
                            $table->string($field['key'].'_province_id')->nullable()->index()->comment($field['name'].'的省编码')->default('');
                            break;
                        case 2:
                            $table->string($field['key'].'_province_id')->nullable()->index()->comment($field['name'].'的省编码')->default('');
                            $table->string($field['key'].'_city_id')->nullable()->index()->comment($field['name'].'的市编码')->default('');
                            break;
                        case 3:
                            $table->string($field['key'].'_province_id')->nullable()->index()->comment($field['name'].'的省编码')->default('');
                            $table->string($field['key'].'_city_id')->nullable()->index()->comment($field['name'].'的市编码')->default('');
                            $table->string($field['key'].'_county_id')->nullable()->index()->comment($field['name'].'的区、县编码')->default('');
                            break;
                        case 4:
                            $table->string($field['key'].'_province_id')->nullable()->index()->comment($field['name'].'的省编码')->default('');
                            $table->string($field['key'].'_city_id')->nullable()->index()->comment($field['name'].'的市编码')->default('');
                            $table->string($field['key'].'_county_id')->nullable()->index()->comment($field['name'].'的区、县编码')->default('');
                            $table->text($field['key'].'_address')->nullable()->comment($field['name'].'的详细地址');
                            break;
                    }
                    break;
                case 'api':
                    $table->text($field['key'])->nullable()->comment($field['name']);
                    break;
                default :
                    $table->text($field['key'])->nullable()->comment($field['name']);
            }
        });
    }

    /**
     * 修改表单data表（修改注释字段）
     * @param array $field
     */
    public function saveFormFieldTableComment(array $field)
    {
        Schema::table($this->tableName,function(Blueprint $table)use($field){
            switch ($field['type']) {
                case 'int':
                    if ($field['scale']) {
                        $max = $field['max']?strlen($field['max']) - 1:20;
                        $table->decimal($field['key'], $max, $field['scale'])->comment($field['name'])->change();
                    } else {
                        $table->bigInteger($field['key'])->comment($field['name'])->change();
                    }
                    break;
                case 'text':
                    if ($field['max'] && $field['max'] < 255) {
                        $table->string($field['key'])->comment($field['name'])->change();
                    } else {
                        $table->text($field['key'])->comment($field['name'])->change();
                    }
                    break;
                case 'date':
                    $table->date($field['key'])->comment($field['name'])->change();
                    break;
                case 'datetime':
                    $table->dateTime($field['key'])->comment($field['name'])->change();
                    break;
                case 'time':
                    $table->time($field['key'])->comment($field['name'])->change();
                    break;
                case 'array':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                case 'select':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                case 'file':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                case 'staff':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                case 'department':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                case 'shop':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                case 'region':
                    $table->text($field['key'])->comment($field['name'])->change();
                    switch ($field['region_level']) {
                        case 1:
                            $table->string($field['key'].'_province_id')->comment($field['name'].'的省编码')->change();
                            break;
                        case 2:
                            $table->string($field['key'].'_province_id')->comment($field['name'].'的省编码')->change();
                            $table->string($field['key'].'_city_id')->comment($field['name'].'的市编码')->change();
                            break;
                        case 3:
                            $table->string($field['key'].'_province_id')->comment($field['name'].'的省编码')->change();
                            $table->string($field['key'].'_city_id')->comment($field['name'].'的市编码')->change();
                            $table->string($field['key'].'_county_id')->comment($field['name'].'的区、县编码')->change();
                            break;
                        case 4:
                            $table->string($field['key'].'_province_id')->comment($field['name'].'的省编码')->change();
                            $table->string($field['key'].'_city_id')->comment($field['name'].'的市编码')->change();
                            $table->string($field['key'].'_county_id')->comment($field['name'].'的区、县编码')->change();
                            $table->text($field['key'].'_address')->comment($field['name'].'的详细地址')->change();
                            break;
                    }
                    break;
                case 'api':
                    $table->text($field['key'])->comment($field['name'])->change();
                    break;
                default :
                    $table->text($field['key'])->comment($field['name'])->change();
            }
        });
    }

    /**
     * 表单控件表修改（追加字段）
     * @param array $data
     */
    public function saveFormGridTable(array $data)
    {
        $this->tableName = $this->tableName . '_' . $data['key'];
        $this->saveFormFieldTable($data['field']);
    }

    /**
     * 表单控件表修改（修改注释）
     * @param array $data
     */
    public function saveFormGridTableComment(array $data)
    {
        $this->tableName = $this->tableName . '_' . $data['key'];
        $this->saveFormFieldTableComment($data['field']);
    }
}