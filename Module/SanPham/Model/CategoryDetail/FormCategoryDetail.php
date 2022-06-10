<?php

namespace Module\SanPham\Model\CategoryDetail;

use Model\Common;
use PFBC\Element;
use Model\FormRender;
use Model\FormSetName;
use Module\SanPham\Model\Category;

class FormCategoryDetail extends FormSetName implements IFormCategoryDetail
{
    
    static $formName = "category_detail";

    public function __construct()
    {
        # code...
    }
    public function id ($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Hidden($name,$val));
        throw new \Exception("Method not implemented");
    }
    
    public function category_id ($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = self::SetName(self::$formName,__FUNCTION__);
        $options = [""=>"Trống"] + Common::ChangeObjectToArray(Category::GetDataToSelect());
        return new FormRender(new Element\Select("Loại Cấp Cha",$name,$options,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public function name ($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox("Tên Loại", $name, $properties));
        throw new \Exception("Method not implemented");
    }
    
    public function des ($val = null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = self::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textarea('Mô Tả Loại',$name,$properties));
        throw new \Exception("Method not implemented");
    }
        
}
