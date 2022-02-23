

<?php
function autoload($class)
{
    $paths = [
        "app/controller",
        "app/models"
    ];
    foreach ($paths as $path) {
        $classPath = "$path/$class.php";

        if (file_exists($classPath)) {
            require_once $classPath;
            break;
        }
    }
}

spl_autoload_register("autoload");


// echo $_GET['p'];
$params = explode("/", $_GET['p']);
// print_r($params);
if (isset($params[0]) && !empty($params[0])) {
    $controller = ucfirst($params[0]) . "Controller";
    $controllerPath = "app/controller/$controller.php";
    $viewPath = "public/views/" . $params[0] . ".php";


    if (file_exists($controllerPath)) {
        $obj = new $controller();
        if (isset($params[1]) && !empty($params[1])) {
            $action = $params[1];
            if (method_exists($obj, $action)) {
                if (isset($params[2]) && !empty($params[2])) {
                    $obj->$action($params[2]);
                } else {
                    $obj->$action();
                }
            } else {
                echo "page not found";
                exit();
            }
        } else {
            $action = "index";
            $obj->$action();
        }
    } else if (file_exists($viewPath)) {
        echo require_once $viewPath;
    } else {
        echo "page not found";
    }
} else {
    $controller = new HomeController();
    $controller->index();
}
