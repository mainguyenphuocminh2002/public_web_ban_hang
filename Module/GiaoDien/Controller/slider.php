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
use Module\SanPham\Model\sanpham;
use Module\GiaoDien\Model\Slider\FormSlider;
use Module\GiaoDien\Model\Slider\sliderservice;

class slider extends Application implements IControllerBE
{
    public function __construct()
    {
        self::$_Theme = 'backend';
        new CheckLogin();
        Permission::Check([User::Admin]);
    }
    function index()
    {

        try {
            $slider = new sliderservice();
            $params["keyword"] = isset($_REQUEST["keyword"]) ? Common::TextInput($_REQUEST["keyword"]) : "";
            $indexPage = isset($_REQUEST["indexPage"]) ? Common::TextInput(intval($_REQUEST["indexPage"])) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_REQUEST["pageNumber"]) ? Common::TextInput(intval($_REQUEST["pageNumber"])) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataSlider = $slider->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataSlider"] = $dataSlider;
            $data["indexPage"] = $indexPage;
            $data["pageNumber"] = $pageNumber;
            $data["params"] = $params;
            $data["total"] = $total;
            $this->View($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function post()
    {
        if (isset($_POST['Luu'])) {
            $dataSlider = $_POST['slider'];
            $model['id'] = $dataSlider['id'];
            $model['name'] = Common::TextInput($dataSlider['name']);
            $model['content']  = Common::TextInput($dataSlider["content"]);
            $handleImage = new HandleImage();
            $model['image'] = $handleImage->handleImage($_FILES['image']);
            $model['group_id']  = Common::TextInput($dataSlider["group_id"]);
            $model['is_public']  = Common::TextInput($dataSlider["is_public"]);
            $slider = new sliderservice();
            $slider->Post($model);
        }
        $this->View();
        // throw new \Exception("Method not implemented");
    }

    function put()
    {
        if (isset($_GET["id"])) {
            $id = Common::TextInput($_GET["id"]);
            $slider = new sliderservice();
            $dataSlider = $slider->GetById($id);
            if (isset($_POST["Luu"]) || Request::Post(FormSlider::$formName, [])) {
                $dataSlider = $_POST['slider'];
                $model['name'] = Common::TextInput($dataSlider['name']);
                $model['group_id'] = Common::TextInput($dataSlider['group_id']);
                $model = $slider->GetById($dataSlider['id']);
                foreach ($model as $key => $val) {
                    if ($key === 'image') {
                        if (empty($dataSlider['image'])) {
                            $model->$key = $val;
                        }
                        continue;
                    } else {
                        $model->$key  = Common::TextInput($dataSlider[$key]);
                    }
                }
                if ($_FILES['image']['size'] > 0) {
                    $handleImage = new HandleImage();
                    $model->image = $handleImage->handleImage($_FILES['image']);
                }
                $model = Common::ChangeObjectToArray($model);
                $datawhere['id'] = Common::TextInput($id);
                if ($slider->Put($model, $datawhere)) {
                    unset($_POST);
                    Common::ToUrl("GiaoDien/slider/put/?id={$id}");
                } else {
                    new Error(Error::danger, 'Có Lỗi xảy Ra Trong Quá Trình Xử Lý');
                }
            }
            $this->View(['dataSlider' => $dataSlider]);
        }
    }

    function delete()
    {
        if (isset($_GET['id']) && !empty($_GET["id"])) {
            $slider = new sliderservice();
            if ($slider->Delete(Common::TextInput($_GET["id"]))) {
                Common::ToUrl('GiaoDien/Slider');
            } else {
                new Error(Error::danger, "Có Lỗi Xảy Ra");
                Common::ToUrl('GiaoDien/Slider');
            }
        }
    }
}
