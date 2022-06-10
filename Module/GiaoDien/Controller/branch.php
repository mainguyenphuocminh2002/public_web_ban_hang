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
use Module\GiaoDien\Model\Branch\FormBranch;
use Module\GiaoDien\Model\Branch\BranchService;

class branch extends Application implements IControllerBE
{
    public function __construct()
    {
        # code...
        self::$_Theme = 'backend';
        new CheckLogin();
        Permission::Check([User::Admin]);
    }

    function index()
    {
        try {
            $branch = new BranchService();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataBranch = $branch->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataBranch"] = $dataBranch;
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
        if (isset($_POST["Luu"])) {
            $dataBranch = $_POST['branch'];
            $model['id'] = Common::TextInput($dataBranch['id']);
            $model['name'] = Common::TextInput($dataBranch['name']);
            $model['address'] = Common::TextInput($dataBranch['address']);
            $model['group_id'] = Common::TextInput($dataBranch['group_id']);
            foreach ($dataBranch as $key => $val) {
                $model[$key] = Common::TextInput($val);
            }
            $handleImage = new HandleImage();
            $model['image'] = $handleImage->handleImage($_FILES['image']);
            $branch = new BranchService();
            $branch->Post($model);
            unset($_POST);
        }
        $this->View();
    }

    function put()
    {
        if (isset($_GET["id"])) {
            $id = Common::TextInput(Request::Get('id', ""));
            $branch = new BranchService();
            $dataBranch = $branch->GetById($id);
            if (isset($_POST["Luu"]) || Request::Post(FormBranch::$formName, [])) {
                $dataBranch = $_POST['branch'];
                $model['name'] = Common::TextInput($dataBranch['name']);
                $model['address'] = Common::TextInput($dataBranch['address']);
                $model['group_id'] = Common::TextInput($dataBranch['group_id']);
                $model = $branch->GetById($dataBranch['id']);
                foreach ($model as $key => $val) {
                    $model->$key  = Common::TextInput($dataBranch[$key]);
                }
                $handleImage = new HandleImage();
                $model->image = $handleImage->handleImage($_FILES['image']);
                $model = Common::ChangeObjectToArray($model);
                $datawhere['id'] = Common::TextInput($id);
                $branch->Put($model, $datawhere);
                unset($_POST);
            }
            $this->View(['dataBranch' => $dataBranch]);
        } else {
            new Error(Error::danger, "Có Lỗi Xảy Ra Trong Quá Trình");
            Common::ToUrl('GiaoDien/branch');
        }
    }

    function delete()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = Common::TextInput($_GET['id']);
            $branch = new BranchService();
            if ($branch->Delete($id)) {
                Common::ToUrl('GiaoDien/branch');
            } else {
                new Error(Error::danger, "Có Lỗi");
                Common::ToUrl('GiaoDien/branch');
            }
        }
    }
}
