<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

class FlowRunLogDownloadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $formIds;
    protected $flowRunIds;
    protected $code;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $formIds,array $flowRunIds,string $code)
    {
        $this->formIds = $formIds;
        $this->flowRunIds = $flowRunIds;
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('excel:flow-run', [
            '--formId' => $this->formIds,
            '--flowRunId' => $this->flowRunIds,
            '--code' => $this->code
        ]);
    }
}
