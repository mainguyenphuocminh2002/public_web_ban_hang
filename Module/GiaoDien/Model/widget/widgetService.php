<?php

namespace Module\GiaoDien\Model\Widget;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class widgetService extends DB implements IModelService
{
    
    public$id; 
    public$name; 
    public$image;
    public$group_id;
    public$des;
    public$link;
    public$stt;
    public function __construct($widget = null)
    {
        parent::__construct();
        self::$TableName = 'widget';
        if($widget){
            if(!is_array($widget) && !is_object($widget)){
                $id = $widget;
                $widget = $this->GetById($id);
            }
            $this->id = isset($widget->id) ? $widget->id : null;
            $this->name = isset($widget->name) ? $widget->name : null;
            $this->des = isset($widget->des) ? $widget->des : null;
            $this->link = isset($widget->link) ? $widget->link : null;
            $this->stt = isset($widget->stt) ? $widget->stt : null;
            $this->image = isset($widget->image) ? $widget->image : null;
            $this->group_id = isset($widget->group_id) ? $widget->group_id : null;
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
        $where = "`id` = :id";
        return $this->Update($model,$where,$datawhere);
        throw new \Exception("Method not implemented");
    }
    
    public function Delete($id)
    {
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
        // $where = "`parent_id = null or parent_id = '' `";
        if($parent_id != null){
            // $where = "`parent_id = '{$parent_id}'`";
        }
        $widget = new widgetService();
        // return $widget->SelectToOptions($where,['id,name']);
        # code...
    }

    public function GetItemsByGroups($GroupsId) {
        $widget = new widgetService();
        $where = "`group_id` = '{$GroupsId}' ORDER BY `stt` DESC";
        return $widget->Select($where);
    }

    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="widget/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Widget </a>
        BTNTHEM;
        return $btn;
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="widget/delete/?id={$this->id}"
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
        <a href="widget/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }
  
}
