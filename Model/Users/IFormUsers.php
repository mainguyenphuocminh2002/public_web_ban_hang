<?php

namespace Model\Users;

interface IFormUsers {

    public static function id ($val = null);
    
    public static function fullname ($val = null);
    
    public static function username ($val = null);
    
    public static function password ($val = null);
    
    public static function key_password ($val = null);
    
    public static function email ($val = null);
    
    public static function create_at ($val = null);
    
}