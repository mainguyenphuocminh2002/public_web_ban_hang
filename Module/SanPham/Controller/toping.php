<?php

namespace module\SanPham\Controller;

use Model\User;
use Application;
use Model\Permission;
use Controller\CheckLogin;
use Controller\IControllerBE;
use Module\SanPham\Model\Toping as ModelToping;

class toping extends Application implements IControllerBE
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
            $sanpham = new ModelToping();
            $params["keyword"] = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
            $indexPage = isset($_POST["indexPage"]) ? intval($_POST["indexPage"]) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_POST["pageNumber"]) ? intval($_POST["pageNumber"]) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataSanPham = $sanpham->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataSanPham"] = $dataSanPham;
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
        throw new \Exception("Method not implemented");
    }
    
    function delete()
    {
        throw new \Exception("Method not implemented");
    }
        

}
