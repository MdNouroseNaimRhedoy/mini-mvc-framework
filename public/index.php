<?php
namespace Public;

require_once __DIR__ .'/../core/Router.php';
require_once __DIR__ . '/../app/controllers/PostController.php';


use Core\Router;
use App\Controllers\PostController;


echo "Mini MVC FrameWork";


$router = new Router();

$router->get('/post',[PostController::class],'index');