<?php

namespace Module\GiaoDien\Model\Slider ;

use Model\Common;
use Model\FormRender;
use PFBC\Element;
use Model\FormSetName;
class FormSlider extends FormSetName implements iFormSlider
{
    static $formName = 'slider';
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
        $properties=self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Tên Slider",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function content($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties=self::$properties;
        $properties['class'] = "editor";
        $properties['id'] = "editorContent";
        $properties['value'] = $val;
        return new FormRender(new Element\Textarea("Nội Dung Slider",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function image($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties=self::$properties;
        $properties['value'] = $val;
        $properties['id'] = __FUNCTION__;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Hình Ảnh",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function group_id($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties=self::$properties;
        $properties['value'] = $val;
        return new FormRender(new Element\Textbox("GroupId",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function is_public($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties=self::$properties;
        $properties['value'] = $val;
        $options = [1 => "Hiện", 0 => "Ẩn"];
        return new FormRender(new Element\Select("Ẩn\Hiện",$name,$options,$properties));
        throw new \Exception("Method not implemented");
    }
        
}
