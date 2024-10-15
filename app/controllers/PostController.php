<?php
namespace App\Controllers;

use Core\Controller;

class PostController extends Controller{
    public function index(){
        $this->render('index',$data = []);
    }
}