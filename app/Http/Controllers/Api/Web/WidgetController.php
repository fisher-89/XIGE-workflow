<?php

namespace App\Http\Controllers\Api\Web;

use App\Repository\ApiConfigurationRepository;
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

    /**
     * 获取员工数据
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getStaff(Request $request)
    {
        $data = $this->widget->getStaff($request);
        return $this->response->get($data);
    }

    /**
     * 获取部门数据
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getDepartment(Request $request)
    {
        $data = $this->widget->getDepartment($request);
        return $this->response->get($data);
    }

    /**
     * 获取店铺
     * @param Request $request
     */
    public function getShops(Request $request){
        $data = $this->widget->getShop($request);
        return $this->response->get($data);
    }

    /**
     * 获取OA接口配置数据
     * @param $id
     * @param ApiConfigurationRepository $apiConfigurationRepository
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getOaApi($id,ApiConfigurationRepository $apiConfigurationRepository)
    {
        $data = $apiConfigurationRepository->getOaApiConfigurationResult($id);
        return $this->response->get($data);
    }
}
