<?php

namespace App\Http\Controllers\Api\Web;

use App\Repository\Web\WidgetRepository;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{
    protected $response;
    protected $widget;

    public function __construct(ResponseService $responseService,WidgetRepository $widgetRepository)
    {
        $this->response = $responseService;
        $this->widget = $widgetRepository;
    }

    public function getStaff(Request $request)
    {
        $data = $this->widget->getStaff($request);
        return $this->response->get($data);
    }

//    public function getDepartment(Request $request)
//    {
//        $data = $this->widget->getDepartment($request);
//        return $this->response->get($data);
//    }
}
