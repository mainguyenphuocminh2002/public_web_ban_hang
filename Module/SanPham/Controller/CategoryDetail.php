<?php

namespace Module\SanPham\Controller ;

use Application;
use Controller\IControllerBE;
use Error;
use Model\Common;
use Model\Error as ModelError;
use Module\SanPham\Model\categoryDetail as ModelCategoryDetail;
use Module\SanPham\Model\productCategoryDetail;

class CategoryDetail extends Application implements IControllerBE
{
    
    public function __construct()
    {
        self::$_Theme = 'backend';
        # code...
    }

    function index()
    {
        try {
            $categoryDetail = new ModelCategoryDetail();
            $params["keyword"] = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
            $indexPage = isset($_POST["indexPage"]) ? intval($_POST["indexPage"]) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_POST["pageNumber"]) ? intval($_POST["pageNumber"]) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataCategory = $categoryDetail->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataCategory"] = $dataCategory;
            $data["indexPage"] = $indexPage;
            $data["pageNumber"] = $pageNumber;
            $data["params"] = $params;
            $data["total"] = $total;
            $this->View($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $this->View();
        throw new \Exception("Method not implemented");
    }
    
    function post()
    {
        if(isset($_POST) && !empty($_POST)){
            $data = $_POST['category_detail'];
            $model['id'] = Common::TextInput($data['id']);
            $model['name'] = Common::TextInput($data['name']);
            $model['category_id'] = Common::TextInput($data['category_id']);
            $model['des'] = Common::TextInput($data['des']);
            $categoryDetail = new ModelCategoryDetail();
            $categoryDetail->Post($model);
        }
        $this->View();
    }
    
    function put()
    {
        if(isset($_GET)){
            $id = Common::TextInput($_GET['id']);
            $model['id'] = Common::TextInput($_POST['id']);
            $model['name'] = Common::TextInput($_POST['name']);
            $model['category_id'] = Common::TextInput($_POST['category_id']);
            $model['des'] = Common::TextInput($_POST['des']);
            $categoryDetail = new ModelCategoryDetail();
            $categoryDetail->Put($model,['id'=>$id]);
        }
        $this->View();
        throw new \Exception("Method not implemented");
    }
    
    function delete()
    {
        if(isset($_GET)){
            $id = Common::TextInput($_GET['id']);
            $productCategory = new productCategoryDetail();
            $check = $productCategory->GetByCategoryDetailId($id);
            if($check){
                new Error(ModelError::danger,"Vui Lòng Xoá Sản Phẩm");
                Common::ToUrl('SanPham/CategoryDetail');
            }else{
                $categoryDetail = new ModelCategoryDetail();
                $categoryDetail->Delete($id);
                Common::ToUrl('SanPham/CategoryDetail');

            }
        }
    }
        
}
