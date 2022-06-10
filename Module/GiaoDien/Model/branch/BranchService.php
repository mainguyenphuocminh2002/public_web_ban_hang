<?php

namespace Module\GiaoDien\Model\Branch ;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class BranchService extends DB implements IModelService
{
    
    public$id; 
    public$name; 
    public$address;
    public$image;
    public$group_id;
    public function __construct($branch = null)
    {
        parent::__construct();
        self::$TableName = 'branch';
        if($branch){
            if(!is_array($branch) && !is_object($branch)){
                $id = $branch;
                $branch = $this->GetById($id);
            }
            $this->id = isset($branch->id) ? $branch->id : null;
            $this->name = isset($branch->name) ? $branch->name : null;
            $this->address = isset($branch->address) ? $branch->address : null;
            $this->image = isset($branch->image) ? $branch->image : null;
            $this->group_id = isset($branch->group_id) ? $branch->group_id : null;
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
    public static function GetDataToSelect($parent_id = null)
    {
        // $where = "`parent_id = null or parent_id = '' `";
        if($parent_id != null){
            // $where = "`parent_id = '{$parent_id}'`";
        }
        $branch = new BranchService();
        // return $branch->SelectToOptions($where,['id,name']);
        # code...
    }

    public function GetItemsByGroups($GroupsId) {
        $branch = new BranchService();
        $where = "`group_id` = '{$GroupsId}' limit 3";
        return $branch->Select($where);
    }

    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="branch/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Cơ Sở</a>
        BTNTHEM;
        return $btn;
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="branch/delete/?id={$this->id}"
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
        <a href="branch/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }
  
}
