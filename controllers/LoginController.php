<?php

session_start();

include_once("models/Login.php");

class LoginController{

    public function acao($rotas){
        switch($rotas){
            case "login":
                // Executando a função que exibe o formulário
                $this->viewFormularioLogin();
            break;
            case "autenticar-login":
                // Executando a função que exibe o formulário
                $this->autenticarLogin();
            break;
            case "logout":
                // Executando a função que destrói a session
                $this->logout();
            break;
        }
    }

    // Criando uma função que exibe o formulário de login   
    private function viewFormularioLogin(){
        include('views/login.php');
    } 

     // Criando uma função para autenticar o login   
     private function autenticarLogin(){


        // Criando objeto login
        $login = new Login();

        // Recebendo dados passados pelo formulário de login
        $email = $_POST['email'];
        
        // Fazendo objeto acessar a função que autentica o usuário no BD (função criada na camada model)
        $resultado = $login->autenticarUsuario($email);
        
        // Verificando se a senha recebida no formulário é igual a senha cadastrada no BD
        $password = password_verify($_POST['password'],$resultado[0]['senha']);

        // echo "<pre>";
        // print_r($resultado);
        // exit;

        // Se a senha bater, criar sessão para logar usuário
        if($password){  
            // Criando uma associacao para o nome do usuário logado
            $_SESSION["nomeUsuarioLogado"] = [$resultado[0]["nome_usuario"]];
            // Criando uma associação para o id do usuário
            $_SESSION["idUsuarioLogado"] = [$resultado[0]["id"]];
            // echo "<pre>";
            // print_r($_SESSION["idUsuarioLogado"]);
            // exit;
            header('Location:/fakeinstagram/posts');
            }else{
            echo "E-mail ou senha inválidos =(";
            }
    }

    private function logout(){
        // Para o usuário deslogar
        session_destroy();
        // Redirect para o usuário quando deslogar
        header('Location:/fakeinstagram/posts');
    }

}

?>