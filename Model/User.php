<?php
namespace Model;

use Model\Role;
use Model\UserRole;

class User extends DB implements IModelService {
    const Admin = "admin";
    const User = "user";
    const QuanLy = "QuanLy";
    const VietBai = "VietBai";
    const QuanLySanPham = "QuanLySanPham";

    public $id; 
    public $fullname; 
    public $username; 
    public $password; 
    public $key_password; 
    public $email; 
    public $date_created;
    public $active;
    
    public function __construct($user = null)
    {
        self::$TableName = 'user';
        parent::__construct();
        if($user)
        {
            if(!is_array($user) && !is_object($user)){
                $id = $user;
                $user = $this->GetUserById($id);
            }
            $this->id = isset($user->id) ? $user->id : null;
            $this->fullname = isset($user->fullname) ? $user->fullname : null;
            $this->username = isset($user->username) ? $user->username : null;
            $this->password = isset($user->password) ? $user->password : null;
            $this->key_password = isset($user->key_password) ? $user->key_password : null;
            $this->email = isset($user->email) ? $user->email : null;
            $this->date_created = isset($user->date_created) ? $user->date_created : null;
            $this->active = isset($user->active) ? $user->active : null;
        }
    }

    public function Post($model)
    {
        return $this->Insert($model);
        throw new \Exception("Method not implemented");
    }
    
    public function Put($model,$datawhere)
    {
        $where = "`id` = :id";
        return $this->Update($model,$where,$datawhere);
        throw new \Exception("Method not implemented");
    }
    
    public function Delete($id)
    {
        $model['id'] = $id;
        return $this->DeleteById($model);
        throw new \Exception("Method not implemented");
    }
    
    public function GetById($id)
    {
        throw new \Exception("Method not implemented");
    }
    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $dataPT['PT']['indexPage'] = $indexPage;
            $dataPT['PT']['pageNumber'] = $pageNumber;
            $dataPT['PT']['keyword'] = !empty($params['keyword']) ? '%' . $params['keyword'] . '%' : '';
            $where = "`username` like :keyword";
            return $this->Search($where, $total,$dataPT);
        }
        $dataPT['PT']['indexPage'] = $indexPage;
        $dataPT['PT']['pageNumber'] = $pageNumber;
        return $this->SelectPT(1, $total, $dataPT);
    }
    

    public function GetAllUser(){
        $where = "1=1";
        return $this->Select($where);
    }

    public function GetUserById($id)
    {
        $model['id']= $id;
        return $this->SelectById($model);
    }

    function GetRole(){
        // $userRole = new \Model\UserRole();
        // $roles = $userRole->GetByUserId($this->Id);
        // return $roles;
        $role = new UserRole();
        $model = $this->id;
        return $role->GetByUserId($model);
    }

    public static function CurrentUser(){
        return new User($_SESSION[QuanLy]);
    }

    public function CheckPremision($Allows, $delines = []) {
        $roles = $this->GetRole();
        if($roles){
            if($roles->role_name){
                foreach ($delines as $deline) {
                    if ($deline == $roles->role_name) {
                        return false;
                    }
                }
                foreach ($Allows as $Allow) {
                    if ($Allow == $roles->role_name) {
                        return true;
                    }
                }
            }
        
        }
        return false;
    }

    public static function CurentUser() {
        return new \Model\User($_SESSION[QuanLy]);
    }

    /**
     * nút sửa
     * @param {type} parameter
     */
    public function btnSua() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyusers::class . "_put"), md5(\Controller\quanlyusers::class)]) == false) {
            return;
        }

        $btn = <<<BTNSUA
                <a class="btn btn-sm btn-primary"  href="/index.php?controller=quanlyusers&action=put&id={$this->Id}" >Sửa</a>
                
BTNSUA;
        return $btn;
    }

    /**
     * nút xóa
     * @param {type} parameter
     */
    public function btnXoa() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyusers::class . "_delete"), md5(\Controller\quanlyusers::class)]) == false) {
            return;
        }
        $btn = <<<BTNSUA
                <a title="Bạn có muốn xóa tài khoản này?" class="btn btn-sm btn-danger"  href="/index.php?controller=quanlyusers&action=delete&id={$this->Id}" >Xóa</a>
                
BTNSUA;
        return $btn;
    }

    public static function btnThem() {
//        <a href="/index.php?controller=quanlyquyen&action=post" class="btn btn-success" ><i class="fa fa-plus" ></i></a>
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyusers::class . "_post"), md5(\Controller\quanlyusers::class)]) == false) {
            return;
        }

        $btn = <<<BTNSUA
                <a href="/index.php?controller=quanlyusers&action=post" class="btn btn-success" ><i class="fa fa-plus" ></i></a>
                
BTNSUA;
        return $btn;
    }

    public function GetByEmail($email)
    {
        # code...
        $where = "`email` = :email";
        $model['email'] = $email;
        return $this->SelectRow($where,$model);
    }

}