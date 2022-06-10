<?php

namespace Module\SanPham\Controller;

use Application;
use Model\Error;
use Model\Common;
use Module\SanPham\Model\Category;
use Module\SanPham\Model\categoryDetail;
use Module\SanPham\Model\productCategoryDetail;
use Module\SanPham\Model\Toping;
use Module\SanPham\Model\trangthai;
use Module\SanPham\Model\trangthaichitiet;

class api extends Application
{
    public function __construct()
    {
        self::$_Theme = 'backend';
        self::$_Layout = 'ajax';
    }

    public function GetDataCreateTrangThai()
    {

        // $trangthai = new trangthai();
        $trangthaiData = trangthai::GetDataToSelect();
        if (isset($trangthaiData) && !empty($trangthaiData)) {
            $this->View(['trangthaiData' => $trangthaiData,'dataKey'=>Common::uuid()]);
        } else {
            $this->View();
        }
    }

    public function GetCreateProductChiTiet()
    {
        # code...
        $categoryDetailData = ["" => "Trống"]+ categoryDetail::GetDataToSelect();
        if (isset($categoryDetailData) && !empty($categoryDetailData)) {
            $this->View(['categoryDetailData' => $categoryDetailData,'dataKey'=>Common::uuid()]);
        } else {
            $this->View();
        }
    }

    public function CreateTrangThaiChung()
    {
        $trangthai = new trangthai();
        $model = [];
        $model['id'] = Common::TextInput(Common::uuid());
        $model['name'] = Common::TextInput($_POST['data']);
        $trangthai->Post($model);
    }

    public function GetDataCreateLoai()
    {
        if(!empty($_POST)){
            $categoryDetail = new categoryDetail();
            $model['id'] = Common::TextInput(Common::uuid());
            $model['category_id'] = Common::TextInput($_POST['categoryParentData']);
            $model['name'] = Common::TextInput($_POST['data']);
            $categoryDetail->Post($model);
        }else{
            $categoryData = ["" =>"Trống"]+Category::GetDataToSelect();
            if (isset($categoryData) && !empty($categoryData)) {
                $this->View(['categoryData' => $categoryData,'dataKey'=>Common::uuid()]);
            } else {
                $this->View();
            }
        }
    }

    public function CreateLoaiChung()
    {
        $trangthai = new Category();
        $model = [];
        $model['id'] = Common::TextInput(Common::uuid());
        $model['name'] = Common::TextInput($_POST['data']);
        $trangthai->Post($model);
    }

    public function GetDataCreateToping()
    {
        $toping = new Toping();
        $model = [];
        $model['id'] = Common::TextInput(Common::uuid());
        $model['name'] = Common::TextInput($_POST['data']);
        $toping->Post($model);
        $topingData = $toping->GetById($model['id']);
        if (isset($topingData) && !empty($topingData)) {
            $this->View(['topingData' => $topingData]);
        } else {
            $this->View();
        }
    }

    public function DeleteToping()
    {
        $toping = new Toping();
        $id =  $_POST['id'];
        $toping->Delete($id);
        # code...
    }

    public function DeleteTrangThaiChiTiet()
    {
        $ttct = new trangthaichitiet();
        $id =  $_POST['id'];
        $ttct->Delete($id);
    }
    
    public function DeleteLoaiSanPhamChiTiet()
    {
        $productCategoryDetail = new productCategoryDetail();
        $id =  $_POST['id'];
        $productCategoryDetail->Delete($id);
    }
}
