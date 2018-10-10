<?php

namespace App\Http\Controllers\Api\Web;

use App\Repository\Web\StaffRepository;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApproveStaffController extends Controller
{
    protected $response;
    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * 获取全部审批人
     * @param Request $request
     * @param StaffRepository $staffRepository
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getAllApproveStaff(Request $request,StaffRepository $staffRepository){
        $data = $staffRepository->getDepartmentUser($request);
        return $this->response->get($data);
    }
}
