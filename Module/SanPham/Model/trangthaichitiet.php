<?php

namespace Module\SanPham\Model;

use Model\DB;
use Model\IModelService;

class trangthaichitiet extends DB  implements IModelService 
{
    public $id ,$trang_thai_id ,$product_id,$name,$des;
    public function __construct($ttct = null)
    {
        parent::__construct();
        self::$TableName = 'trang_thai_detail';
        if($ttct){
            if(!is_array($ttct) && !is_object($ttct))
            {
                $id = $ttct;
                $ttct = $this->GetById($id);
            }
            $this->id = isset($ttct->id) ? $ttct->id : null;  
            $this->trang_thai_id = isset($ttct->trang_thai_id) ? $ttct->trang_thai_id : null;  
            $this->product_id = isset($ttct->product_id) ? $ttct->product_id : null; 
            $this->name = isset($ttct->name) ? $ttct->name : null; 
            $this->des = isset($ttct->des) ? $ttct->des : null; 
        }
        # code...
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
        return $this->DeleteById($model);
        throw new \Exception("Method not implemented");
    }
    
    public function GetById($id)
    {
        return $this->SelectById($id);
        throw new \Exception("Method not implemented");
    }
    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        throw new \Exception("Method not implemented");
    }

    public function GetByNameAndTrangThai($name,$trangThaiId)
    {
        # code...
        $where = "`name` = :name AND `trang_thai_id` = :trangthaiid";
        $model['name'] = $name;
        $model['trangthaiid'] = $trangThaiId;
        return $this->SelectRow($where,$model);
    }
        
    public function GetByProductId($id)
    {
        $where = "`product_id` = :product_id";
        $model['product_id'] = $id;
        return $this->Select($where,$model);
        # code...
    }

    public function GetByTrangThaiIdAndProductId($categoryId,$productId)
    {
        $where = "`trang_thai_id` = :trangThaiId AND `product_id` = :productId";
        $model['trangThaiId'] = $categoryId;
        $model['productId'] = $productId;
        return $this->SelectRow($where,$model);
        # code...
    }

    public function GetByNameAndTrangThaiId($trangThaiId,$name)
    {
        # code...
        $where = "`trang_thai_id` = :trangThaiId AND `name` = :name";
        $model['trangThaiId'] = $trangThaiId;
        $model['name'] = $name;
        return $this->SelectRow($where,$model);
    }

    public function GetByNameAndProductId($name,$productId)
    {
        # code...
        $where = "`product_id` = :productId AND `name` = :name";
        $model['productId'] = $productId;
        $model['name'] = $name;
        return $this->SelectRow($where,$model);
    }
}
