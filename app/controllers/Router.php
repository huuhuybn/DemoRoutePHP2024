<?php

namespace Huuhuy\Demo\controllers;

class Router
{
    // 1 mảng chứa địa chỉ và action (handle)
    public $routes = [];

    // hàm để thêm route vào trong dự án
    public function addRoute($url,$handle,$method){
        $this->routes[$url][$method] = $handle;
    }

    public function get($url,$handle){
        $this->addRoute($url,$handle,"GET");
    }
    public function post($url,$handle){
        $this->addRoute($url,$handle,"POST");
    }

    public function getRoute($url,$method){
        if (isset($this->routes[$url][$method])){
            $handle = $this->routes[$url][$method];
            // thuc thi function handle
            if (is_callable($handle)){
                $handle();
            }else echo '404 Not Found Function';
        }else {
            echo '404 Not Found';
        }

    }
}