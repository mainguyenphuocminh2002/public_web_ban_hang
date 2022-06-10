<?php

namespace Module\Cart\Model ;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class donhang extends DB implements IModelService
{
    
    
    public $id; 
    public $first_name; 
    public $last_name; 
    public $user_id; 
    public $phone; 
    public $email; 
    public $trang_thai_id; 
    public $tinh_thanh_id; 
    public $quan_huyen_id; 
    public $address; 
    public $create_at; 
    public $note; 
    public $total;

    public function __construct($donHang = null)
    {
        parent::__construct();
        self::$TableName = "don_hang";
        if($donHang){
            if(!is_array($donHang) && !is_object($donHang)){
                $id = $donHang;
                $donHang = $this->GetById($id);
            }
            $this->id = isset($donHang->id) ? $donHang->id : null;
            $this->first_name = isset($donHang->first_name) ? $donHang->first_name : null;
            $this->last_name = isset($donHang->last_name) ? $donHang->last_name : null;
            $this->user_id = isset($donHang->user_id) ? $donHang->user_id : null;
            $this->phone = isset($donHang->phone) ? $donHang->phone : null;
            $this->email = isset($donHang->email) ? $donHang->email : null;
            $this->trang_thai_id = isset($donHang->trang_thai_id) ? $donHang->trang_thai_id : null;
            $this->tinh_thanh_id = isset($donHang->tinh_thanh_id) ? $donHang->tinh_thanh_id : null;
            $this->quan_huyen_id = isset($donHang->quan_huyen_id) ? $donHang->quan_huyen_id : null;
            $this->address = isset($donHang->address) ? $donHang->address : null;
            $this->create_at = isset($donHang->create_at) ? $donHang->create_at : null;
            $this->note = isset($donHang->note) ? $donHang->note : null;
            $this->total = isset($donHang->total) ? $donHang->total : null;
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

    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="/Molicha/Cart/donhang/themTrangThaiDonHang"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Trạng Thái Đơn Hàng</a>
        BTNTHEM;
        return $btn;
    }
    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="/Molicha/Cart/donhang/delete/?id={$this->id}"
        class="btn btn-sm btn-white text-danger mr-2"><i
            class="fa fa-trash mr-1"></i>Xoá</a>
        BTNXOA;
        return $btn;        
    }
    
    public function btnSua()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNSUA
        <a href="/Molicha/Cart/donhang/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }

        
}
