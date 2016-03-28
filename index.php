<?php



require_once __DIR__ . '/autoload.php';
//require_once __DIR__ . '/controllers/NewsController.php';

echo $path = parse_url($_SERVER ['REQUEST_URI'], PHP_URL_PATH);
$pathParts =explode('/'. $path);

$controller = !empty($pathParts[1]) ? $pathParts[1] : 'News';
$action = !empty($pathParts[2]) ? $pathParts[2] : 'All';


$cntrClassname = $controller . 'Controller';

$ctrl = new $cntrClassname();
$method = 'action' . $action ;
$ctrl->$method();

echo $ctrl . '-->' . $method;die;
