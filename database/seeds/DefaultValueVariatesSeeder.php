<?php

use Illuminate\Database\Seeder;

class DefaultValueVariatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['key' => 'staff_sn', 'name' => '员工编号', 'code' => 'app(\'auth\')->user()->staff_sn'],
            ['key' => 'realname', 'name' => '姓名', 'code' => 'app(\'auth\')->user()->realname'],
            ['key' => 'mobile', 'name' => '手机', 'code' => 'app(\'auth\')->user()->mobile'],
            ['key' => 'department_id', 'name' => '部门ID', 'code' => 'app(\'auth\')->user()->department[\'id\']'],
            ['key'=>'department_name','name'=>'部门名称','code'=>'app(\'auth\')->user()->department[\'full_name\']'],
            ['key'=>'department_full_name','name'=>'部门全称','code'=>'app(\'auth\')->user()->department[\'full_name\']'],
            ['key'=>'position_id','name'=>'职位ID','code'=>'app(\'auth\')->user()->position[\'id\']'],
            ['key'=>'position_name','name'=>'职位名称','code'=>'app(\'auth\')->user()->position[\'name\']'],
            ['key'=>'brand_id','name'=>'品牌ID','code'=>'app(\'auth\')->user()->brand[\'id\']'],
            ['key'=>'brand_name','name'=>'品牌名称','code'=>'app(\'auth\')->user()->brand[\'name\']'],
            ['key'=>'shop_sn','name'=>'店铺代码','code'=>'app(\'auth\')->user()->shop[\'shop_sn\']'],
            ['key'=>'shop_name','name'=>'店铺名称','code'=>'app(\'auth\')->user()->shop[\'name\']'],
            ['key'=>'shop_manager_sn','name'=>'店长编号','code'=>'app(\'auth\')->user()->shop[\'manager_sn\']'],
            ['key'=>'shop_manager_name','name'=>'店长姓名','code'=>'app(\'auth\')->user()->shop[\'manager_name\']'],
            ['key'=>'status_id','name'=>'状态ID','code'=>'app(\'auth\')->user()->status[\'id\']'],
            ['key'=>'status_name','name'=>'状态名称','code'=>'app(\'auth\')->user()->status[\'name\']'],
            ['key'=>'year','name'=>'年','code'=>'date(\'Y\',time())'],
            ['key'=>'month','name'=>'月','code'=>'date(\'m\',time())'],
            ['key'=>'day','name'=>'日','code'=>'date(\'d\',time())'],
            ['key'=>'time','name'=>'时','code'=>'date(\'H\',time())'],
            ['key'=>'minute','name'=>'分','code'=>'date(\'i\',time())'],
            ['key'=>'second','name'=>'秒','code'=>'date(\'s\',time())'],
            ['key'=>'week','name'=>'星期','code'=>'date(\'w\',time())'],
        ];
        \Illuminate\Support\Facades\DB::table('default_value_variates')->insert($data);
        app('defaultValueVariate')->clearVariateCache();//清楚变量的缓存
    }
}
