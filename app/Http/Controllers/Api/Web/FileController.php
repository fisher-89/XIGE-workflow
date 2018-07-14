<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{

    public function index(FileRequest $request)
    {
        $file = $request->file('upFile');
        $originalExtension = $file->getClientOriginalExtension(); // 扩展名
        $name = time() . Auth::id();
        $newFileName = $name . '.' . $originalExtension;//新的文件名
        $newFilePath = 'uploads/temporary/';//新的文件路径
        $file->storeAs($newFilePath, $newFileName, 'public');//图片存储

        //缩略图处理
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $newThumbFileName = $name . '_thumb' . '.' . $originalExtension;//缩略图文件名
        $thumbImg = Image::make($realPath)->resize(100, 100);
        $thumbImg->save(public_path('storage/' . $newFilePath . $newThumbFileName));//缩略图保存

        $path = '/storage/' . $newFilePath . $newFileName;
        return [
            'path' => $path,
            'url' => env('APP_URL') . $path,
            'thumb_url' => env('APP_URL') . '/storage/' . $newFilePath . $newThumbFileName
        ];
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
        return app('apiResponse')->delete();
    }
}
