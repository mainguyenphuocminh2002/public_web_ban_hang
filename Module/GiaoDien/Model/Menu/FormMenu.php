<?php

namespace Module\GiaoDien\Model\Menu;

use Model\Common;
use PFBC\Element;
use Model\FormRender;
use Model\FormSetName;

class FormMenu extends FormSetName implements IFormMenu
{
    static $formName = 'menu';
    public function __construct()
    {
        # code...
    }

    public static function id ($val=null)
    {
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Hidden($name,$val));
        throw new \Exception("Method not implemented");
    }
    
    public static function name ($val=null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox('Tên',$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function link ($val=null)
    {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Required] = "true";
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        return new FormRender(new Element\Textbox('Đường Dẫn',$name,$properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function parent_id ($val=null)
    {
        $properties = self::$properties;
        $properties["value"] = $val; 
        $options = menu::GetDataToSelect();
        $name = FormSetName::SetName(self::$formName,__FUNCTION__);
        $options = ["" => "Là Cấp Cha"] + Common::ChangeObjectToArray($options);
        return new FormRender(new Element\Select("Cấp Cha", $name,$options, $properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function icon ($val=null)
    {
        $name = self::SetName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("icon", $name, $properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function group_id ($val=null)
    {
        $name = self::setName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Nhóm", $name, $properties));
        throw new \Exception("Method not implemented");
    }
    
    public static function stt ($val=null)
    {
        $name = self::setName(self::$formName,__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        return new FormRender(new Element\Textbox("Thứ Tự", $name, $properties));
        throw new \Exception("Method not implemented");
    }
        
}
