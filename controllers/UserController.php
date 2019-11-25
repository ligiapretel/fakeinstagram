<?php

include_once("models/User.php");

class UserController{

    public function acao($rotas){
        switch($rotas){
            case "cadastrar-usuario":
                // Quando o usuário digita cadastrar-usuario na url, vou direcioná-lo para a função que cadastra o usuário
                $this->criarUsuario();;
            break;
        }
    }

    private function cadastrarUsuario(){
        // Criando objeto user
        $user = new User();
        
        // Recebendo dados passados pelo formulário de cadastro do usuário
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $password = $_POST['password'];
        $nomeArquivo = $_FILES['img-perfil']['name'];
        $linkTemp = $_FILES['img-perfil']['tmp_name'];
        $caminhoImagemPerfil = "views/img/users/$nomeArquivo";
        
        move_uploaded_file($linkTemp, $caminhoImagem);
        
        // Fazendo objeto acessar a função que cadastra o usuário no BD (função criada na camada model)
        $resultado = $user->criarUsuario($email,$nome,$apelido,$password,$caminhoImagemPerfil);

        // Verificando se o resultado é verdadeiro
        if($resultado){
            // Redirecionando o usuário para a página posts somente se der certo o cadastro do post. Estamos usando rotas no caminho do location, por isso não preciso digitar views no caminho.
            echo "Cadastro de usuário deu certo";
        }else{
            echo "Cadastro de usuário não deu certo";
        }

    }

}

?>