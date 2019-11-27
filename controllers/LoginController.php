<?php

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
        $password = $_POST['password'];

        // Fazendo objeto acessar a função que autentica o usuário no BD (função criada na camada model)
        $resultado = $login->autenticarUsuario($email,$password);

        // echo "<pre>";
        // print_r($resultado);
        // exit;

        // Verificar se o dado enviado pelo formulário é igual ao dado armazenado no banco
        if($resultado){
            // echo "Login deu certo =)";
            session_start();
            // Criando uma associacao usuarioLogado
            $_SESSION["nomeUsuarioLogado"] = [$resultado[0]["nome_usuario"]];
            // Criando uma associação para o id do usuário
            $_SESSION["idUsuarioLogado"] = [$resultado[0]["id"]];
            // echo "<pre>";
            // print_r($_SESSION["idUsuarioLogado"]);
            // exit;
            header('Location:/fakeinstagram/posts');
            }else{
            echo "E-mail ou senha invalidos =(";
            }
    }

    private function logout(){
        // Criando objeto login
        // $login = new Login();
        session_start();
        // Para o usuário deslogar
        session_destroy();
        // Redirect para o usuário quando deslogar
        header('Location:/fakeinstagram/posts');
    }

}

?>