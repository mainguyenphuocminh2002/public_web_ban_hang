<?php

namespace Module\SanPham\Model;

use Model\DB;
use Model\IModelService;

class Category extends DB implements IModelService
{
    
    public $id; 
    public $name; 
    public $des;
    public function __construct($category = null)
    {
        parent::__construct();
        self::$TableName = "category";
        if($category){
            if(!is_array($category) && !is_object($category)){
                $id = $category;
                $category = $this->GetById($id);
            }
        }
        $this->id = isset($category->id) ? $category->id : null;
        $this->name = isset($category->name) ? $category->name : null;
        $this->des = isset($category->des) ? $category->des : null;
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
        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $dataPT['PT']['indexPage'] = $indexPage;
            $dataPT['PT']['pageNumber'] = $pageNumber;
            $dataPT['PT']['keyword'] = !empty($params['keyword']) ? '%' . $params['keyword'] . '%' : '';
            $where = "`name` like :keyword";
            return $this->Search($where, $total,$dataPT);
        }
        $dataPT['PT']['indexPage'] = $indexPage;
        $dataPT['PT']['pageNumber'] = $pageNumber;
        return $this->SelectPT(1, $total, $dataPT);
        throw new \Exception("Method not implemented");
    }
    
    public static function GetDataToSelect()
    {
        $cate = new Category();
        $where = "1=1";
        $data = $cate->SelectToOptions($where,[],['id','name']);
        return $data;
    }

    public function GetByCategoryName($categoryName)
    {
        $where = "`name` = :name";
        $data['name'] = $categoryName;
        return $this->SelectRow($where,$data);
    }
    public function GetAllDanhMuc()
    {
        # code...
        $where ="1=1";
        return $this->Select($where);
    }
}
