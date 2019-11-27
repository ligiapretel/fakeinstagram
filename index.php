<?php

$rotas = key($_GET)?key($_GET):"posts";

switch($rotas){
    case "posts":
        include('controllers/PostController.php');
        // Criando um objeto
        $controller = new PostController();
        $controller->acao($rotas);
    break;
    case "formulario-post":
        include('controllers/PostController.php');
        $controller = new PostController();
        $controller->acao($rotas);
    break;
    case "cadastrar-post":
        include('controllers/PostController.php');
        $controller = new PostController();
        $controller->acao($rotas);
    break;
    case "formulario-usuario":
        include('controllers/UserController.php');
        // Criando objeto UserController
        $controller = new UserController();
        $controller->acao($rotas);
    break;
    case "cadastrar-usuario":
        include('controllers/UserController.php');
        // Criando objeto UserController
        $controller = new UserController();
        $controller->acao($rotas);
    break;
    case "login":
        include('controllers/LoginController.php');
        // Criando objeto LoginController
        $controller = new LoginController();
        $controller->acao($rotas);
    break;
    case "autenticar-login":
        include('controllers/LoginController.php');
        // Criando objeto LoginController
        $controller = new LoginController();
        $controller->acao($rotas);
    break;
    case "logout":
        include('controllers/LoginController.php');
        // Criando objeto LoginController
        $controller = new LoginController();
        $controller->acao($rotas);
    break;
}


?>