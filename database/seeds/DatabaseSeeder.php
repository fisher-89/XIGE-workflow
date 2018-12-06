<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(DefaultValueCalculationsSeeder::class);//运算值
        $this->call(DefaultValueVariatesSeeder::class);//系统变量
        $this->call(RegionSeeder::class);//地区
        //操作
        $this->call(HandlesTableSeeder::class);
    }
}
