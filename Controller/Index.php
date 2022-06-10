<?php

namespace Controller;

use Model\Common;
use Model\Request;
use Module\GiaoDien\Model\Pages\pagesService;
use Module\SanPham\Model\Category;
use Module\SanPham\Model\categoryDetail;
use Module\SanPham\Model\productCategoryDetail;
use Module\SanPham\Model\sanpham;

class Index extends \Application
{
    public function __construct()
    {
        self::$_Theme = 'molicha';
        // new CheckLogin();
    }

    public function index()
    {
        $this->view();
    }

    public function loi404()
    {
        self::$_Layout = "loi404";
        $this->View();
    }
    public function pages()
    {

        $pages = new pagesService();
        $alias = \Model\Request::Get("param", "");
        $item = $pages->GetByAlias($alias);
        if ($item == null) {
            \Model\Common::ToUrl("/index/loi404");
        } else {
            self::$_Layout = 'pages';
            switch ($alias) {
                case "sanpham":
                    $categoryDetail = new categoryDetail();
                    $itemDanhMuc = $categoryDetail->GetAllDetail();
                    Common::ToUrl('danhmuc/' . $itemDanhMuc[0]->name . '.html');
            }
        }
        $this->View(['item' => $item]);
    }

    public function productdetail()
    {
        self::$_Layout = "trangchitiet";
        $product = new sanpham();
        $productName = Request::Get('param', '');
        $productData = $product->GetByName($productName);
        $productCategoryDetail = new productCategoryDetail();
        $productDetailCategory = $productCategoryDetail->GetByProductId($productData->id);
        $this->View(['item' => $productData, 'productDetailCategory' => $productDetailCategory]);
        if ($productData) {
        } else {
            $this->loi404();
        }
        # code...
    }

    public function danhmuc()
    {
        self::$_Layout = 'danhmuc';
        $categoryName = \Model\Request::Get("param", "Sữa Tươi");
        if(!empty($categoryName) && isset($categoryName)){
            $categoryDetail = new categoryDetail();
            $categoryData = $categoryDetail->GetByName($categoryName)->id;
            $productCategory = new productCategoryDetail();
            $item = $productCategory->GetByCategoryDetailId($categoryData);
            $category = new Category();
            $menu = $category->GetAllDanhMuc();
            // echo "<pre>";
            // echo "category";
            // var_dump($categoryData);
            // echo "product";
            // var_dump($item);
            // echo "</pre>";
            // die();
            $this->View(['danhMucChiTietItem' => $item, "categoryName" => $categoryName, 'menu'=>$menu]);
        }
    }
}
