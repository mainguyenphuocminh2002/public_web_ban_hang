<?php 
    namespace Model;
    class FormSetName {
        static $properties = ["class" => "form-control"];
        public function __construct()
        {
            # code...
        }
        public static function SetName($formName,$elementname) {
            return $formName . "[{$elementname}]";
        }
    }

?>