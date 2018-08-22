<?php

namespace App\Jobs;

use App\Services\Web\CallbackService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

class SendCallback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;//最大尝试次数
    private $stepRunId;//步骤运行ID
    private $type;//回调类型

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($stepRunId, $type)
    {
        $this->stepRunId = $stepRunId;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CallbackService $callbackService)
    {
        $callbackService->sendCallback($this->stepRunId, $this->type);
    }

    public function failed(\Exception $exception)
    {
        //队列失败处理
//        dd($exception);
    }
}
