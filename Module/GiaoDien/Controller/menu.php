<?php

namespace Module\GiaoDien\Controller;

use Model\User;
use Application;
use Model\Error;
use Model\Common;
use Model\Request;
use Model\Permission;
use Controller\CheckLogin;
use Controller\IControllerBE;
use Module\GiaoDien\Model\Menu\FormMenu;
use Module\GiaoDien\Model\Menu\menu as ModelMenu;

class menu extends Application implements IControllerBE
{

    public function __construct()
    {
        self::$_Theme = 'backend';
        new CheckLogin();
        Permission::Check([User::Admin]);
        # code...
    }

    function index()
    {
        try {
            $menu = new ModelMenu();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataMenu = $menu->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataMenu"] = $dataMenu;
            $data["indexPage"] = $indexPage;
            $data["pageNumber"] = $pageNumber;
            $data["params"] = $params;
            $data["total"] = $total;
            $this->View($data);
        } catch (\Throwable $th) {

        }
    }
    
    function post()
    {
        if(isset($_POST["Luu"])){
            $dataMenu = $_POST['menu'];
            $model['id'] = Common::TextInput($dataMenu['id']);
            $model['name'] = Common::TextInput($dataMenu['name']);
            $model['link'] = Common::TextInput($dataMenu['link']);
            $model['parent_id'] = Common::TextInput($dataMenu['parent_id']);
            $model['icon'] = Common::TextInput($dataMenu['icon']);
            $model['group_id'] = Common::TextInput($dataMenu['group_id']);
            $model['stt'] = Common::TextInput($dataMenu['stt']);
            if(is_numeric($model['stt']) == false){
                new Error(Error::danger,'Vui Lòng Nhập Vị Trí Là Số');
                Common::ToUrl('GiaoDien/menu/post');
            }
            $menu = new ModelMenu();
            $menu->Post($model);
            unset($_POST);
        }
        $this->View();
    }
    
    function put()
    {
        if(isset($_GET["id"])){
            $id = Common::TextInput(Request::Get('id',""));
            $menu = new ModelMenu();
            $dataMenu = $menu->GetById($id);
            if(isset($_POST["Luu"]) || Request::Post(FormMenu::$formName,[])){
                $dataMenu = $_POST['menu'];
                // $model['name'] = Common::TextInput($dataMenu['name']);
                // $model['address'] = Common::TextInput($dataMenu['address']);
                // $model['image'] = Common::TextInput($dataMenu['image']);
                // $model['group_id'] = Common::TextInput($dataMenu['group_id']);
                $model = $menu->GetById($dataMenu['id']);
                foreach($model as $key => $val){
                    $model->$key  = Common::TextInput($dataMenu[$key]);
                }
                $model = Common::ChangeObjectToArray($model);
                $datawhere['id'] = Common::TextInput($id);
                $menu->Put($model,$datawhere);
                unset($_POST);
                if($menu->Put($model,$datawhere)){
                    unset($_POST);
                    Common::ToUrl("GiaoDien/menu/put/?id={$id}");
                }else{
                    new Error(Error::danger,'Có Lỗi xảy Ra Trong Quá Trình Xử Lý');
                }
            }
            $this->View(['dataMenu' => $dataMenu]);
        }
    }
    
    function delete()
    {
        if(isset($_GET)){
            $menu = new ModelMenu();
            $menu->Delete(Common::TextInput($_GET["id"]));
            Common::ToUrl('GiaoDien/menu');
        }

    }
        

}
