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
    public function uploadPic()
    {
        $file = request()->file('upFile');
        // 扩展名
        $originalExtension = $file->getClientOriginalExtension();
        //文件名称
        $name = $this->setFileName();
        $newFileName = $name . '.' . $originalExtension;//新的文件名
        $path = 'uploads/temporary/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';//新的文件路径
        $file->storeAs($path, $newFileName, 'public');//文件存储

        $responsePath = '/storage/' . $path;
        $response = [
            'path' => $responsePath.$newFileName,
            'url' => config('app.url') . $responsePath.$newFileName,
        ];

        $images = ['jpeg','jpg','png','gif','psd','swf','bmp','emf'];
        if(in_array($originalExtension,$images)){
            //缩略图处理
            $newThumbFileName = $name . '_thumb' . '.' . $originalExtension;//缩略图文件名
            Image::make($file)->resize(100,100)->save(storage_path('app/public/'.$path.$newThumbFileName));
            $response['thumb_url'] = config('app.url') .$responsePath . $newThumbFileName;
        }

        return $response;
    }

    /**
     * 生成文件名
     * @return string
     */
    protected function setFileName()
    {
        $str = '1234567890';
        $random = '';
        for ($i = 1; $i <= 6; $i++) {
            $random .= mt_rand(0, strlen($str) - 1);
        }
        $name = Auth::id() . '_' . date('YmdHis') . '_' . $random;
        return $name;
    }

    /**
     * 复制临时文件到正式目录
     * @param $path
     */
    public function copyTempFile($path)
    {
        $fileTemp = str_replace('/storage/', '', $path);
        $checkFileTemp = Storage::disk('public')->exists($fileTemp);
        if (!$checkFileTemp) {
            abort(404, $fileTemp . '该文件不存在');
        }
        $newPath = 'uploads/perpetual/';
        if (!Storage::disk('public')->exists($newPath)) {
            //无路径
            Storage::disk('public')->makeDirectory($newPath);
        }
        $filePermanent = str_replace('uploads/temporary/', $newPath, $fileTemp);
        if (!Storage::disk('public')->exists($filePermanent)) {
            Storage::disk('public')->copy($fileTemp, $filePermanent);
        }

        //缩略图处理
        $sub = explode('.', $fileTemp);
        $images = ['jpeg','jpg','png','gif','psd','swf','bmp','emf'];
        if(in_array($sub[1],$images)){
            //缩略图片
            $thumbFileTemp = $sub[0] . '_thumb.' . $sub[1];//缩略临时路径
            $checkThumbFileTemp = Storage::disk('public')->exists($thumbFileTemp);
            if (!$checkThumbFileTemp) {
                abort(404, $thumbFileTemp . '该缩略图不存在');
            }
            $thumbFilePermanent = str_replace('uploads/temporary/', $newPath, $thumbFileTemp);
            if (!Storage::disk('public')->exists($thumbFilePermanent)) {
                Storage::disk('public')->copy($thumbFileTemp, $thumbFilePermanent);
            }
        }
        return '/storage/' . $filePermanent;
    }

    /**
     * 清除临时文件
     * @param int|null $month
     * @return mixed
     */
    public function clearTempFile(int $year = null,int $month = null)
    {
        if(is_null($month)){
            //删除全部
            return Storage::disk('public')->deleteDirectory('uploads/temporary');
        }
        return Storage::disk('public')->deleteDirectory('uploads/temporary/'.$year.'/'.$month);
    }
}