<?php

namespace Module\GiaoDien\Model\Branch ;

use Model\FormRender;
use Model\FormSetName;
use PFBC\Element;

class FormBranch extends FormSetName implements IFormBranch
{
    static $formName = 'branch';

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
        return new FormRender(new Element\Textbox("Tên Cơ Sở",$name,$properties));
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
    
    public static function address($val = null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Địa Chỉ",$name,$properties));
        throw new \Exception("Method not implemented");
    }
    

    public static function image($val =null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['id'] = __FUNCTION__;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Địa Chỉ",$name,$properties));
        throw new \Exception("Method not implemented");
    }
        
}
