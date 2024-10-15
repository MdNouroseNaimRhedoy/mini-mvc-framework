<?php
namespace Core;
class Router{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method){
        $this->routes[$method][$route] = ['controller'=>$controller, 'action'=>$action];
    }

    private function get($route, $controller, $action){
        $this->addRoute($route, $controller, $action, "GET");
    }

    private function post($route, $controller, $action){
        $this->addRoute($route,$controller,$action,"POST");
    }

    private function put($route, $controller, $action){
        $this->addRoute($route,$controller, $action, "PUT");
    }

    public function delete($route, $controller, $action){
        $this->addRoute($route,$controller,$action, "DEL");
    }

    public function dispatch(){
        // ? theke tokenize kore dey.
        $uri = strtok($_SERVER['REQUEST_URI'],'?');
        $method = $_SERVER['REQUEST_METHOD'];

        if(array_key_exists($uri,$this->routes[$method])){

            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        }
        else{
           throw new \Exception('Route not found for this uri: $uri',404) ;
        }
    }



}