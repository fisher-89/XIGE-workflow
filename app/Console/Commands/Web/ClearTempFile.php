<?php

namespace App\Console\Commands\Web;

use App\Models\Crontab;
use App\Services\Web\File\Images;
use Illuminate\Console\Command;

class ClearTempFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:clear-cache {month?} {--crontab}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '清除临时文件';


    protected $images;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Images $images)
    {
        parent::__construct();
        $this->images = $images;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //清除的月份
        $month = $this->argument('month');
        //定时开关
        $crontab = $this->option('crontab');
        if ($crontab) {
            //定时任务执行
            $month = date('m', strtotime('-1 month'));
        } else {
            //command 命令执行
        }
        $clear = $this->images->clearTempFile($month);
        if ($crontab) {
            $data = [
                'type' => 'file',
                'year' => date('Y'),
                'month' => $month,
                'status' => $clear ? "1" : "0",
            ];
            Crontab::create($data);
        }
        if ($clear) {
            $this->info('清除临时文件成功');
        } else {
            $this->info('没有删除的目录');
        }
    }
}
