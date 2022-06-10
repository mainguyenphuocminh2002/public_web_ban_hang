<?php

namespace Module\GiaoDien\Model\Slider;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class sliderservice extends DB implements IModelService
{
    public $id; 
    public $name; 
    public $content; 
    public $image; 
    public $group_id; 
    public $is_public;
    public function __construct($slider = null)
    {
        parent::__construct();
        self::$TableName = 'slider';
        if($slider){
            if(!is_array($slider) && !is_object($slider)){
                $id = $slider;
                $slider = $this->GetById($id);
            }
            $this->id = isset($slider->id) ? $slider->id : null; 
            $this->name = isset($slider->name) ? $slider->name : null; 
            $this->content = isset($slider->content) ? $slider->content : null; 
            $this->image = isset($slider->image) ? $slider->image : null; 
            $this->group_id = isset($slider->group_id) ? $slider->group_id : null; 
            $this->is_public = isset($slider->is_public) ? $slider->is_public : null;
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
        return $this->DeleteById(['id'=>$id]);
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
    public static function btnThem()
    {
        if(Permission::CheckPremision([user::Admin])==false){
            return;
        }
        $btn =<<<BTNTHEM
        <a href="slider/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Giao Diện</a>
        BTNTHEM;
        return $btn;
        # code...
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="slider/delete/?id={$this->id}"
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
        <a href="slider/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }
    public static function GetByGroup($group)
    {
        $slider = new sliderservice();
        $where = "`group_id` = :groupId AND is_public = 1";
        $model['groupId'] = $group;
        return $slider->Select($where,$model);
        # code...
    }


    
}
