<?php

namespace Module\GiaoDien\Model\Widget;

use Model\FormRender;
use Model\FormSetName;
use PFBC\Element;

class FormWidget extends FormSetName implements IFormWidget
{
    static $formName = 'widget';

    public function __construct()
    {
        # code...
    }

    public static function id($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Hidden($name,$val));
        throw new \Exception("Method not implemented");
    }
    
    public static function name($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Tên Widget",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function group_id($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Nhóm",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function image($val =null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['id'] = __FUNCTION__;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("HÌnh Ảnh",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    

    public static function des($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['id'] = "editor";
        $properties['class'] = "editorContent";
        return new FormRender(new Element\Textarea("Mô Tả <span style='color:red'>(Không Quá 50 Kí Tự)</span>",$name,$properties));
    }
    
    public static function link($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Đường Dẫn",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function stt($val = null)
    {
        $name = self::setName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Thứ Tự", $name, $properties));
        throw new \Exception("Method not implemented");
    }
        
        
}
