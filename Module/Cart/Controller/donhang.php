<?php

namespace Module\Cart\Controller ;

use Model\User;
use Model\Common;
use Model\Permission;
use Controller\CheckLogin;
use Controller\IControllerBE;
use Model\Request;
use Module\Cart\Model\donhang as ModelDonHang;
use Module\Cart\Model\trangthaidonhang;

class donhang extends \Application implements IControllerBE
{
    public function __construct()
    {
        self::$_Theme = 'backend';
        new CheckLogin();
        Permission::Check([User::Admin]);
        # code...
    }

    function index()
    {
        try {
            $donhang = new ModelDonHang();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataDonHang = $donhang->GetItems($params, $indexPage, $pageNumber, $total);
            $ttDonHang = new trangthaidonhang();
            $dataStatus = $ttDonHang->GetAllTrangThai();
            $data["dataDonHang"] =  $dataDonHang;
            $data['status'] = $dataStatus;
            $data["indexPage"] = $indexPage;
            $data["pageNumber"] = $pageNumber;
            $data["params"] = $params;
            $data["total"] = $total;
            $this->View($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
    function post()
    {

        throw new \Exception("Method not implemented");
    }
    
    function put()
    {
        if(isset($_GET["id"])){
            $id = Request::Get("id",'');
        }
        throw new \Exception("Method not implemented");
    }
    
    function delete()
    {
        throw new \Exception("Method not implemented");
    }

    public function themTrangThaiDonHang()
    {
        if(isset($_POST['Luu'])){
            $dataTTDonHang = $_POST['trangthaidonhang'];
            $ttDonHang = new trangthaidonhang();
            $model['id'] = Common::TextInput($dataTTDonHang['id']);
            $model['name'] = Common::TextInput($dataTTDonHang['name']);
            $model['des'] = Common::TextInput($dataTTDonHang['des']);
            $ttDonHang->Post($model);
        }
        $this->View();
        # code...
    }
        
}
