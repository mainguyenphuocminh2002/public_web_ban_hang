<?php

namespace  Module\Cart\Model;

use Model\DB;
use Model\IModelService;

class giohang extends DB implements IModelService
{
    
    public $id; 
    public $user_id; 
    public $product_id; 
    public $number; 
    public $create_at; 
    public $trang_thai;
    public function __construct($giohang = null)
    {
        parent::__construct();
        self::$TableName = "gio_hang";
        if($giohang){
            if(!is_array($giohang) && !is_object($giohang)){
                $id = $giohang;
                $giohang = $this->GetById($id);
            }
            $this->id = isset($giohang->id) ? $giohang->id : null;
            $this->user_id = isset($giohang->user_id) ? $giohang->user_id : null;
            $this->product_id = isset($giohang->product_id) ? $giohang->product_id : null;
            $this->number = isset($giohang->number) ? $giohang->number : null;
            $this->create_at = isset($giohang->create_at) ? $giohang->create_at : null;
            $this->trang_thai = isset($giohang->trang_thai) ? $giohang->trang_thai : null;
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
        return $this->SelectById(['id'=>$id]);
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
        throw new \Exception("Method not implemented");
    }
        
    public function GetByUserIdAndProductId($idUser,$idSanPham)
    {
        $where = "`user_id` = :userId AND `product_id` = :productId";
        $data['userId'] = $idUser;
        $data['productId'] = $idSanPham;
        return $this->SelectRow($where,$data);
        # code...
    }

    public function GetByUserId($user_id)
    {
        # code...
        $where = "`user_id` = :userId";
        $data['userId'] = $user_id;
        return $this->Select($where,$data);
    }

    public function DeleteByProductIdAndNumber($product_id)
    {
        # code...
        $where = "`product_id` = :productId AND number = 1";
        $datawhere['productId'] = $product_id;
        return $this->DeleteDB($where,$datawhere);
    }

    public function DeleteByProductId($product_id)
    {
        # code...
        $where = "`product_id` = :productId";
        $datawhere['productId'] = $product_id;
        return $this->DeleteDB($where,$datawhere);
        
    }
}
