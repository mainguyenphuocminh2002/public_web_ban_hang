<?php
namespace Model;
class UserService extends DB implements \Model\IModelService{
    public function __construct()
    {
        self::$TableName = 'user';
        parent::__construct();

    }
    public function Post($model){

    }

    public function Put($model,$datawhere){
        $where = "`id` = :id";
        // self::$Debug = true;
        return $this->Update($model,$where,$datawhere);
    }

    public function Delete($Id){

    }

    public function GetById($id){
        return $this->SelectById($id);
    } 

    public function GetItems($where, $indexPage, $pageNumber, &$total){

    }
    
    static public function CreatePassword($password, $keypassword) {
        $password = $keypassword . $password . $keypassword;
        return sha1($password);
    }

    static public function GetKeyPassword($username){
        $col = ['key_password'];
        $where = "`username` = :username";
        $model['username'] = $username;
        $db = new DB();
        $kq = $db->SelectRow($where,$model,$col);
        if($kq){
            return $kq->key_password;
        }else{
            return false;
        }
    }

    public function GetUserByUsernamePassword(array $data) {
        // self::$Debug = true;
        $where = "`username` = :username and `password` = :password";
        return $this->SelectRow($where,$data);
    }
}