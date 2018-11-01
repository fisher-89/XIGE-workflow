<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendCallback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;//最大尝试次数
    protected $sendFunction;//发起回调请求

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sendFunction)
    {
        $this->sendFunction= $sendFunction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendFunction;
    }

    public function failed(\Exception $exception)
    {
        //队列失败处理
//        dd($exception);
    }
}
