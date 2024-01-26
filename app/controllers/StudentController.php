<?php

namespace Huuhuy\Demo\controllers;

use Huuhuy\Demo\config\Database;
use Huuhuy\Demo\models\Student;

class StudentController
{
    // viết và xử lý logic liên quan Student
    function index()
    {
        echo 'Welcome index Student Controller' . '<br>';
    }

    function edit()
    {

    }

    function delete()
    {

    }

    function show()
    {

    }

    function showFormLogin()
    {
        echo '<form method="post" action="/DemoRoute2024/index.php?url=login" 
enctype="multipart/form-data">
         <input name="username" placeholder="Nhap Username...">
         <input name="password" placeholder="Nhap Password...">
         <button type="submit">Login</button>
</form>';
        if (isset($_GET['error'])) {
            echo urldecode($_GET['error']);
        }
    }

    function showFormRegister()
    {
        echo 'Form Register';
        //include './views/Register.php';
        echo '<form action="/DemoRoute2024/index.php?url=register" 
method="post"
      enctype="multipart/form-data">
    <input name="username" placeholder="Nhap username">
    <input name="password" placeholder="Nhap password">
    <input type="file" name="avatar">
    <button type="submit">Register</button>
</form>';
    }

    function register()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $student = new Student();
            $ketqua = $student->register($username, $password);
            if (isset($ketqua)) {
                echo 'Thanh cong';
            } else {
                echo 'Dang ki that bai';
            }
        } else {
            echo "Vui long nhap day du username, password";
        }
    }

    function login()
    {
        if (isset($_POST['username']) & empty($_POST['username'])) {
            $message = urlencode("Vui lòng nhập username hoặc password");
            header('Location: /DemoRoute2024/index.php?url=showFormLogin&error=' . $message);
            exit();
        }
        if (isset($_POST['password']) & empty($_POST['password'])) {
            $message = urlencode("Vui lòng nhập username hoặc password");
            header('Location: /DemoRoute2024/index.php?url=showFormLogin&error=' . $message);
            exit();
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $student = new Student();
            $ketqua = $student->login($username, $password);
            if (isset($ketqua)) {
                // luu lai thong tin
                $_SESSION['username'] = $username;
                echo 'Dang nhap Thanh cong';
                header('Location:index.php');
            } else {
                echo 'Dang nhap that bai';
            }
        } else {
            $message = utf8_encode("Vui lòng nhập userame hoặv password");
            header('Location: /DemoRoute2024/index.php?url=showFormLogin&error=' . $message);
        }
    }

    function logout()
    {
        session_unset();
        session_destroy();
//        // điều hướng về file index để tải lại trang
        header('Location:index.php');
    }

}