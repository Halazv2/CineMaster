<?php
// echo $_GET['p'];
$params = explode("/", $_GET['p']);
// print_r($params);

if (isset($params[0]) && !empty($params[0])) {
    $controller = ucfirst($params[0]) . "Controller";
    if (file_exists("app/controller/" . $controller.".php")) {
        require_once "app/controller/". $controller.".php";
        $obj = new $controller();

    } else {
        echo "page not found";
    }
}
