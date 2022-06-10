<?php
namespace Module\Cart\Controller;

use Model\Common;
use Module\Cart\Model\donhang;
use Module\Cart\Model\giohang;
use Module\Cart\Model\trangthaidonhang;

class api extends \Application
{
    const Huy = 'Huỷ';
    public function __construct()
    {
        self::$_Theme = "molicha";
        self::$_Layout = "ajax";
        # code...
    }

    public function ThemGioHang()
    {
        # code...
        $giohang = new giohang();
        $idUser = Common::TextInput($_SESSION[QuanLy]->id);
        if (isset($_POST)) {
            $idSanPham = Common::TextInput($_POST['product_id']);
            $checkGioHang = $giohang->GetByUserIdAndProductId($idUser, $idSanPham);
            if ($checkGioHang) {
                $model = [];
                foreach ($checkGioHang as $key => $value) {
                    if (isset($_POST[$key])) {
                        if (isset($_POST['number'])) {
                            $model['number'] = $checkGioHang->number;
                            $model['number'] += Common::TextInput($_POST['number']);
                        } else {
                            $model[$key] = $_POST[$key];
                        }
                    } else {
                        continue;
                    }
                }
                $giohang->Put($model, ['id' => $checkGioHang->id]);
                unset($_POST);
            } else {
                $model['id'] = Common::uuid();
                $model['user_id'] = $idUser;
                $model['product_id'] = $idSanPham;
                $model['number'] = Common::TextInput($_POST['number']);
                $model['create_at'] = Common::GetDate();
                $model['trang_thai'] = 0;
                $giohang->Post($model);
            }
        }
        $dataGioHang = $giohang->GetByUserId($idUser);
        $this->View(['dataGioHang' => $dataGioHang]);
    }
    public function XoaSanPham()
    {
        if (isset($_POST)) {
            $idUser = Common::TextInput($_SESSION[QuanLy]->id);
            $giohang = new giohang();
            $giohang->Delete(Common::TextInput($_POST['id']));
            $dataGioHang = $giohang->GetByUserId($idUser);
            $this->View(['dataGioHang' => $dataGioHang]);
        }
        # code...
    }

    public function UpdateSoLuongSanPham()
    {
        if (isset($_POST)) {
            // print_r($_POST);
            $giohang = new giohang();
            $idUser = Common::TextInput($_SESSION[QuanLy]->id);
            $idSanPham = Common::TextInput($_POST['product_id']);
            $checkGioHang = $giohang->GetByUserIdAndProductId($idUser, $idSanPham);
            if ($checkGioHang) {
                $model = [];
                foreach ($checkGioHang as $key => $value) {
                    if (isset($_POST[$key])) {
                        if (isset($_POST['number'])) {
                            $model['number'] = Common::TextInput($_POST['number']);
                        } else {
                            $model[$key] = $_POST[$key];
                        }
                    } else {
                        continue;
                    }
                }
                if($_POST['number'] <= 0){
                    $model['number'] = Common::TextInput($_POST['number']);
                    $giohang->Put($model, ['id' => $checkGioHang->id]);
                    $giohang->DeleteByProductIdAndNumber($idSanPham);
                }else{
                    $giohang->Put($model, ['id' => $checkGioHang->id]);
                    unset($_POST);
                }
            }
            # code...
        }
    }

    public function UpdateTrangThai()
    {
        if(isset($_POST)){
            $dh = new donhang();
            $model['trang_thai_id'] = $_POST['statuskey'];
            $dh->Put($model,['id'=>$_POST['dhId']]);
            $datadh = $dh->GetById($_POST['dhId']);
            $ttdonhang = new trangthaidonhang($model['trang_thai_id']);
            echo $ttdonhang->name;            
        }
        # code...
    }
}
