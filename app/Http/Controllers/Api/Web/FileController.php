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
    protected $images;
    public function __construct(ResponseService $responseService,Images $images)
    {
        $this->response = $responseService;
        $this->images = $images;
    }

    public function index(FileRequest $request)
    {
        $data = $this->images->uploadPic();
        return $this->response->post($data);
    }
}
