<?php

namespace Module\SanPham\Model;

use Model\DB;
use Model\IModelService;

class productCategoryDetail extends DB implements IModelService
{
    
    public $id; 
    public $category_id; 
    public $product_id; 
    public function __construct($product_category = null)
    {
        # code...
        parent::__construct();
        self::$TableName = 'product_category_detail';
        if($product_category){
            if(!is_array($product_category) && !is_object($product_category)){
                $id = $product_category;
                $product_category = $this->GetById($id);
            }
            $this->id = isset($product_category->id) ? $product_category->id : null;
            $this->category_id = isset($product_category->category_id) ? $product_category->category_id : null;
            $this->product_id = isset($product_category->product_id) ? $product_category->product_id : null;
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
        $model['id'] = $id;
        print_r($model);
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
    
    public function GetByCategoryDetailId($category_id)
    {
        # code...
        $where = "`category_id` = :category_id";
        $model['category_id'] = $category_id;
        return $this->Select($where,$model);
    }

    public function GetByProductId($id)
    {
        $where = "`product_id` = :product_id";
        $model['product_id'] = $id;
        return $this->Select($where,$model);
        # code...
    }

    public function GetByProductIdAndCategory($productId,$categoryId)
    {
        $where = "`product_id` = :productId AND `category_id` = :categoryId";
        $model['productId'] = $productId;
        $model['categoryId'] = $categoryId;
        return $this->Select($where,$model);
        # code...
    }
}
