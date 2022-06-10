<?php

namespace Module\GiaoDien\Controller;

use Model\User;
use Application;
use Model\Error;
use Model\Common;
use Model\Request;
use Model\Permission;
use Controller\CheckLogin;
use Controller\HandleImage;
use Controller\IControllerBE;
use Module\GiaoDien\Model\Widget\FormWidget;
use Module\GiaoDien\Model\Widget\widgetService;

class widget extends Application implements IControllerBE
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
            $widget = new widgetService();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataWidget = $widget->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataWidget"] = $dataWidget;
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
        if(Request::Post(FormWidget::$formName,'')){
            $dataWidget = Request::Post(FormWidget::$formName,'');
            foreach($dataWidget as $key => $val){
                if(empty($dataWidget[$key])){
                    continue;
                }
                $model[$key] = common::TextInput($val);
            }
            $handleImage = new HandleImage();
            $model['image'] = $handleImage->handleImage($_FILES['image']);
            $widget = new widgetService();
            if($widget->Post($model)){
                unset($_POST);
                Common::ToUrl('GiaoDien/widget');
            }else{
                new Error(Error::danger,"Có Lỗi Xảy Ra Trong Quá Trình Xử Lý");
            }
        }
        $this->View();
    }
    
    function put()
    {
        if(isset($_GET["id"])){
            $id = Common::TextInput(Request::Get('id',""));
            $widget = new widgetService();
            $dataWidget = $widget->GetById($id);
            if(isset($_POST["Luu"]) || Request::Post(FormWidget::$formName,[])){
                $dataWidget = $_POST['widget'];
                // $model['name'] = Common::TextInput($dataWidget['name']);
                // $model['address'] = Common::TextInput($dataWidget['address']);
                // $model['image'] = Common::TextInput($dataWidget['image']);
                // $model['group_id'] = Common::TextInput($dataWidget['group_id']);
                $model = $widget->GetById($dataWidget['id']);
                foreach($model as $key => $val){
                    if ($key === 'image') {
                        if (empty($dataSlider['image'])) {
                            $model->$key = $val;
                        }
                        continue;
                    } else {
                        $model->$key  = Common::TextInput($dataWidget[$key]);
                    }
                }
                if ($_FILES['image']['size'] > 0) {
                    $handleImage = new HandleImage();
                    $model->image = $handleImage->handleImage($_FILES['image']);
                }
                $model = Common::ChangeObjectToArray($model);
                $datawhere['id'] = Common::TextInput($id);
                
                if($widget->Put($model,$datawhere)){
                    unset($_POST);
                    Common::ToUrl("GiaoDien/widget/put/?id={$id}");
                }else{
                    new Error(Error::danger,'Có Lỗi xảy Ra Trong Quá Trình Xử Lý');
                }
            }
            $this->View(['dataWidget' => $dataWidget]);
        }
    }
    
    function delete()
    {
        throw new \Exception("Method not implemented");
    }
        
}
