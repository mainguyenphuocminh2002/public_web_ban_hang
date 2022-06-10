<?php
namespace Controller;

use Model\Error;
use Model\Common;
use Model\User;
use Model\UserService;

class Register extends \Application{
    public function __construct()
    {
        self::$_Theme  = 'molicha';
        self::$_Layout = 'register';
    }
    
    public function index(){
        if(isset($_POST['dangKy'])){
            $model['id'] = Common::uuid();
            if(empty($_POST['name']) && !isset($_POST['name'])){
                new Error(Error::danger,"Tên Đăng Nhập Không Được Để Trống");
            }
            $model['username'] = Common::TextInput($_POST['name']);
            $model['email'] = Common::TextInput($_POST['email']);
            $user = new User();
            $check = $user->GetByEmail($model['email']);
            if($check){
                new Error(Error::danger,'Email Đã Tồn Tại');
                Common::ToUrl('register');
                unset($model);
                unset($_POST);
            }
            $model['key_password'] = Common::uuid();
            if($_POST['password'] !== $_POST['rePassword']){
                new Error(Error::danger,"Vui Lòng Xem Lại Mật Khẩu");
                Common::ToUrl('Register/index');
            }else{
                $model['password'] = UserService::CreatePassword(Common::TextInput($_POST['password']),$model['key_password']);
            }
            $model['active'] = 1;
            $user = new User();
            if($user->Post($model)){
                Common::ToUrl('Login/index');
            }
        }
        // try {
        //     if(isset($_POST['name']) && isset($_POST['password'])){
        //         $name     = Common::TextInput($_POST['name']);
        //         $password = Common::TextInput($_POST['password']);
        //         if($name ==""){
        //             new Error(Error::danger,'Tên Đăng Nhập Không Được Để Trống');
        //         }
        //         if($password ==""){
        //             new Error(Error::danger,'Mật Khẩu Không Được Để Trống');
        //         }
        //         $userService = new UserService();
        //         $model['username'] = $name;
        //         $key = $userService::GetKeyPassword($model);
        //         $password = sha1($key.$password.$key);
        //         $model['password'] = $password;
        //         $user = $userService->GetUserByUsernamePassword($model);
        //         if($user){
        //             $_SESSION[QuanLy] = $user;
        //             Common::ToUrl('backend');
        //         }else{
        //             new Error(Error::danger,"Mật Khẩu Hoặc Tài Khoản Không Đúng");
        //         }
        //     }
        // } catch (\Exception $exc) {
            
        // }
        $this->view();
    }

}