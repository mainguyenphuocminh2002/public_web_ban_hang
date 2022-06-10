<?php

namespace Module\Cart\Model;

use Model\DB;
use Model\IModelService;

class donhangchitiet extends DB implements IModelService
{
    
    public $id; 
    public $id_don_hang; 
    public $product_id; 
    public $so_luong; 
    public $gia;

    public function __construct($dhchitiet = null)
    {
        parent::__construct();
        self::$TableName = 'don_hang_chi_tiet';
        if($dhchitiet){
            if(!is_array($dhchitiet) && !is_object($dhchitiet)){
                $id = $dhchitiet;
                $dhchitiet = $this->GetById($id);
            }
            $this->id = isset($dhchitiet->id) ? $dhchitiet->id : null;
            $this->id_don_hang = isset($dhchitiet->id_don_hang) ? $dhchitiet->id_don_hang : null;
            $this->product_id = isset($dhchitiet->product_id) ? $dhchitiet->product_id : null;
            $this->so_luong = isset($dhchitiet->so_luong) ? $dhchitiet->so_luong : null;
            $this->gia = isset($dhchitiet->gia) ? $dhchitiet->gia : null;
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
        throw new \Exception("Method not implemented");
    }
    
    public function GetById($id)
    {
        return $this->SelectById(['id'=>$id]);
        throw new \Exception("Method not implemented");
    }
    
    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        throw new \Exception("Method not implemented");
    }
        
}
