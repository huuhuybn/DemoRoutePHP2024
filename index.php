<html>
<head>
    <title>Welcome to my Website!!! - ASM 2024</title>
</head>

<body>

<?php
// HOME : Trang chu
require './vendor/autoload.php';
use Huuhuy\Demo\controllers\Router;
use Huuhuy\Demo\controllers\StudentController;
//echo 'HOME';

$router = new Router();
$router->addRoute('/Demo/index.php',function (){
    echo 'Welcome HomePAGE' . '<br>';
});

$router->addRoute('/Demo/index.php?url=home',function (){
    echo 'Welcome Home' . '<br>';
});


$router->addRoute('/Demo/index.php?url=news', function (){
    echo 'Welcome News Page' . '<br>';
});


// lấy ra function index trong StudentController và truyền vào route !!!
$router->addRoute('/Demo/index.php/student',[new StudentController(),'index']);

// datetime php
// hàm + - , tính toán, so sánh với thời gian
// các loại format datetime trong php
//  học cách, xây dựng Route trong php -
// điều hướng website trong php

// gọi trong file index để điều hướng request
// lấy ra địa chỉ gửi lên từ trình duyệt
//  $_SERVER - super global
$url = $_SERVER['REQUEST_URI'];
//var_dump($_SERVER);
// .htacess
echo $url . '<br>';
$router->getRoute($url);





?>


</body>

</html>
