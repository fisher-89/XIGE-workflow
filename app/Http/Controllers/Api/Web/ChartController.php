<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\Step;
use App\Models\StepRun;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    protected $response;

    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    public function index(Request $request)
    {
        $stepRunId = intval($request->step_run_id);
        $stepRunData = StepRun::where('approver_sn', app('auth')->id())->find($stepRunId);
        if (!$stepRunData)
            abort(404, '步骤不存在');
        $data = Step::with(['stepRun' => function ($query) use ($stepRunData) {
            $query->where('flow_run_id', $stepRunData->flow_run_id)
                ->orderBy('step_key', 'asc');
        }])
            ->where('flow_id', $stepRunData->flow_id)
            ->orderBy('step_key', 'asc')
            ->get();
        return $this->response->get($data);
    }
}
