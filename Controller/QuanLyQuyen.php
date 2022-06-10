<?php

namespace Controller ;

use Model\Error;
use Model\Common;
use Model\Role;
use Model\UserRole;

class QuanLyQuyen extends \Application implements IControllerBE
{
    public function __construct()
    {
        self::$_Theme = 'backend';
        new CheckLogin();
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyquyen::class . "_view")]);
    }

    function index()
    {
        try {
            $roles = new Role();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $DanhSachRole = $roles->GetItems($params, $indexPage, $pageNumber, $total);
            $data["DanhSachRole"] = $DanhSachRole;
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
        if(isset($_POST['Luu'])){
            $model['id'] = $_POST['id'];
            $model['name'] = Common::TextInput($_POST['name']);
            $model['des']  = Common::TextInput($_POST["des"]);
            $role = new Role();
            $role->Post($model);
        }
        $this->View();
    }
    
    function put()
    {
        $role = new Role();
        if(isset($_POST['luu'])){
            $datawhere['id'] = $_GET['id'];
            $model['name'] = Common::TextInput($_POST['name']);
            $model['des'] = Common::TextInput($_POST['des']);
            $role->Put($model,$datawhere);
        }
        if(isset($_GET["id"])){
            $data['roleDetail']  = $role->GetById($_GET["id"]);
            $this->View($data);
        }
    }
    
    function delete()
    {
        if(isset($_GET["id"])){
            $role = new Role();
            $nameByRole = $role->GetById($_GET["id"]);
            $userRole = new UserRole();
            $userByRoleName = $userRole->GetUserByRoleName($nameByRole->name);
                if(!empty($userByRoleName)){
                new Error(Error::danger,"Vui Lòng Xoá Người Dùng Sở Hữu Quyền");
                Common::ToUrl('QuanLyQuyen/index');
            }else{
                $role = new Role();
                $role->Delete($_GET['id']);
                new Error(Error::success,"Xoá Quyền Thành Công");
                Common::ToUrl('QuanLyQuyen/index');
            }
        }
    }
    
}
