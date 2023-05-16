<?php
namespace Helpers;
class HTTP
{
 static $base = "http://127.0.0.1/online_library_mgmt_system/";
 static function redirect($path, $query = "")
 {
 $url = static::$base . $path;
 if($query) $url .= "?$query";

 header("location: $url");
 exit();
 }
}
