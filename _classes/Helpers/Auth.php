<?php

namespace Helpers;

class Auth{
    static $loginUrl = '/online_library_mgmt_system/home.php';

    static function admin(){
        session_start();
        if(isset($_SESSION['admin'])){
            return $_SESSION['admin'];
        }
        else{
            header("location: ".static::$loginUrl);
            exit();
        }
    }
    
    static function student(){
        session_start();
        if(isset($_SESSION['students'])){  
            return $_SESSION['students'];
        }
        else{
            header("location: ".static::$loginUrl);
            exit();
        }
    }
}