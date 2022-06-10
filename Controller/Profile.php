<?php

namespace Controller;

use Model\User;
use Model\Error;
use Model\Common;
use Model\UserService;

class Profile extends \Application 
{

    public function __construct()
    {
        new CheckLogin();
        self::$_Theme = 'Backend';
    }

    function index()
    {
        if(isset($_POST)){
            $user = isset($_POST['Users']) ? $_POST['Users'] : null; 
            $userService = new UserService;
            // print_r($_POST);
            // die();
            if($user){
                $model['username'] = Common::TextInput($user['username']);
                $model['fullname'] = Common::TextInput($user['fullname']);
                $model['email'] = Common::TextInput($user['email']);
                $model['id'] = $user['id'];
                $datawhere['id'] = $user['id'];
                $userService->Put($model,$datawhere);
                $_SESSION[QuanLy] = $model;
                $_SESSION[QuanLy] = Common::ChangeArrayToObject($_SESSION[QuanLy] = $model);
                print_r($_SESSION[QuanLy]);
                new Error(Error::success,'Cập Nhật Thông Tin Tài Khoản Thành Công');
                unset($user);
                // print_r($model);
                // die();
            }
            if(isset($_POST['Password']))
            {
                try {
                    $password    = Common::TextInput($_POST['Password']);
                    $newPassword = Common::TextInput($_POST['NewPassword']);
                    $rePassword  = Common::TextInput($_POST["RePassword"]);
                    $keyUser = User::CurrentUser()->username;
                    $keyPassword = $userService::GetKeyPassword($keyUser);
                    $dataUser['username'] = User::CurrentUser()->username;
                    $dataUser['password'] = sha1($keyPassword . $password . $keyPassword);
                    $userByPassword = $userService->GetUserByUsernamePassword($dataUser);
                    if($userByPassword == null){
                        throw new \Exception("Mật Khẩu Cũ Không Đúng"); 
                    }

                    if($newPassword !== $rePassword){
                        throw new \Exception("Mật Khẩu Nhập Lại Không Đúng");
                    }
                    if($userByPassword){
                        $userByPassword->password = UserService::CreatePassword($newPassword,$keyPassword);
                        $dataUserByPassword['password'] = $userByPassword->password;
                        $datawhere['id'] = $userByPassword->id;
                        $userService->Put($dataUserByPassword,$datawhere);
                        new \Model\Error(\Model\Error::success, "Cập nhật mật khẩu thành công");
                    }
                    
                } catch (\Throwable $exc) {
                    new \Model\Error(\Model\Error::danger, $exc->getMessage());
                }
            }
        }
        $this->View();
    }

    public function UserProfile()
    {
        self::$_Theme = 'molicha';
        self::$_Layout = 'ajax';
        if(isset($_POST)){
            $user = isset($_POST['users']) ? $_POST['users'] : null; 
            $userService = new UserService;
            // print_r($_POST);
            // die();
            if($user){
                $model['username'] = Common::TextInput($user['username']);
                $model['fullname'] = Common::TextInput($user['fullname']);
                $model['email'] = Common::TextInput($user['email']);
                $model['id'] = $user['id'];
                $datawhere['id'] = $user['id'];
                $userService->Put($model,$datawhere);
                $_SESSION[QuanLy] = $model;
                $_SESSION[QuanLy] = Common::ChangeArrayToObject($_SESSION[QuanLy] = $model);
                new Error(Error::success,'Cập Nhật Thông Tin Tài Khoản Thành Công');
                unset($user);
                // print_r($model);
                // die();
            }
            if(isset($_POST['Password']))
            {
                try {
                    $password    = Common::TextInput($_POST['Password']);
                    $newPassword = Common::TextInput($_POST['NewPassword']);
                    $rePassword  = Common::TextInput($_POST["RePassword"]);
                    $keyUser = User::CurrentUser()->username;
                    $keyPassword = $userService::GetKeyPassword($keyUser);
                    $dataUser['username'] = User::CurrentUser()->username;
                    $dataUser['password'] = sha1($keyPassword . $password . $keyPassword);
                    $userByPassword = $userService->GetUserByUsernamePassword($dataUser);
                    if($userByPassword == null){
                        throw new \Exception("Mật Khẩu Cũ Không Đúng"); 
                    }

                    if($newPassword !== $rePassword){
                        throw new \Exception("Mật Khẩu Nhập Lại Không Đúng");
                    }
                    if($userByPassword){
                        $userByPassword->password = UserService::CreatePassword($newPassword,$keyPassword);
                        $dataUserByPassword['password'] = $userByPassword->password;
                        $datawhere['id'] = $userByPassword->id;
                        $userService->Put($dataUserByPassword,$datawhere);
                        new \Model\Error(\Model\Error::success, "Cập nhật mật khẩu thành công");
                    }
                    
                } catch (\Throwable $exc) {
                    new \Model\Error(\Model\Error::danger, $exc->getMessage());
                }
            }
        }
        $this->View();
    }
    
}
