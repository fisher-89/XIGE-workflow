<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2/002
 * Time: 9:47
 *
 * 员工控件、部门控件、店铺控件、地区创建表操作
 */

namespace App\Services\Admin\Form;


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

trait FormDataFieldTypeTable
{
    /**
     * 创建表单data字段控件表
     * @param $fields
     */
    protected function createFormDataFieldTypeTable(array $fields)
    {
        foreach ($fields as $field) {
            $tableName = $this->tableName . '_fieldType_' . $field['key'];
            switch ($field['type']) {
                case 'staff'://员工控件
                    $this->createFieldTable($tableName, $field);
                    break;
                case 'department'://部门控件
                    $this->createFieldTable($tableName, $field);
                    break;
                case 'shop'://店铺控件
                    $this->createFieldTable($tableName, $field);
                    break;
            }
        }
    }

    /**
     * 删除表单字段控件表
     * @param $fieldKey
     */
    public function destroyFormDataFieldTypeTable($fieldKey)
    {
        $tableName = $this->tableName . '_fieldType_' . $fieldKey;
        Schema::dropIfExists($tableName);
    }

    /**
     * 创建表单字段控件表
     * @param $tableName
     * @param $field
     */
    private function createFieldTable(string $tableName, array $field)
    {
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) use ($field) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->unsignedInteger('run_id')->index()->comment('运行id');
                $table->string($field['key'] . '_id')->index()->comment('表单字段控件ID');
                $table->string('value')->index()->comment('控件键');
                $table->string('text')->comment('控件值');
            });
        }
    }
}