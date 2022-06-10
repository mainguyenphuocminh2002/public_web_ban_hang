<?php

namespace Module\SanPham\Model ;

use Model\DB;
use Model\IModelService;

class Toping extends DB implements IModelService
{
    public $id; 
    public $name; 
    public $product_id;
    public function __construct($toping = null)
    {
        parent::__construct();
        self::$TableName = 'toping';
        if($toping){
            if(!is_array($toping) && !is_object($toping)){
                $id = $toping;
                $toping = $this->GetById($id);
            }
            $this->id = isset($toping->id) ? $toping->id : null;
            $this->name = isset($toping->name) ? $toping->name : null;
            $this->product_id = isset($toping->product_id) ? $toping->product_id : null;
        }
    }

    public function Post($model)
    {
        return $this->Insert($model);
        throw new \Exception("Method not implemented");
    }
    
    public function Put($model,$datawhere)
    {
        return $this->UpdateRow($model,$datawhere);
        throw new \Exception("Method not implemented");
    }
    
    public function Delete($id)
    {
        $model['id'] =$id;
        return $this->DeleteById($model);
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

    public function CleanToping()    {
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
        
    public function GetByProductIdAndName($productId,$name)
    {
        # code...
        $where = "`product_id` = :productId AND `name` = :name";
        $model['productId'] = $productId;
        $model['name'] = $name;
        return $this->SelectRow($where,$model);
    }
}
