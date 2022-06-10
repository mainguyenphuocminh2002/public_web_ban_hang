<?php

namespace Module\Cart\Controller;

use Model\Error;
use Model\Common;
use Controller\CheckLogin;
use Controller\IControllerBE;
use Module\Cart\Model\donhang;
use Module\Cart\Model\donhangchitiet;
use Module\Cart\Model\giohang;
use Module\Cart\Model\trangthaidonhang;
use Module\SanPham\Model\sanpham;

class Cart extends \Application implements IControllerBE
{
    public function __construct()
    {
        new CheckLogin();
        self::$_Theme = "molicha";
        self::$_Layout = "giohang";
        # code...
    }

    function index()
    {
        $giohang =new giohang();
        $idUser = $_SESSION[QuanLy]->id;
        $dataGioHang = $giohang->GetByUserId($idUser);
        $this->View(['dataGioHang'=>$dataGioHang]);
    }
    
    function post()
    {
        if(isset($_POST) && !empty($_POST)){
            $model['id'] = Common::uuid();
            $model['first_name'] = Common::TextInput($_POST['first-name']);
            $model['last_name'] = Common::TextInput($_POST['last-name']);
            $model['phone'] = isset($_POST['phone']) ? Common::TextInput($_POST['phone']) : '';
            // print_r(is_bool(preg_match("#[0-9]#",$model['first_name']) && preg_match("#[0-9]#",$model['last_name']) && preg_match('#[A-za-z]#',$model['phone'])));
            if(!preg_match("#[0-9]#",$model['first_name']) && !preg_match("#[0-9]#",$model['last_name']) && !preg_match('#[A-za-z]#',$model['phone'])){
                $model['user_id'] = Common::TextInput($_SESSION[QuanLy]->id);
                $tinhthanh = $_POST['DonHang'];
                $model['tinh_thanh_id'] = Common::TextInput($tinhthanh['TinhThanh']);
                $model['quan_huyen_id'] = isset($tinhthanh['QuanHuyen']) ? Common::TextInput($tinhthanh['QuanHuyen']) : '';
                $model['address'] = isset($_POST['street']) ? Common::TextInput($_POST['street']) : '';
                $model['trang_thai_id'] = trangthaidonhang::GetByName("Đang Chuẩn Bị")->id;
                $model['email'] = Common::TextInput($_POST['email']);
                $model['note'] = Common::TextInput($_POST['note']);
                $model['create_at'] = Common::TextInput(Common::GetDate());
                $model['total'] = Common::TextInput(Common::TextInput($_POST['total']));
                $donhang = new donhang();
                $donhang->Post($model);
            }else{
                new Error(Error::danger,"Vui Lòng Xem Lại Thông Tin");
                Common::ToUrl('Cart/Cart/post');
            }
            if(isset($_POST['productId'])){
                foreach($_POST['productId'] as $val){
                    $sp = new sanpham($val);
                    $modeldhchitiet['id'] = Common::uuid();
                    $modeldhchitiet['product_id'] = Common::TextInput($val);
                    $modeldhchitiet['id_don_hang'] = $model['id'];
                    $modeldhchitiet['gia'] = $sp->price;
                    $giohang = new giohang();
                    $giohangData = $giohang->GetByUserIdAndProductId($model['user_id'],$val);
                    $modeldhchitiet['so_luong'] = $giohangData->number;
                    $dhchitiet = new donhangchitiet();
                    $dhchitiet->Post($modeldhchitiet);
                    
                }
            }
            if(isset($_POST['giohangId'])){
                $giohang = new giohang();
                foreach($_POST['giohangId'] as $val){
                    $giohang->Delete($val);
                }
            }
        }
        unset($model);
        self::$_Layout = "trangthanhtoan";
        $idUser = $_SESSION[QuanLy]->id;
        $giohang =new giohang();
        $dataGioHang = $giohang->GetByUserId($idUser);
        unset($_POST);
        $this->View(['dataGioHang'=>$dataGioHang]);
    }
    
    function put()
    {
        throw new \Exception("Method not implemented");
    }
    
    function delete()
    {
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $cart = new giohang();
            $cart->DeleteByProductIdAndNumber($id);
            return Common::ToUrl('Cart/cart');
        }
        throw new \Exception("Method not implemented");
    }
        
}
