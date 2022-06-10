<?php

namespace Module\SanPham\Model ;
use Model\DB;
use Model\User;
use Model\Permission;

class sanpham extends DB implements \Model\IModelService
{
    public $id;
    public $name;
    public $trang_thai;
    public $image;
    public $price;
    public $code;
    public $des;
    public $sale_off;
    public $create_at;
    public $is_show;
    public $view;
    public $key_word;
    
    public function __construct($sp = null)
    {
        parent::__construct();
        self::$TableName = "product";
        if($sp){
            if(!is_array($sp) && !is_object($sp)){
                $id = $sp;
                $sp = $this->GetById($id);
            }
            $this->id = isset($sp->id) ? $sp->id : null;
            $this->name = isset($sp->name) ? $sp->name : null;
            $this->trang_thai = isset($sp->trang_thai) ? $sp->trang_thai : null;
            $this->image = isset($sp->image) ? $sp->image : null;
            $this->price = isset($sp->price) ? $sp->price : null;
            $this->code = isset($sp->code) ? $sp->code : null;
            $this->des = isset($sp->des) ? $sp->des : null;
            $this->sale_off = isset($sp->sale_off) ? $sp->sale_off : null;
            $this->create_at = isset($sp->create_at) ? $sp->create_at : null;
            $this->is_show = isset($sp->is_show) ? $sp->is_show : null;
            $this->view = isset($sp->view) ? $sp->view : null;
            $this->key_word = isset($sp->key_word) ? $sp->key_word : null;
        }
        # code...
    }

    public function Post($model)
    {
        return $this->Insert($model);
    }

    public function Put($model,$datawhere)
    {
        $where ="`id` = :id";
        return $this->Update($model,$where,$datawhere);
    }

    public function Delete($id)
    {
        return $this->DeleteById(['id'=>$id]);
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
            $where = "`name` like :keyword";
            return $this->Search($where, $total,$dataPT);
        }
        $dataPT['PT']['indexPage'] = $indexPage;
        $dataPT['PT']['pageNumber'] = $pageNumber;
        return $this->SelectPT(1, $total, $dataPT);
    }

    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="/SanPham/index/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Sản Phẩm</a>
        BTNTHEM;
        return $btn;
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="/SanPham/index/delete/?id={$this->id}"
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
        <a href="/SanPham/index/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    
    }
    public function btnRestore()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNSUA
        <a href="/SanPham/index/restore/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Khôi Phục</a>        
        BTNSUA;
        return $btn;        
    }
    
    public function btnXemLoai()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn =<<<BTNTHEM
        <a href="/SanPham/CategoryDetail"
        class="btn btn-primary mr-2"><i
            class="fa fa-eye mr-1"></i>Xem Loại Chi Tiết</a>
        BTNTHEM;
        return $btn;
    }

    public function btnTrash()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn =<<<BTNTRASH
        <a href="/SanPham/index/trash"
        class="btn btn-primary mr-2"><i
        }
        class="fa fa-trash mr-1"></i>Thùng Rác</a>
        BTNTRASH;
        return $btn;
    }

    public function GetBestSeller()
    {
        $where = "`view` > 1 ORDER BY `create_at` ASC LIMIT 0,4;";
        return $this->Select($where);
        # code...
    }

    public function GetByName($name)
    {
        $where = "`name` = :name";
        $model['name'] = $name;
        return $this->SelectRow($where,$model);
        # code...
    }
}