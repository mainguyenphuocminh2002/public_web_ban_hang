<?php
namespace Controller;

use Model\Error;
use Model\Common;
use Facebook\Facebook;
use Model\UserService;
use Model\PasswordResert;
use Model\Request;
use Model\User;
use Model\UserRole;

class Login extends \Application{
    public function __construct()
    {
        self::$_Theme = 'backend';
        self::$_Layout='login';
        if(!empty($_SESSION[QuanLy]) && $_SESSION[QuanLy] != null){
            Common::ToUrl('backend');
        }
    }
    
    public function Index(){
        try {
            if(isset($_POST['name']) && isset($_POST['password'])){
                $name     = Common::TextInput($_POST['name']);
                $password = Common::TextInput($_POST['password']);
                if($name ==""){
                    new Error(Error::danger,'Tên Đăng Nhập Không Được Để Trống');
                }
                if($password ==""){
                    new Error(Error::danger,'Mật Khẩu Không Được Để Trống');
                }
                $userService = new UserService();
                $model['username'] = $name;
                $key = $userService::GetKeyPassword($model['username']);
                $password = sha1($key.$password.$key);
                $model['password'] = $password;
                $userData = $userService->GetUserByUsernamePassword($model);
                if($userData){
                    if($userData->active == 0){
                        unset($_POST);
                        new Error(Error::danger,"Tài Khoản Của Bạn Đã Bị Khoá");
                        Common::ToUrl("login");
                    }else{
                        $userRole = new UserRole();
                        $checkRole = $userRole->GetByUserId($userData->id);
                        if($checkRole){
                            $_SESSION[QuanLy] = $userData;
                            Common::ToUrl('backend');
                        }else{
                            $_SESSION[QuanLy] = $userData;
                            Common::ToUrl();
                        }   
                    }
                }else{
                    new Error(Error::danger,"Mật Khẩu Hoặc Tài Khoản Không Đúng");
                }
            }
        } catch (\Exception $exc) {
            
        }
        $this->view();
    }

    public function QuenMatKhau()
    {
        # code...
        if(isset($_POST['quenmatkhau'])){
            if(isset($_POST['email'])){
                $user = new User();
                $check = $user->GetByEmail(Common::TextInput($_POST['email']));
                if($check){
                    if (isset($_POST["email"])) {
                        $psReset = new PasswordResert();
                        $modelPsReset['id'] = Common::uuid();
                        $modelPsReset['user_id'] = $check->id;
                        $modelPsReset['token'] = Common::uuid();
                        $modelPsReset['create_at'] = Common::GetDate();
                        if($psReset->Post($modelPsReset)){
                            $body = '
                            Hãy bấm vào liên kết bên dưới để khôi phục mật khẩu của bạn: </br>
                            <a href="' . URL . '/login/recovery/?email=' . base64_encode($check->email) . '&token=' . $modelPsReset['token'] . '">' . URL . '/login/recovery/?token=' . $modelPsReset['token'] . '</a>';
                            \Model\Mail::SendMail(["Email" => $check->email, "Name" => $check->username], "Reaet Password", $body, "test");
                        }else{
                            new Error(Error::danger,'Vui Lòng Kiểm Tra Lại Email');                            
                        }
                    }
                }
            }else{
                new Error(Error::danger,"Vui Lòng Nhập Lại Email");
                Common::ToUrl('Login/QuenMatKhau');
            }
        }
        self::$_Theme  = 'molicha';
        self::$_Layout="register";
        $this->View();
    }

    public function recovery()
    {
        if(isset($_POST['recovery'])){
            $email = Request::Get('email','');
            $token = Request::Get('token','');
            $email = base64_decode($email);
            $user = new User();
            $ttUser = $user->GetByEmail($email);
            $email = base64_encode($email);
            if($ttUser){
                if(!empty($_POST['password']) && !empty($_POST['rePassword'])){
                    if($_POST['password'] !== $_POST['rePassword']){
                        new Error(Error::danger,"Mật Khẩu Không Giống Nhau");
                        Common::ToUrl("login/recovery/?email='{$email}'&token='{$token}'");
                    }
                    $password = UserService::CreatePassword($_POST['password'],$ttUser->key_password);
                    $user = new User();
                    $modelUser['password'] = $password;
                    if($user->Put($modelUser,['id'=>$ttUser->id])){
                        $passwordReset= new PasswordResert();
                        if($passwordReset->DeleteByUserId($ttUser->id)){
                            Common::ToUrl('login');
                        }else{
                            new Error(Error::danger,"Có Lỗi Xảy Ra");
                            Common::ToUrl('login/recovery');
                        }
                    }
                }
            }
        }
        self::$_Theme  = 'molicha';
        self::$_Layout="register";
        $this->View();
        # code...
    }

   
}
    