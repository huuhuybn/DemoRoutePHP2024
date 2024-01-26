<html>
<head>
    <title>Welcome to my Website!!! - ASM 2024</title>
</head>

<body>
<?php
require './vendor/autoload.php';
use Dotenv\Dotenv;

session_start();
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_SESSION['username'])){
    echo "Xin chao " . $_SESSION['username']. '</br>';
    echo '<a href="/DemoRoute2024/index.php?logout">Logout</a><br>';
}
else echo "Xin Chao Guest !!!" . '<br>';
    ?>
<a href="/DemoRoute2024/index.php">Home</a>
<a href="/DemoRoute2024/index.php?url=news">News</a>
<a href="/DemoRoute2024/index.php?url=showFormLogin">Login Form</a>
<a href="/DemoRoute2024/index.php?url=showFormRegister">Register Form</a>
<?php
// HOME : Trang chu
require './vendor/autoload.php';
use Huuhuy\Demo\controllers\Router;
use Huuhuy\Demo\controllers\StudentController;
$router = new Router();
$router->get('student',
    [new StudentController(),'index']);
$router->get('showFormLogin',
    [new StudentController(),'showFormLogin']);
$router->get('showFormRegister',
    [new StudentController(),'showFormRegister']);
$router->get('logout',
    [new StudentController(),'logout']);
$router->post('login',
    [new StudentController(),'login']);
$router->post('register',
    [new StudentController(),'register']);

$router->get('/',function (){
    if (isset($_GET['error'])){
        echo $_GET['error'];
    }
    echo 'Welcome HomePAGE' . '<br>';
});
$router->get('news', function (){
    echo 'Welcome News Page' . '<br>';
});
if (isset($_GET['url'])){
    $url = $_GET['url'];
}else {
    $url = '/';
}
$method = $_SERVER['REQUEST_METHOD'];

echo $url . '<br>';
$router->getRoute($url,$method);





?>


</body>

</html>
