<?php

namespace Module\SanPham\Model;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class categoryDetail extends DB implements IModelService
{
    public $id;
    public $category_id;
    public $name;
    public $des;
    public function __construct($category_detail = null)
    {
        # code...
        parent::__construct();
        self::$TableName = 'category_detail';
        if ($category_detail) {
            if (!is_array($category_detail) && !is_object($category_detail)) {
                $id = $category_detail;
                $category_detail = $this->GetById($id);
            }
            $this->id = isset($category_detail->id) ? $category_detail->id : null;
            $this->category_id = isset($category_detail->category_id) ? $category_detail->category_id : null;
            $this->name = isset($category_detail->name) ? $category_detail->name : null;
            $this->des = isset($category_detail->des) ? $category_detail->des : null;
        }
    }

    public function Post($model)
    {
        return $this->Insert($model);
    }

    public function Put($model, $datawhere)
    {
        return $this->UpdateRow($model,$datawhere);
        throw new \Exception("Method not implemented");
    }

    public function Delete($id)
    {
        return $this->DeleteById(['id'=>$id]);
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

    public function GetByName($name)
    {
        # code...
        $where = "`name` = :name";
        $model['name'] = $name;
        return $this->SelectRow($where,$model);
    }

    public function GetByProductId($id)
    {
        $where = "`product_id` = :product_id";
        $model['product_id'] = $id;
        return $this->Select($where,$model);
        # code...
    }
    

    public static function GetDataToSelect()
    {
        $tt = new categoryDetail();
        $where = "1=1";
        $data = $tt->SelectToOptions($where,[],['id','name']);
        return $data;
    }

    public function GetAllDetail()
    {
        $where = "1=1";
        return $this->Select($where);
        # code...
    }

    public function GetByCategoryId($categoryId)
    {
        $where = "`category_id` = :categoryId";
        $model['categoryId'] = $categoryId;
        return $this->Select($where,$model);
    }

    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="/SanPham/CategoryDetail/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Loại</a>
        BTNTHEM;
        return $btn;
    }

    public function btnXemSP()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn =<<<BTNTHEM
        <a href="/SanPham"
        class="btn btn-primary mr-2"><i
            class="fa fa-eye mr-1"></i>Xem Sản Phẩm</a>
        BTNTHEM;
        return $btn;
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="/SanPham/CategoryDetail/delete/?id={$this->id}"
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
        <a href="/SanPham/CategoryDetail/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }
}

