<?php

namespace Module\SanPham\Controller;

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
use Module\SanPham\Model\Category;
use Module\SanPham\Model\categoryDetail;
use Module\SanPham\Model\productCategoryDetail;
use Module\SanPham\Model\Toping;
use Module\SanPham\Model\trangthai;
use Module\SanPham\Model\trangthaichitiet;

class Index extends Application implements IControllerBE

{
    public function __construct()
    {
        new CheckLogin();
        self::$_Theme = 'backend';
    }

    function index()
    {
        try {
            $sanpham = new sanpham();
            $params["keyword"] = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
            $indexPage = isset($_POST["indexPage"]) ? intval($_POST["indexPage"]) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_POST["pageNumber"]) ? intval($_POST["pageNumber"]) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataSanPham = $sanpham->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataSanPham"] = $dataSanPham;
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
            $dataSP = Request::Post('sanpham', null);
            $model = [];
            $ttct = [];
            $model['id'] = Common::TextInput($dataSP['id']);
            $model['name'] =  Common::TextInput($dataSP['name']);
            $model['create_at'] = date("Y-m-d", time());
            $model['view'] = $dataSP['view'];
            $model['is_show'] = $dataSP['is_show'];
            $model['price'] = Common::TextInput($dataSP['price']);
            if (!is_numeric($model['price'])) {
                new Error(Error::danger, 'Vui Lòng Nhập Giá Trị Là Số');
                Common::ToUrl('SanPham/index/post');
            }
            $model['sale_off'] = Common::TextInput($dataSP['sale_off']);
            if (!is_numeric($model['sale_off'])) {
                new Error(Error::danger, 'Vui Lòng Nhập Giá Trị Là Số');
                Common::ToUrl('SanPham/index/post');
            }
            $model['code'] = Common::TextInput($dataSP['code']);
            $handleImage = new HandleImage();
            $model['image'] = $handleImage->handleImage($_FILES['image']);
            $model['key_word'] = Common::TextInput($dataSP['key_word']);
            if (count(explode(',', $model['key_word'])) == 0) {
                new Error(Error::danger, "Vui Lòng Nhập Lại SEO");
                Common::ToUrl('SanPham/index/post');
            }
            $model['des'] = Common::TextInput($dataSP['des']);

            //  add thêm product_id vao trang thai



            $sp = new sanpham();
            $checkSP = $sp->GetById($model['id']);
            // print_r($model);
            // print_r($_POST);
            if ($checkSP) {
                // thêm loại chung trc ok
                // thêm loại chi tiết ok
                // thêm sản phẩm loại wait

            } else {
                if ($sp->Post($model)) {
                    // $category_detail = new categoryDetail();
                    // if (isset($dataSP['categorychitiet']) && $dataSP['categorychitiet']) {
                    //     $modelcatettct = [];
                    //     $dataProdcutCategoryId = [];
                    //     foreach ($dataSP['categorychitiet'] as $key => $val) {
                    //         $modelcatettct['id'] = Common::uuid();
                    //         $modelcatettct['category_id'] = $dataCategoryUpdate[$key];
                    //         $modelcatettct['name'] = $val;
                    //         $category_detail->Post($modelcatettct);
                    //         array_push($dataProdcutCategoryId, $modelcatettct['id']);
                    //     }
                    // if(isset($dataSP['productCategoryId']) && !empty($dataSP['productCategoryId'])){
                    //     $product_category = new productCategoryDetail();
                    //         foreach ($dataSP['productCategoryId'] as $val) {
                    //             $dataProdcutCategory['id'] = Common::uuid();
                    //             $dataProdcutCategory['category_id'] = $val;
                    //             $dataProdcutCategory['product_id'] = $model['id'];
                    //             $product_category->Post($dataProdcutCategory);
                    //         }
                    // }

                    // }
                    // theem vao product category chi tiet



                    // end Category
                    if (isset($dataSP['trangThaiParentChiTiet']) && $dataSP['trangThaiParentChiTiet']) {
                        $trangthai = new trangthai();
                        // có thêm mới 
                        // lấy id update id product
                        $dataTrangThaiUpdate = [];
                        foreach ($dataSP['trangThaiParentChiTiet'] as $key => $val) {
                            $dataTrangThaiUpdate[$key] = $trangthai->GetById($val)->id;
                        }
                    };
                    $trangthaichitiet = new trangthaichitiet();
                    if (isset($dataSP['trangthaichitiet']) && $dataSP['trangthaichitiet']) {
                        $modelttct = [];
                        foreach ($dataSP['trangthaichitiet'] as $key => $val) {
                            $modelttct['id'] = Common::uuid();
                            $modelttct['trang_thai_id'] = $dataTrangThaiUpdate[$key];
                            $modelttct['product_id'] = $model['id'];
                            $modelttct['name'] = $val;
                            $trangthaichitiet->Post($modelttct);
                        }
                    }

                    // Toping
                    if (isset($dataSP['topingData']) && $dataSP['topingData']) {
                        $toping = new Toping();
                        $dataTopingUpdate = [];
                        foreach ($dataSP['topingData'] as $val) {
                            $dataTopingId['id'] = $val;
                            $dataTopingUpdate['product_id'] = $model['id'];
                            $toping->Put($dataTopingUpdate, $dataTopingId);
                        }
                    }
                }
            }
        } else {
        }
        $trangthai = new trangthai();
        $trangthai->CleanCategory();
        $toping = new Toping();
        $toping->CleanToping();
        unset($_POST);
        unset($dataSP);
        $this->View();
    }



    function put()
    {
        if (isset($_GET["id"])) {
            $id = Request::Get('id', null);
            if (isset($_POST['Luu'])) {
                $dataSP = Request::Post('sanpham', null);
                $model = [];
                $ttct = [];
                $model['id'] = Common::TextInput($dataSP['id']);
                $model['name'] =  Common::TextInput($dataSP['name']);
                $model['create_at'] = date("Y-m-d", time());
                $model['view'] = $dataSP['view'];
                $model['is_show'] = $dataSP['is_show'];
                $model['price'] = Common::TextInput($dataSP['price']);
                // if (!is_numeric($model['price'])) {
                //     new Error(Error::danger, 'Vui Lòng Nhập Giá Trị Là Số');
                //     Common::ToUrl('SanPham/index/post');
                // }
                $model['sale_off'] = Common::TextInput($dataSP['sale_off']);
                // if (!is_numeric($model['sale_off'])) {
                //     new Error(Error::danger, 'Vui Lòng Nhập Giá Trị Là Số');
                //     Common::ToUrl('SanPham/index/post');
                // }
                $model['code'] = Common::TextInput($dataSP['code']);
                if ($_FILES['image']['size'] > 0) {
                    $handleImage = new HandleImage();
                    $model['image'] = $handleImage->handleImage($_FILES['image']);
                }
                $model['key_word'] = Common::TextInput($dataSP['key_word']);
                if (count(explode(',', $model['key_word'])) == 0) {
                    new Error(Error::danger, "Vui Lòng Nhập Lại SEO");
                    Common::ToUrl('SanPham/index/post');
                }
                $model['des'] = Common::TextInput($dataSP['des']);

                //  add thêm product_id vao trang thai



                $sp = new sanpham();
                $checkSP = $sp->GetById($model['id']);
                // print_r($model);
                // print_r($_POST);
                if ($checkSP) {

                    $dataProdcutCategory = [];
                    if (isset($dataSP['productCategoryId']) && !empty($dataSP['productCategoryId'])) {
                        $product_category = new productCategoryDetail();
                        foreach ($dataSP['productCategoryId'] as $val) {
                            $checkProductCategoryDetail = $product_category->GetByProductIdAndCategory($model['id'], $val);
                            if (isset($checkProductCategoryDetail) && !empty($checkProductCategoryDetail)) {
                                continue;
                            }
                            $dataProdcutCategory['id'] = Common::uuid();
                            $dataProdcutCategory['category_id'] = $val;
                            $dataProdcutCategory['product_id'] = $model['id'];
                            $product_category->Post($dataProdcutCategory);
                            // unset($dataProdcutCategory);
                        }
                    }


                    // end Category


                    if (isset($dataSP['trangThaiParentChiTiet']) && $dataSP['trangThaiParentChiTiet']) {
                        $trangthai = new trangthai();
                        // có thêm mới 
                        // lấy id update id product
                        $dataTrangThaiUpdate = [];
                        foreach ($dataSP['trangThaiParentChiTiet'] as $key => $val) {
                            $checkTrangThaiParent = $trangthai->GetById($val);
                            $dataTrangThaiUpdate[$key] = $checkTrangThaiParent->id;
                        }
                    };
                    $trangthaichitiet = new trangthaichitiet();
                    if (isset($dataSP['trangthaichitiet']) && $dataSP['trangthaichitiet']) {
                        $modelttct = [];
                        foreach ($dataSP['trangthaichitiet'] as $key => $val) {
                            $checkTTCT = $trangthaichitiet->GetByNameAndProductId($val, $model['id']);
                            if ($checkTTCT) {
                                continue;
                            } else {
                                $modelttct['id'] = Common::uuid();
                                $modelttct['trang_thai_id'] = $dataTrangThaiUpdate[$key];
                                $modelttct['product_id'] = $model['id'];
                                $modelttct['name'] = $val;
                                $trangthaichitiet->Post($modelttct);
                            }
                        }
                    }

                    // end Trang Thai
                    if (isset($dataSP['topingName']) && $dataSP['topingName']) {
                        $toping = new Toping();
                        $dataToping = [];
                        foreach ($dataSP['topingName'] as $val) {
                            $checkToping = $toping->GetByProductIdAndName($model['id'], $val);
                            if ($checkToping) {
                                continue;
                            }
                            $dataToping['id'] = Common::uuid();
                            $dataToping['name'] = Common::TextInput($val);
                            $dataToping['product_id'] = $model['id'];
                            $toping->Post($dataToping);
                        }
                    }
                    $datawhere['id'] = $model['id'];
                    $sp = new sanpham();
                    $sp->Put($model, $datawhere);
                } else {
                }
            }
            unset($_POST);
            unset($dataSP);
            //  cần category by product
            // cần toping by product
            // Trạng thái by product_id
            // từ con lấy ra cha




            // lay du lieu
            $toping = new Toping();
            $dataToping = $toping->GetByProductId($id);
            $product_category = new productCategoryDetail();
            $dataProductCategoryDetail = $product_category->GetByProductId($id);
            $tt = new trangthai();
            $datatt = $tt->GetByProductId($id);
            $sp = new sanpham();
            $dataSanPham = $sp->GetById($id);
            $data['dataSanPham'] = $dataSanPham;
            $data['dataToping'] = $dataToping;
            $data['dataProductCategoryDetail'] = $dataProductCategoryDetail;
            $data['datatt'] = $datatt;
            $this->View($data);
        }
    }

    function delete()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = Common::TextInput($_GET["id"]);
            $sp = new sanpham();
            $model = $sp->GetById($id);
            $model->is_show = '-1';
            $model = Common::ChangeObjectToArray($model);
            $sp->Put($model, ['id' => $id]);
            Common::ToUrl('SanPham');
        }
    }
    function trash()
    {
        try {
            $sanpham = new sanpham();
            $params["keyword"] = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
            $indexPage = isset($_POST["indexPage"]) ? intval($_POST["indexPage"]) : 1;
            $indexPage = max(1, $indexPage);
            $pageNumber = isset($_POST["pageNumber"]) ? intval($_POST["pageNumber"]) : 10;
            $pageNumber = max(1, $pageNumber);
            $total = 0;
            $dataSanPham = $sanpham->GetItems($params, $indexPage, $pageNumber, $total);
            $data["dataSanPham"] = $dataSanPham;
            $data["indexPage"] = $indexPage;
            $data["pageNumber"] = $pageNumber;
            $data["params"] = $params;
            $data["total"] = $total;
            $this->View($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function Restore()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = Common::TextInput($_GET['id']);
            $sp = new sanpham();
            $model = $sp->GetById($id);
            $model->is_show = 0;
            $model = Common::ChangeObjectToArray($model);
            if ($sp->put($model, ['id' => $id])) {
                Common::ToUrl('SanPham');
            }
        }
        # code...
    }
}
