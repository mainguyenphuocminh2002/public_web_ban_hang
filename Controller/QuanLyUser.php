<?php

namespace Controller ;

use Model\Error;
use Model\Common;
use Model\Role;
use Model\User;
use Model\UserRole;

class QuanLyUser extends \Application implements IControllerBE
{
    public function __construct()
    {
        self::$_Theme = 'backend';
        new CheckLogin();
        \Model\Permission::Check([\Model\User::Admin]);
    }

    function index()
    {
        try {
            $user = new User();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $User = $user->GetItems($params, $indexPage, $pageNumber, $total);
            $data["User"] = $User;
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
        $role = new Role();
        $allRole = $role->GetAllRole();
        if(isset($_POST['Luu'])){
            $dataUser = $_POST['users'];
            $model['id'] = Common::uuid();
            $model['username'] = Common::TextInput($dataUser['username']);
            $model['fullname'] = Common::TextInput($dataUser['fullname']);
            $model['email']    = Common::TextInput($dataUser['email']);
            $model['key_password']    = Common::uuid();
            $model['password'] = \Model\UserService::CreatePassword($dataUser['password'],$model['key_password']);
            $user = new User();
            $user->Post($model);
            if(isset($_POST['role']) && !empty($_POST['role'])){
                $userRoles = new UserRole();
                $dataRole['id'] = Common::uuid();
                $dataRole['user_id'] = $model['id'];
                $dataRole['role_name'] = $_POST['role'];
                $userRoles->Post($dataRole);
            }
        }
        $this->View(['allRole'=>$allRole]);
    }
    
    function put()
    {
        if(isset($_GET['id'])){
            $data['userId'] = $_GET['id'];
            $userRole = new UserRole();
            $RoleOfUser = $userRole->GetByUserId($_GET['id']);
            $data['RoleOfUser'] = $RoleOfUser;
            $roles = new Role();
            $allRoles = $roles->GetAllRole();
            $data['allRoles'] = $allRoles;
            try {
                if(isset($_POST['users'])){
                    $dataUser = $_POST['users'];
                    $dataUserWhere['id'] = $dataUser['id'];
                    $model['fullname'] = Common::TextInput($dataUser['fullname']);
                    $model['email'] = Common::TextInput($dataUser['email']);
                    $model['active'] = $dataUser['active'];
                    $user = new User();
                    $user->Put($model,$dataUserWhere);
                }
                if(isset($_POST["role"])){
                    $dataRole['role_name'] = $_POST['role'];
                    $datawhere['user_id'] = $dataUser['id'];
                    $userRole = new UserRole();
                    $dataUserRole = $userRole->GetByUserId($dataUser['id']);
                    if(!$dataUserRole){
                        $dataInserUserRole['id'] = Common::uuid();
                        $dataInserUserRole['user_id'] = $dataUser['id'];
                        $dataInserUserRole['role_name'] = $_POST['role'];
                        $userRole->Post($dataInserUserRole);
                        Common::ToUrl('QuanLyUser/put/?id=' . $dataUser['id']);
                    }else{
                        $userRole->Put($dataRole,$datawhere);
                        Common::ToUrl('QuanLyUser/put/?id=' . $dataUser['id']);
                    } 
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        $this->View($data);
    }
    
    function delete()
    {
        $userRole = new UserRole();
        $userRole->Delete($_GET['id']);
        $user = new User();
        $user->Delete($_GET['id']);
        Common::ToUrl('QuanLyUser/');
    }
    
}
