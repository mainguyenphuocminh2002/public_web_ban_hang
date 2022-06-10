<?php

namespace Controller ;

use Model\Permission;
use Model\User;

class Backend extends \Application
{
    public function __construct()
    {
        # code...
        self::$_Theme = "backend";
        new CheckLogin();
        Permission::Check([User::Admin,User::QuanLy]);
    }
    public function index()
    {
        # code...
        $this->View();
    }
}
