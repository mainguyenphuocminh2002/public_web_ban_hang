<?php

namespace Module\Cart\Model;

use Model\DB;
use Model\IModelService;

class trangthaidonhang extends DB implements IModelService
{
    
    public $id; 
    public $name; 
    public $des;
    public function __construct($ttdonhang = null)
    {
        parent::__construct();
        self::$TableName = "trang_thai_don_hang";
        if($ttdonhang){
            if(!is_array($ttdonhang) && !is_object($ttdonhang)){
                $id = $ttdonhang;
                $ttdonhang = $this->GetById($id);
            }
        }
        $this->id = isset($ttdonhang->id) ? $ttdonhang->id : null; 
        $this->name = isset($ttdonhang->name) ? $ttdonhang->name : null; 
        $this->des = isset($ttdonhang->des) ? $ttdonhang->des : null; 
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

    public static function GetByName($name)
    {
        $ttdonhang = new trangthaidonhang();
        $where = "`name` = :name";
        $data['name'] = $name;
        return $ttdonhang->SelectRow($where,$data);
        # code...
    }

    public function GetAllTrangThai()
    {
        $where = "1=1";
        return $this->Select($where);
        # code...
    }
        
}
