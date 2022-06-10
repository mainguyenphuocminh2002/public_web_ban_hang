<?php
namespace Model;

class Role extends DB implements IModelService
{
    public $id;
    public $name;
    public $des;

    public function __construct($role = null)
    {
        self::$TableName = "role";
        parent::__construct();
        if ($role) {
            $this->id = isset($role->id) ? $role->id : null;
            $this->name = isset($role->name) ? $role->name : null;
            $this->des = isset($role->des) ? $role->des : null;
        }
    }
    
    public function Post($model)
    {
        return $this->Insert($model);
        throw new \Exception("Method not implemented");
    }

    public function Put($model, $datawhere)
    {
        $where = "`id` = :id";
        return $this->Update($model,$where,$datawhere);
        throw new \Exception("Method not implemented");
    }

    public function Delete($id)
    {
        return $this->DeleteById(['id' => $id]);
    }

    public function GetById($id)
    {
        $model['id'] = $id;
        return $this->SelectById($model);
    }

    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $dataPT['PT']['indexPage'] = $indexPage;
            $dataPT['PT']['pageNumber'] = $pageNumber;
            $dataPT['PT']['keyword'] = !empty($params['keyword']) ? '%' . $params['keyword'] . '%' : '';
            $where = "`id` like :keyword or `name` like :keyword";
            return $this->Search($where, $total,$dataPT);
        }
        $dataPT['PT']['indexPage'] = $indexPage;
        $dataPT['PT']['pageNumber'] = $pageNumber;
        return $this->SelectPT(1, $total, $dataPT);
    }

    public function GetAllRole()
    {
        $where = 1;
        return $this->Select($where);
    }

    public function GetByName($name)
    {
        $model['role_name'] = $name;
        $where = "`name` =:role_name"; 
        return $this->SelectRow($where,$model);
        # code...
    }
}
