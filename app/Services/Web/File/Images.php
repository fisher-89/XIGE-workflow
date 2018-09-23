<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/23/023
 * Time: 14:19
 */

namespace App\Services\Web\File;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Images
{
    /**
     * 上传图片
     * @param $request
     * @return array
     */
    public function uploadPic($request)
    {
        $file = $request->file('upFile');
        $originalExtension = $file->getClientOriginalExtension(); // 扩展名
        $name =  Auth::id() .'_'.time();
        $newFileName = $name . '.' . $originalExtension;//新的文件名
        $newFilePath = 'uploads/temporary/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';//新的文件路径
        $file->storeAs($newFilePath, $newFileName, 'public');//图片存储

        //缩略图处理
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $newThumbFileName = $name . '_thumb' . '.' . $originalExtension;//缩略图文件名
        $thumbImg = Image::make($realPath)->resize(100, 100);
        $thumbImg->save(Storage::disk('public')->copy($newFilePath . $newFileName, $newFilePath . $newThumbFileName));//缩略图保存
//        $thumbImg->save(public_path('storage/' . $newFilePath . $newThumbFileName));//缩略图保存

        $path = '/storage/' . $newFilePath . $newFileName;
        return [
            'path' => $path,
            'url' => config('app.url') . $path,
            'thumb_url' => config('app.url') . '/storage/' . $newFilePath . $newThumbFileName
        ];
    }

    /**
     * 复制临时文件到正式目录
     * @param $path
     */
    public function copyTempFile($path)
    {

    }
}