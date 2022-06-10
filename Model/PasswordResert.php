<?php

namespace Model ;

class PasswordResert extends DB implements IModelService
{
    public function __construct()
    {
        parent::__construct();
        self::$TableName = 'password_resert';
        # code...
    }

    public function Post($model)
    {
        return $this->Insert($model);
        throw new \Exception("Method not implemented");
    }
    
    public function Put($model,$datawhere)
    {
        throw new \Exception("Method not implemented");
    }
    
    public function Delete($id)
    {
        return $this->DeleteById(['id'=>$id]);
        throw new \Exception("Method not implemented");
    }
    
    public function GetById($id)
    {
        return $this->GetById(['id'=>$id]);
        throw new \Exception("Method not implemented");
    }
    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        throw new \Exception("Method not implemented");
    }
    
    public function DeleteByUserId($userId)
    {
        $where = "`user_id` = :userId";
        $model['userId'] = $userId;
        return $this->DeleteDB($where,$model);
        # code...
    }
    
}
