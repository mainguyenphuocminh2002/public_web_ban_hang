<?php

namespace Module\GiaoDien\Model\Menu;

interface IFormMenu
{
    
    public static function id ($val=null);
    
    public static function name ($val=null);
    
    public static function link ($val=null);
    
    public static function parent_id ($val=null);
    
    public static function icon ($val=null);
    
    public static function group_id ($val=null);
    
    public static function stt ($val=null);

}
