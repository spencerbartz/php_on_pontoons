<?php
    define("SLASH", DIRECTORY_SEPARATOR);
    define("CONTROLLER_DIR", dirname( __FILE__ ) . SLASH . 'controller' . SLASH);
    define("UTIL_DIR", dirname(__FILE__) . SLASH . "util" . SLASH);
    define("IMG_DIR", dirname(__FILE__) . SLASH . "img" . SLASH);
    include "util/string_util.php";
	include "util/path_util.php";
	include "util/dbconnect.php";
    include "util/util.php";
    include "router/routes.php";
?>