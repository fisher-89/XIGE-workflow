<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{

    public function index(Request $request){
        if ($request->isMethod('post')) {
            $file = $request->file('upFile');
            if($file==null){return back()->with('errors','没找到文件');}
            $size = $file->getClientSize();//文件大小  单位字节
            if(!$size)
                abort(400,'文件大于服务器配置的文件大小');
            if ($file->isValid()) {//todo
//                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
//                 $type = $file->getClientMimeType();
                $fileTypes = array('TXT','DOC','XLS','PPT','DOCX','XLSX','PPTX','JPG','PNG','PDF','TIFF','SWF','RTF','TXT','GIF','gif','rtf','txt','doc','xls','ppt','docx','xlsx','pptx','jpg','png','pdf','tiff');
                if(!in_array($ext,$fileTypes)){
                    return "文件格式不合法";
                }
                if(!$realPath){
                    return back()->with('errors','非法操作');
                }
//                $PHP_SELF=$_SERVER['PHP_SELF'];
//                $url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);
                $newFileName = time().Auth::user()->staff_sn ;
                $bool = Storage::disk('public')->put('uploads/temporary/'.$newFileName . '.'. $ext, file_get_contents($realPath));
                $image=['jpeg','gif','bmp','png','jpg','JPEG','GIF','BMP','PNG'];
                if(in_array($ext,$image)){
                    $img=Image::make($realPath)->resize(100,100);
                    $img->save(public_path('storage/uploads/temporary/'.$newFileName . '_thumb.'. $ext));
                }
                if($bool == true){
                    //$url
                    return '/storage/uploads/temporary/'.$newFileName.'.'. $ext;
                }else{
                    return "文件上传失败";
                }
            }
        }

    }
}
