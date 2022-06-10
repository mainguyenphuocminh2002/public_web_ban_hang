<?php
namespace Module\SanPham\Model\SanPham;
interface IFormSanPham{
public static function id ($val = null);

public static function name ($val = null);

public static function trang_thai ($val = null);

public static function image ($val = null);

public static function price ($val = null);

public static function code ($val = null);

public static function category_id ($val = null);

public static function des ($val = null);

public static function sale_off ($val = null);

public static function create_at ($val = null);

public static function is_show ($val = null);

public static function view ($val = null);

public static function key_word ($val = null);
}