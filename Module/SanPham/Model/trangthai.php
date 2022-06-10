<?php

namespace Module\SanPham\Model;

use Model\DB;
use Model\IModelService;

class trangthai extends DB implements IModelService
{
    public $id, $name, $des;
    public function __construct($tt = null)
    {
        parent::__construct();
        self::$TableName = 'trang_thai_parent';
        if($tt){
            if(!is_array($tt) && !is_object($tt)){
                $id = $tt;
                $tt = $this->GetById($id);
            }
            $this->id = isset($tt->id) ? $tt->id : null;  
            $this->name = isset($tt->name) ? $tt->name : null;  
            $this->des = isset($tt->des) ? $tt->des : null; 
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
        throw new \Exception("Method not implemented");
    }
    
    public function GetById($id)
    {
        $model['id'] = $id;
        return $this->SelectById($model);
        throw new \Exception("Method not implemented");
    }
    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        throw new \Exception("Method not implemented");
    }

    public function GetByTenTrangThai($tt)
    {
        $model['name'] = $tt;
        $where = "`name` = :name";
        return $this->SelectRow($where,$model);
    }

    public static function GetDataToSelect()
    {
        $tt = new trangthai();
        $where = "1=1";
        $data = $tt->SelectToOptions($where,[],['id','name']);
        return $data;
    }

    public function GetAllTrangThai()
    {
        # code...
        $where = '1=1';
        return $this->Select($where);
    }
    
    public function CleanCategory()    {
        # code...
        $where = "`product_id` = null";
        return $this->DeleteDB($where);
    }

    public function GetByProductId($id)
    {
        $where = "`product_id` = :product_id";
        $model['product_id'] = $id;
        return $this->Select($where,$model);
        # code...
    }
}
