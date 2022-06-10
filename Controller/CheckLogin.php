<?php
namespace Controller;
use Model\Common;
class CheckLogin extends \Application{
    /**
     * kiểm tra dăng nhap
     * @param {type} parameter
 */
    public function __construct() {
        $_SESSION[QuanLy] = isset($_SESSION[QuanLy]) ? $_SESSION[QuanLy] : null;
        /**
         * chưa đăng nhap
         * @param {type} parameter
         */
//        var_dump($_SESSION[QuanLy]);
        self::$_Theme = "backend"; 
        // print_r(self::$_Theme);
        if ($_SESSION[QuanLy] == null) {
            /**
             * chuyển qua trang dăng nhap
             * @param {type} parameter
             */
            Common::ToUrl(LoginPage);
            // 
        }
        /**
         * đang nhap thanh cong
         * @param {type} parameter
         */ 
    }

    function index() { 
        $this->View();
    }

    function logout() {

        $_SESSION[QuanLy] = null;
        Common::ToUrl(LoginPage);
    }

}
