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
     * 修改表单data表
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
                $gridIds = array_pluck($formFields,'form_grid_id');
                if(!empty($gridIds)){
                    //控件关联表单Data的ID
                    $table->unsignedInteger('data_id')->nullable()->comment('表单dataId')->index();
                }
                foreach ($formFields as $k => $v) {
                    switch ($v['type']) {
                        case 'int':
                            if($v['scale']){
                                $max = strlen($v['max'])-1;
                                $table->decimal($v['key'],$max,$v['scale'])->nullable()->comment($v['description']);
                            }else{
                                $table->unsignedInteger($v['key'])->nullable()->comment($v['description']);
                            }
                            break;
                        case 'text':
                            if ($v['max'] && $v['max'] < 255) {
                                $table->char($v['key'], $v['max'])->nullable()->comment($v['description']);
                            } else {
                                $table->text($v['key'])->nullable()->comment($v['description']);
                            }
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
                        case 'array':
                            $table->text($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'select':
                            $table->text($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'file':
                            $table->text($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'staff':
                            $table->string($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'department':
                            $table->string($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'shop':
                            $table->string($v['key'])->nullable()->comment($v['description']);
                            break;
                        case 'region':
                            switch($v['region_level']){
                                case 1:
                                    $table->char('province_id',20)->nullable()->index()->comment('地区 省编码');
                                    break;
                                case 2:
                                    $table->char('province_id',20)->nullable()->index()->comment('地区 省编码');
                                    $table->char('city_id',20)->nullable()->index()->comment('地区 市编码');
                                    break;
                                case 3:
                                    $table->char('province_id',20)->nullable()->index()->comment('地区 省编码');
                                    $table->char('city_id',20)->nullable()->index()->comment('地区 市编码');
                                    $table->char('county_id',20)->nullable()->index()->comment('地区 区、县编码');
                                    break;
                                case 4:
                                    $table->char('province_id',20)->nullable()->index()->comment('地区 省编码');
                                    $table->char('city_id',20)->nullable()->index()->comment('地区 市编码');
                                    $table->char('county_id',20)->nullable()->index()->comment('地区 区、县编码');
                                    $table->text('address')->nullable()->comment('地区 详细地址');
                                    break;
                            }
                            break;
                    }
                }
                $table->nullableTimestamps();
                $table->softDeletes();
            });
        }
    }
}