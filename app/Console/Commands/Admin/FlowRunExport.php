<?php

namespace App\Console\Commands\Admin;

use App\Exports\Admin\FlowRun\FormExport;
use App\Models\Form;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FlowRunExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:flow-run {--formId=*} {--flowRunId=*} {--code=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '流程运行记录导出';

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
        $formIds = $this->option('formId');
        $flowRunIds = $this->option('flowRunId');
        $code = $this->option('code');

        $form = Form::withTrashed()->findOrFail($formIds[0]);
        $filePath = 'excel/' . $form->name . '-' . $code . '.xlsx';
        $excel = new FormExport($formIds, $flowRunIds, $code, $filePath);

//        $excel->queue($filePath,'public');

        $excel->store($filePath, 'public');

        $data = Cache::get($code);
        Cache::put($code, [
            'progress' => 100,
            'type' => 'finish',
            'message' => '完成',
            'path' => $data['path'],
            'url' => $data['url']
        ], 120);

    }
}
