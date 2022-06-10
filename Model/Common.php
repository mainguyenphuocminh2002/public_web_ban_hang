<?php
namespace Model;

use Model\Error;
use PHPMailer\PHPMailer\PHPMailer;

class Common{
    public function __construct()
    {
        
    }
    
    public static function ToUrl($url = ''){
        if(isset($url)){
            header('location:' . URL .$url);
            exit();
        }
        header('loaction:'.URL);
        // exit();
    }

    public static function TextInput($text) {
        $text = trim($text);
        $text = addslashes($text);
        $text = htmlspecialchars($text);
        $text = preg_replace('/<[^>]*>/', ' ', $text);

        // ----- remove control characters -----
        $text = str_replace("\r", '', $text);    // --- replace with empty space
        $text = str_replace("\n", ' ', $text);   // --- replace with space
        $text = str_replace("\t", ' ', $text);   // --- replace with space
    
        // ----- remove multiple spaces -----
        $text = trim(preg_replace('/ {2,}/', ' ', $text));    
        return $text;
    }

  

    public static function uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function BoDauTienViet($str) {
        if (!$str)
            return false;

        $str = str_replace(array(',', '<', '>', '&', '{', '}', "[", "]", '*', '?', '/', '+', '@', '%', '"'), array(' '), $str);
        $str = str_replace(array("'"), array(' '), $str);
        while (strpos($str, "  ") > 0) {
            $str = str_replace("  ", " ", $str);
        }
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $str = preg_replace("/($codau)/i", $khongdau, $str);
        }
        $str = strtolower($str);
        $str = trim($str);
        $str = preg_replace('/[^a-zA-Z0-9\ ]/', '', $str);
        $str = str_replace(" ", "-", $str);
        return $str;
    }
    
    public static function ChangeArrayToObject($arr = []){
        $object = new \stdClass();
        foreach($arr as $key => $val){
            $object->$key = $val;
        }
        if(!empty($object)){
            return $object;
        }else{
            throw new \Exception(Error::danger,'Có Lỗi Xảy Ra Trong Khi Chuyển Thành Object');
        };
    }
    public static function ChangeObjectToArray($obj){
        return json_decode(json_encode($obj),true);
    }

    public static function PhanTrang($TongSoDong, $TrangThuBaoNhieu, $SoDong, $LinkPhanTrang) {
        $SoDong = max(1, intval($SoDong));
        $TrangThuBaoNhieu = max(1, intval($TrangThuBaoNhieu));
        $SoTrang = ceil($TongSoDong / $SoDong);
        $SoTrang = max(0, $SoTrang);
        $TrangTrai = $TrangThuBaoNhieu - 1;
        $TrangTrai = max(1, $TrangTrai);
        $TrangPhai = $TrangThuBaoNhieu + 1;
        $TrangPhai = min($TrangPhai, $SoTrang);
        $TrangMin = $TrangThuBaoNhieu - 3;
        $TrangMin = $TrangThuBaoNhieu - 3;
        $TrangMin = max(1, $TrangMin);
        $TrangMax = $TrangThuBaoNhieu + 3;
        $TrangMax = min($TrangMax, $SoTrang);
        $TrangTraiCham = $TrangThuBaoNhieu - 7;
        $TrangTraiCham = max(1, $TrangTraiCham);
        $TrangPhaiCham = $TrangThuBaoNhieu + 7;
        $TrangPhaiCham = min($TrangPhaiCham, $SoTrang);

        $_linkTrangDau = str_replace("[i]", 1, $LinkPhanTrang);
        $_linkTrangTrai = str_replace("[i]", $TrangTrai, $LinkPhanTrang);
        $_linkTrangCuoi = str_replace("[i]", $SoTrang, $LinkPhanTrang);
        $_linkTrangPhai = str_replace("[i]", $TrangPhai, $LinkPhanTrang);
        // $_linkTrangTraiCham = str_replace("[i]", $TrangTraiCham, $LinkPhanTrang);
        // $_linkTrangPhaiCham = str_replace("[i]", $TrangPhaiCham, $LinkPhanTrang);


        ob_start();
        ?> 
        <ul style="color: #fff;" class="pagination pagination-md no-margin">
            <li><a href="<?php echo $_linkTrangDau ?>"><i class="fa fa-angle-double-left" ></i></a></li>
            <li><a href="<?php echo $_linkTrangTrai ?>"><i class="fa fa-angle-left" ></i></a></li>
            <!-- <li><a href="<?#php# echo $_linkTrangTraiCham ?>">..</a></li> -->
            <?php
            for ($index = $TrangMin; $index <= $TrangMax; $index++) {
                $_link = str_replace("[i]", $index, $LinkPhanTrang);
                ?> 
                <li class="<?php echo $TrangThuBaoNhieu == $index ? 'active' : ''; ?>" >
                    <a style="border-radius: 50%;
                              padding: 0.2rem 0.4rem;
                              margin: 0 0.4rem;
                              color:#000"   
                    href="<?php echo $_link; ?>"><?php echo $index; ?></a>
                </li>
                <?php
            }
            ?> 
            <!-- <li><a href="<?#php# echo $_linkTrangPhaiCham ?>">..</a></li> -->
            <li><a href="<?php echo $_linkTrangPhai ?>"><i class="fa fa-angle-right" ></i></a></li>
            <li><a href="<?php echo $_linkTrangCuoi ?>"><i class="fa fa-angle-double-right" ></i></a></li>
        </ul>
        <?php
        $str = ob_get_clean();
        return $str;
    }

    public static function HTMLdecode(string $content)
    {
        return htmlspecialchars_decode($content);
    }

    public static function PriceToVnd($price)
    {
        return number_format($price, 0, ".", ",");
        # code...
    }

    public static function GetDate()
    {
        return date('Y-m-d',time());
        # code...
    }

    
}