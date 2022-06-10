<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

use Model\Error;

/**
 * Description of api
 *
 * @author MSI
 */
class api extends \Application
{

    public function __construct()
    {
    }

    /**
     * trả vể dang sách thẻ <option></option>
     * @param {type} parameter
     */
    function GetQuanHuyenTag()
    {
        if (isset($_POST)) {
            $idTinh = $_POST['maTinh'];
            $location = new \Model\Locations();
            $items = $location->GetByIdParents($idTinh);
            $html = "";
            foreach ($items as $key => $value) {
                $_item = new \Model\Locations($value);
                $html .= <<<THELI
                      <option value="$_item->Id" >$_item->Name</option>  
    THELI;
            }
            echo $html;
        }
    }

    public function handleImage()
    {
        if (isset($_POST)) {
            $target_dir    = __DIR__ . "/../public/storage/";
            // //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file   = $target_dir . basename($_FILES["image"]["name"]);
            $path = $target_file;
            $path = explode('../',$path);
            // var_dump($target_file);
            // //Lấy phần mở rộng của file (jpg, png, ...)
            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file


            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                new Error(Error::success, "UpLoad Ảnh Thành Công");
            } else {
                new Error(Error::danger, "Có Lỗi Xảy Ra");
            }
            echo '/'.$path[1];
        } else {
            new Error(Error::danger, 'Không upload được file, có thể do file lớn, kiểu file không đúng ...');
        }

        # code...
    }
}
