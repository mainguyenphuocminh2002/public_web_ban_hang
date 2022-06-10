<?php

namespace Module\GiaoDien\Model\Pages;

use Model\DB;
use Model\User;
use Model\Permission;
use Model\IModelService;

class pagesService extends DB implements IModelService
{
    
    public $id; 
    public $name; 
    public $image; 
    public $content; 
    public $key_word; 
    public $title; 
    public $alias; 
    public $des;
    public function __construct($pages = null)
    {
        parent::__construct();
        self::$TableName = 'pages';
        if($pages){
            if(!is_array($pages) && !is_object($pages)){
                $id = $pages;
                $pages = $this->GetById($id);
            }
            $this->id = isset($pages->id) ? $pages->id : null;
            $this->name = isset($pages->name) ? $pages->name : null;
            $this->image = isset($pages->images) ? $pages->images : null;
            $this->content = isset($pages->content) ? $pages->content : null;
            $this->key_word = isset($pages->key_word) ? $pages->key_word : null;
            $this->title = isset($pages->title) ? $pages->title : null;
            $this->alias = isset($pages->alias) ? $pages->alias : null;
            $this->des = isset($pages->des) ? $pages->des : null;
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
    public static function btnThem()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }        
        $btn =<<<BTNTHEM
        <a href="pages/post"
        class="btn btn-primary mr-2"><i
            class="fa fa-plus mr-1"></i>Thêm Trang</a>
        BTNTHEM;
        return $btn;
    }

    public function btnXoa()
    {
        if (Permission::CheckPremision([User::Admin]) == false) {
            return;
        }    
        $btn = <<<BTNXOA
        <a href="pages/delete/?id={$this->id}"
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
        <a href="pages/put/?id={$this->id}"
        class="btn btn-sm btn-white text-success mr-2"><i
            class="far fa-edit mr-1"></i>Sửa</a>        
        BTNSUA;
        return $btn;        
    }

    public function GetByAlias($alias)
    {
        $where = "`alias` = :alias";
        $model['alias'] = $alias;
        return $this->SelectRow($where,$model);
    }

}
