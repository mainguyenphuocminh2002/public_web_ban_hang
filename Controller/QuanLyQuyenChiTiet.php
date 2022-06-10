<?php

namespace Controller;

use Model\Common;
use Model\Error;
use Model\Role;
use Model\User;
use Model\UserRole;

class QuanLyQuyenChiTiet extends \Application implements IControllerBE
{

    public function __construct()
    {
        # code...
        new CheckLogin();
        self::$_Theme = 'backend';
    }

    public function index()
    {
        try {
            $userRole = new UserRole();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $userRole = $userRole->GetItems($params, $indexPage, $pageNumber, $total);
            $data["userRole"] = $userRole;
            $data["indexPage"] = $indexPage;
            $data["pageNumber"] = $pageNumber;
            $data["params"] = $params;
            $data["total"] = $total;
            $this->View($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function post()
    {
        if (isset($_POST['Luu'])) {
            $model['id'] = $_POST['id'];
            $model['user_id'] = Common::TextInput($_POST['user']);
            $model['role_name'] = Common::TextInput($_POST["role"]);
            $role = new UserRole();
            $role->Post($model);
        }
        $user = new User();
        $dataUser = $user->GetAllUser();
        $role = new Role();
        $dataRole = $role->GetAllRole();
        $data['dataUser'] = $dataUser;
        $data['dataRole'] = $dataRole;
        $this->View($data);
    }

    public function put()
    {
        $role = new UserRole();
        if (isset($_POST['luu'])) {
            $datawhere['id'] = $_GET['id'];
            $model['user_id'] = Common::TextInput($_POST['user']);
            $model['role_name'] = Common::TextInput($_POST['role']);
            $role->Put($model, $datawhere);
        }
        if (isset($_GET["id"])) {
            $user = new User();
            $dataUser = $user->GetAllUser();
            $role = new Role();
            $dataRole = $role->GetAllRole();
            $data['dataUser'] = $dataUser;
            $data['dataRole'] = $dataRole;
            $this->View($data);
        }
        throw new \Exception("Method not implemented");
    }

    public function delete()
    {
        if (isset($_GET["id"])) {
            $role = new UserRole();
            $nameByRole = $role->GetById($_GET["id"]);
            $userRole = new UserRole();
            $userByRoleName = $userRole->GetUserByRoleName($nameByRole->name);
            if (!empty($userByRoleName)) {
                new Error(Error::danger, "Vui Lòng Xoá Người Dùng Sở Hữu Quyền");
                Common::ToUrl('QuanLyQuyen/index');
            } else {
                $role = new UserRole();
                $role->Delete($_GET['id']);
                new Error(Error::success, "Xoá Quyền Thành Công");
                Common::ToUrl('QuanLyQuyen/index');
            }
        }
        throw new \Exception("Method not implemented");
    }

}
