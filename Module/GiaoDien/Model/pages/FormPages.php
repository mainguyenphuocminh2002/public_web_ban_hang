<?php

namespace Module\GiaoDien\Model\Pages;

use PFBC\Element;
use Model\FormRender;
use Model\FormSetName;

class FormPages extends FormSetName implements IFormPages
{
    public static $formName = 'pages';
    
    public function __construct()
    {
        # code...
    }
    public static function id ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Hidden($name,$val));
        throw new \Exception("Method not implemented");
    }
    
    public static function name ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = 'true';
        return new FormRender(new Element\Textbox("Tên",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function images ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['id'] = __FUNCTION__;
        $properties[FormRender::Required] = "true";
        $properties[FormRender::Readonly] = "true";
        return new FormRender(new Element\Textbox("Hình Ảnh",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function content ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = 'true';
        $properties['id'] = 'editorContent';
        $properties['class'] = "editorContent";
        return new FormRender(new Element\Textarea("Nội Dung",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function key_word ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['id'] = 'editor';
        $properties['class'] = "editor";
        $properties[FormRender::Required] = 'true';
        return new FormRender(new Element\Textarea("SEO",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function title ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = 'true';
        return new FormRender(new Element\Textbox("Tiêu Đề",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function alias ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = 'true';
        return new FormRender(new Element\Textbox("Tên Ngắn",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function des ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = 'true';
        return new FormRender(new Element\Textbox("Mô Tả",$name,$properties));
        throw new \Exception("Method not implemented");
    }
        
}
