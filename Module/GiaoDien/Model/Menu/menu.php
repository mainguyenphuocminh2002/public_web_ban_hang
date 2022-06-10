<?php

namespace Module\GiaoDien\Model\Menu ;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class menu extends DB implements IModelService
{
    
    public $id; 
    public $name; 
    public $link; 
    public $parent_id; 
    public $icon; 
    public $group_id; 
    public $stt;

    public function __construct($menu = null)
    {
        parent::__construct();
        self::$TableName="menu";
        if($menu){
            if(!is_array($menu) && !is_object($menu)){
                $id = $menu;
                $menu = $this->GetById($id);
            }
            $this->id = isset($menu->id) ? $menu->id : null;
            $this->name = isset($menu->name) ? $menu->name : null;
            $this->link = isset($menu->link) ? $menu->link : null;
            $this->parent_id = isset($menu->parent_id) ? $menu->parent_id : null;
            $this->icon = isset($menu->icon) ? $menu->icon : null;
            $this->group_id = isset($menu->group_id) ? $menu->group_id : null;
            $this->stt = isset($menu->stt) ? $menu->stt : null;
        }
    }

    public function Post($model)
    {
        return $this->Insert($model);
        throw new \Exception("Method not implemented");
    }
    
    public function Put($model,$datawhere)
    {
        $where = "`id` = :id";
        return $this->Update($model,$where,$datawhere);
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
    public static function GetDataToSelect($parent_id = null)
    {
        $where = "`parent_id = null or parent_id = '' `";
        if($parent_id != null){
            $where = "`parent_id = '{$parent_id}'`";
        }
        $menu = new menu();
        return $menu->SelectToOptions($where,[],['id,name']);
        # code...
    }
    public function GetItemsByGroupsParent($GroupsId, $ParentsId) {
        $menu = new menu();
        $where = "`parent_id` = '{$ParentsId}' and `group_id` = '{$GroupsId}' Order by `stt` ";
        return $menu->Select($where);
    }

    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="menu/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Điều Hướng</a>
        BTNTHEM;
        return $btn;
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="menu/delete/?id={$this->id}"
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
        <a href="menu/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }

}
