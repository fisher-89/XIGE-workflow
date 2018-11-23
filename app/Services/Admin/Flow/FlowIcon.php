<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/20/020
 * Time: 16:07
 * 流程图标
 */

namespace App\Services\Admin\Flow;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FlowIcon
{
    /**
     * 上传图标
     * @return array
     */
    public function upload()
    {
        $file = request()->file('icon');
        //扩展名
        $originalExtension = $file->getClientOriginalExtension();
        //前端上传上来的默认是png格式
        $originalExtension = 'png';
        $fileName = $this->getName() . '.' . $originalExtension;
        $path = 'uploads/temporary/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $filePath = $path . $fileName;

        Image::make($file)->resize(200, 200)->save(storage_path('app/public/' . $filePath));

        return [
            'path' => '/storage/' . $filePath,
            'url' => config('app.url') . '/storage/' . $filePath,
        ];
    }

    /**
     * 移动图标到正式目录
     * @param string $path
     * @param int $flowId
     * @return string
     */
    public function move(string $path, int $flowId)
    {
        $tempPath = str_replace('/storage/', '', $path);
        if (!Storage::disk('public')->exists($tempPath)) {
            abort(400, $path . '文件不存在');
        }
        //文件名
        $name = preg_replace('/\w*\/+/', '', $tempPath);

        $newPath = 'uploads/perpetual/flowicon/' . $flowId . '/' . $name;
        Storage::disk('public')->move($tempPath, $newPath);
        return '/storage/' . $newPath;
    }

    /**
     * 生成文件名
     * @return string
     */
    protected function getName()
    {
        $str = 'flow-icon-' . date('YmdHis') . '-' . str_random(6);
        return $str;
    }
}