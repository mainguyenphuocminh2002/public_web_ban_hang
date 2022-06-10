<?php

namespace Model;

class Permission {

    public function __construct() {
        
    }

    public static function Check($param0, $param1=[]) {
        $kt = User::CurrentUser()->CheckPremision($param0, $param1);
        /**
         * không có quyền
         * @param {type} parameter
         */

        //  check trả về trang 404
        if ($kt == false) {
            Common::ToUrl('index/loi404');
        }
    }
    public static function CheckPremision($param0, $param1=[]) {
        if(!is_array($param0)){
            $param0 = [$param0];
        }
        // check trả về true false
        return User::CurrentUser()->CheckPremision($param0, $param1); 
    }

}
