<?php
namespace Module\SanPham\Model\SanPham;

use Model\Common;
use Model\FormRender;
use Model\FormSetName;
use Module\SanPham\Model\Category;
use Module\SanPham\Model\trangthai;
use PFBC\Element;

class FormSanPham extends FormSetName implements IFormSanPham
{
    static $formName = 'sanpham';
    public function __construct()
    {
    }

    public static function id($val = null)
    {
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Hidden($name, $val));
        throw new \Exception("Method not implemented");
    }

    public static function name($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Tên Sản Phẩm", $name, $properties));
        throw new \Exception("Method not implemented");
    }

    public static function trang_thai($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['id'] = "selectTrangThai";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        $options = [""=>"Trống"] + Common::ChangeObjectToArray(trangthai::GetDataToSelect());
        return new FormRender(new Element\Select("Trạng Thái",$name,$options,$properties));
        throw new \Exception("Method not implemented");
    }

    public static function image($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = __FUNCTION__;
        $properties[FormRender::Readonly] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Hình Sản Phẩm", $name, $properties));
    }

    public static function price($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = number_format($val, 0, ".", ",");
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Giá", $name, $properties));
    }

    public static function code($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Mã Sản Phẩm", $name, $properties));
        throw new \Exception("Method not implemented");
    }

    public static function category_id($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        $options = [""=>"Trống"] + Common::ChangeObjectToArray(Category::GetDataToSelect());
        return new FormRender(new Element\Select("Loại Sản Phẩm",$name,$options,$properties));
        throw new \Exception("Method not implemented");
    }

    public static function des($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['class'] = "editor";
        $properties['id'] = "editorContent";
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textarea("Mô Tả", $name, $properties));
        throw new \Exception("Method not implemented");
    }

    public static function sale_off($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = number_format($val, 0, ".", ",");
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Giá Sale", $name, $properties));
        throw new \Exception("Method not implemented");
    }

    public static function create_at($val = null)
    {
        throw new \Exception("Method not implemented");
    }

    public static function is_show($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        $options = [1 => "Hiện", 0 => "Ẩn"];
        return new FormRender(new Element\Select("Hiển Thị", $name, $options, $properties));
        throw new \Exception("Method not implemented");
    }

    public static function view($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = number_format($val, 0, ".", ",");
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Lượt Xem", $name, $properties));
        throw new \Exception("Method not implemented");
    }

    public static function key_word($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textarea("SEO", $name, $properties));
        throw new \Exception("Method not implemented");
    }

}
