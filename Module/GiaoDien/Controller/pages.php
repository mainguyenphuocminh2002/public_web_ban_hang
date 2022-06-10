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
use Module\GiaoDien\Model\Pages\FormPages;
use Module\GiaoDien\Model\Pages\pagesService;

class pages extends Application implements IControllerBE
{
    public function __construct()
    {
        new CheckLogin();
        Permission::Check([User::Admin]);
        self::$_Theme = 'backend';
        # code...
    }

    function index()
    {
        try {
            $pages = new pagesService();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataPages = $pages->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataPages"] = $dataPages;
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
        if (Request::Post(FormPages::$formName, '')) {
            $dataPages = Request::Post(FormPages::$formName, '');
            foreach ($dataPages as $key => $val) {
                if (empty($dataPages[$key])) {
                    continue;
                }
                $model[$key] = $val;
            }
            if ($_FILES['image']['size'] > 0) {
                $handleImage = new HandleImage();
                $model['image'] = $handleImage->handleImage($_FILES['image']);
            }
           
            $pages = new pagesService();
            if ($pages->Post($model)) {
                unset($_POST);
                Common::ToUrl('GiaoDien/pages');
            } else {
                new Error(Error::danger, "Có Lỗi Xảy Ra Trong Quá Trình Xử Lý");
            }
        }
        $this->view();
    }

    function put()
    {
        if (isset($_GET["id"])) {
            $id = Common::TextInput(Request::Get('id', ""));
            $pages = new pagesService();
            $dataPages = $pages->GetById($id);
            if (isset($_POST["Luu"]) || Request::Post(FormPages::$formName, [])) {
                $dataPages = $_POST['pages'];
                // $model['name'] = Common::TextInput($dataPages['name']);
                // $model['title'] = Common::TextInput($dataPages['title']);
                // $model['alias'] = Common::TextInput($dataPages['alias']);
                // $model['des'] = Common::TextInput($dataPages['des']);
                // $model['content'] = Common::TextInput($dataPages['content']);
                // $model['key_word'] = Common::TextInput($dataPages['key_word']);
                
                $model = $pages->GetById($dataPages['id']);
                foreach ($model as $key => $val) {
                    if ($key === 'image') {
                        if (empty($dataSlider['image'])) {
                            $model->$key = $val;
                        }
                        continue;
                    } else {
                        $model->$key  = Common::TextInput($dataPages[$key]);
                    }
                }
                if ($_FILES['image']['size'] > 0) {
                    $handleImage = new HandleImage();
                    $model->image = $handleImage->handleImage($_FILES['image']);
                }
                $pages = new pagesService();
                $model = Common::ChangeObjectToArray($model);
                $datawhere['id'] = Common::TextInput($id);
                if ($pages->Put($model, $datawhere)) {
                    unset($_POST);
                    Common::ToUrl("GiaoDien/pages/put/?id={$id}");
                } else {
                    new Error(Error::danger, 'Có Lỗi xảy Ra Trong Quá Trình Xử Lý');
                }
            }
            $this->View(['dataPages' => $dataPages]);
        }
    }

    function delete()
    {
        if (isset($_GET['id']) && !empty($_GET["id"])) {
            $pages = new pagesService();
            if ($pages->Delete(Common::TextInput($_GET["id"]))) {
                Common::ToUrl('GiaoDien/pages');
            } else {
                new Error(Error::danger, "Có Lỗi Xảy Ra");
                Common::ToUrl('GiaoDien/pages');
            }
        }
        throw new \Exception("Method not implemented");
    }
}
