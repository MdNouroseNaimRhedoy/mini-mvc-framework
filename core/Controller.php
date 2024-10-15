<?php
namespace Core;
class Controller{
    public function render($view,$data = []){
        extract($data);
        include "Views/$view.php";

    }
}