<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FileRequest;
use App\Services\ResponseService;
use App\Services\Web\File\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    protected $response;
    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    public function index(FileRequest $request,Images $images)
    {
        $data = $images->uploadPic();
        return $this->response->post($data);
    }

    /**
     * 清楚临时文件
     * @return mixed
     */
    public function clearTempFile()
    {
        $tempFile = Storage::disk('public')->deleteDirectory('uploads/temporary');
        if (!$tempFile)
            abort(403, '清楚临时文件失败');
        return $this->response->delete();
    }
}
