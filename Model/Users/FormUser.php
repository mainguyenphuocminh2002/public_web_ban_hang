<?php

namespace Model\Users;

use PFBC\Element;
use Model\FormRender;

class FormUser implements IFormUsers {

    static $properties = ["class" => "form-control"];
    static $ElementsName = "users";

    public function __construct() {
        
    }

    //put your code here
    public static function active($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";

        return new FormRender(new Element\Select(__FUNCTION__, $name, $options, $properties));
    }

    
    public static function create_at($val = null) {
        
    }

    public static function email($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Email("Email", $name, $properties));
    }

    public static function id($val = null) {
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Hidden($name, $val));
    }

    public static function key_password($val = null) {
        
    }

    public static function username($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tài Khoản", $name, $properties));
    }

    public static function password($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = 'password';
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Password("Mật Khẩu", $name, $properties));
    }

    public static function TokenReset($val = null) {
        
    }

    public static function fullname($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Họ & Tên", $name, $properties));
    }

}
