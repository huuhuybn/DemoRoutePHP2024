<html>
<head>
    <title>Welcome to my Website!!! - ASM 2024</title>
</head>

<body>
<a href="/DemoRoute2024/index.php">Home</a>
<a href="/DemoRoute2024/index.php?news">News</a>
<a href="/DemoRoute2024/index.php?showFormLogin">Login Form</a>
<a href="/DemoRoute2024/index.php?showFormRegister">Register Form</a>
<?php
// HOME : Trang chu
require './vendor/autoload.php';
use Huuhuy\Demo\controllers\Router;
use Huuhuy\Demo\controllers\StudentController;
$router = new Router();
$router->get('/DemoRoute2024/index.php/student',
    [new StudentController(),'index']);
$router->get('/DemoRoute2024/index.php?showFormLogin',
    [new StudentController(),'showFormLogin']);
$router->get('/DemoRoute2024/index.php?showFormRegister',
    [new StudentController(),'showFormRegister']);

$router->post('/DemoRoute2024/index.php?login',
    [new StudentController(),'login']);

$router->post('/DemoRoute2024/index.php?register',
    [new StudentController(),'register']);

$router->get('/DemoRoute2024/index.php',function (){
    echo 'Welcome HomePAGE' . '<br>';
});

$router->get('/Demo/index.php?url=home',function (){
    echo 'Welcome Home' . '<br>';
});

$router->get('/DemoRoute2024/index.php?news', function (){
    echo 'Welcome News Page' . '<br>';
});
// thêm router điều hướng kiểu request GET hoặc POST
// xây dựng form upload file
// xây dựng tính năng LOGIN, Register - $_SESSION
// xây dựng class Database trong mô hình MVC

// lấy ra function index trong StudentController và truyền vào route !!!
// datetime php
// hàm + - , tính toán, so sánh với thời gian
// các loại format datetime trong php
//  học cách, xây dựng Route trong php -
// điều hướng website trong php

// gọi trong file index để điều hướng request
// lấy ra địa chỉ gửi lên từ trình duyệt
//  $_SERVER - super global
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
//var_dump($_SERVER);
// .htacess
echo $url . '<br>';
$router->getRoute($url,$method);





?>


</body>

</html>
