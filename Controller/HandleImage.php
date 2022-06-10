<?php

namespace Controller ;

use Model\User;
use Model\Error;
use Model\Common;

class HandleImage
{
    public function __construct()
    {
        # code...
    }

    public function handleImage($image, $reName = false)
    {
        $ext = $image['type'];
        // var_dump(User::CurrentUser());
        $target_dir    = __DIR__ . "/../public/admin/userfiles/" . User::CurrentUser()->username .'/';
        // Check Dir
        if(!is_dir($target_dir)){
            mkdir($target_dir);
        }
        // if(!empty($image['name'])){
        //     unlink(__DIR__ . '/../public/storage/' . $image['name']);
        // }
        // //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        if($reName){
            $image['name'] = Common::uuid() . $ext;
        }
        $target_file   = $target_dir . basename($image["name"]);
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            new Error(Error::success, "UpLoad Ảnh Thành Công");
            $path = $target_file;
            $path = explode('../',$path);

            return '/' . $path[1];
        } else {
            new Error(Error::danger, "Có Lỗi Xảy Ra");
        }
    }

    public function handleClean($path)
    {
        # code...
        rmdir($path);
    }
}
