<?php

namespace App\Http\Middleware;

use Closure;

class OperationLog
{
    protected $log;

    public function __construct(\App\Services\Admin\Log\OperationLog $log)
    {
        $this->log = $log;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //写入操作日志
        $this->log->writeLog($request);
        return $next($request);
    }
}
