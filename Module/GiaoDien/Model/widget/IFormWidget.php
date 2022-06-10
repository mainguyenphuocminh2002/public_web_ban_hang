<?php

namespace Module\GiaoDien\Model\Widget;

interface IFormWidget
{
    
    public static function id($val = null);

    public static function name($val = null);

    public static function des($val = null);

    public static function link($val = null);

    public static function group_id($val = null);

    public static function image($val = null);

    public static function stt($val = null);

}
