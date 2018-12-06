<?php

use Illuminate\Database\Seeder;

class HandlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'select'],
            ['name'=>'insert'],
            ['name'=>'update'],
            ['name'=>'delete'],
        ];
        \App\Models\Auth\AuthHandle::insert($data);
    }
}
