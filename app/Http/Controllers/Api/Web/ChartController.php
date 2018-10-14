<?php

namespace App\Http\Controllers\Api\Web;

use App\Repository\Web\Chart\FlowStepChartRepository;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    protected $response;
    protected $chart;//流程步骤图

    public function __construct(ResponseService $responseService,FlowStepChartRepository $flowStepChartRepository)
    {
        $this->response = $responseService;
        $this->chart = $flowStepChartRepository;
    }

    public function index(Request $request)
    {
        $data = $this->chart->getFlowStepChart($request->route('step_run_id'));
        return $this->response->get($data);
    }
}
