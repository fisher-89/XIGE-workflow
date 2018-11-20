<?php

namespace App\Console\Commands\Admin;

use Illuminate\Console\Command;

class ClearVariate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'variate:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '系统变量与计算公式缓存清理';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $variate = app('defaultValueVariate')->clear();//清楚变量的缓存
        $calculation = app('defaultValueCalculation')->clear();//清楚计算公式缓存
        if($variate){
            $this->info('系统变量缓存清除成功');
        }else{
            $this->error('系统变量缓存清除失败');
        }

        if($calculation){
            $this->info('计算公式缓存清除成功');
        }else{
            $this->error('计算公式缓存清除失败');
        }
    }
}
