<?php

namespace Module\Cart\Controller;

use Controller\CheckLogin;
use Controller\IControllerBE;

class giohang extends \Application implements IControllerBE
{
    public function __construct()
    {
        self::$_Theme = 'molicha';
        new CheckLogin();
        # code...
    }

    function index()
    {
        throw new \Exception("Method not implemented");
    }
    
    function post()
    {
        throw new \Exception("Method not implemented");
    }
    
    function put()
    {
        throw new \Exception("Method not implemented");
    }
    
    function delete()
    {
        throw new \Exception("Method not implemented");
    }
        
}
