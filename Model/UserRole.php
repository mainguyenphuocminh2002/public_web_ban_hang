<?php

namespace Model;

class UserRole extends DB implements IModelService
{
    
    public $id; 
    public $user_id; 
    public $role_name;

    public function __construct($userRole = null)
    {
        self::$TableName = 'user_role_detail';
        parent::__construct();
        if($userRole){
            if(!is_array($userRole)){
                $id = $userRole;
                $userRole = $this->GetById($id);
            }
            $this->id = isset($userRole['id']) ? $userRole['id'] : null; 
            $this->user_id = isset($userRole['user_id']) ? $userRole['user_id'] : null; 
            $this->role_name = isset($userRole['role_name']) ? $userRole['role_name'] : null;
        }
    }
    public function Post($model)
    {
        return $this->Insert($model);
        throw new \Exception("Method not implemented");
    }
    
    public function Put($model,$datawhere)
    {
        $where = "`user_id` = :user_id";
        return $this->Update($model,$where,$datawhere);        
    }
    
    public function Delete($id)
    {
        $model['userid'] = $id;
        $where = "`user_id` = :userid";
        return $this->DeleteDB($where,$model);
    }
    
    public function GetById($id)
    {
        $model['id'] = $id;
        return $this->SelectById($model);
        throw new \Exception("Method not implemented");
    }
    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $dataPT['PT']['indexPage'] = $indexPage;
            $dataPT['PT']['pageNumber'] = $pageNumber;
            $dataPT['PT']['keyword'] = !empty($params['keyword']) ? '%' . $params['keyword'] . '%' : '';
            $where = "`role_name` like :keyword";
            return $this->Search($where, $total,$dataPT);
        }
        $dataPT['PT']['indexPage'] = $indexPage;
        $dataPT['PT']['pageNumber'] = $pageNumber;
        return $this->SelectPT(1, $total, $dataPT);
    }
    
    public function GetByUserId($userId){
        $where = "`user_id` = :user_id";
        $model['user_id'] = $userId;
        return $this->SelectRow($where,$model);
    }

    public function GetUserByRoleName($roleName)
    {
        $where="`role_name` = :roleName";
        $model['roleName'] = $roleName;
       return $this->SelectRow($where,$model);
    }

}
