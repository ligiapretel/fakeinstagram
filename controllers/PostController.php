<?php

include_once("models/Post.php");

class PostController{

    public function acao($rotas){
        switch($rotas){
            case "posts":
                // $this->viewPosts();
                $this->listarPosts();
            break;
            // Dentro do case é o que o usuário digitar na url
            case "formulario-post":
                // Executando a função que exibe o formulário
                $this->viewFormularioPost();
            break;
            case "cadastrar-post":
                $this->cadastrarPost();
            break;
        }
    }

    // Criando uma função que exibe o formulário    
    private function viewFormularioPost(){
        include('views/newPost.php');
    } 

    private function viewPosts(){
        include('views/posts.php');
    }

    private function cadastrarPost(){
        $descricao = $_POST['descricao'];
        $nomeArquivo = $_FILES['img']['name'];
        $linkTemp = $_FILES['img']['tmp_name'];
        $caminhoImagem = "views/img/$nomeArquivo";
        
        move_uploaded_file($linkTemp, $caminhoImagem);
        // Posso criar esse objeto logo no início da função. O importante é criá-lo antes de criar fazer a função com ele.
        session_start();
        $idUsuarioLogado = $_SESSION["idUsuarioLogado"];

        $post = new Post();
        $resultado = $post->criarPost($descricao,$caminhoImagem,$idUsuarioLogado);

        // Verificando se o resultado é verdadeiro
        if($resultado){
            // Redirecionando o usuário para a página posts somente se der certo o cadastro do post. Estamos usando rotas no caminho do location, por isso não preciso digitar views no caminho.
            header('Location:/fakeinstagram/posts');
        }else{
            echo "Cadastro não deu certo";
        }

    }

    private function listarPosts(){
        $post = new Post();
        $listaPosts = $post->listarPosts();
        $_REQUEST['posts'] = $listaPosts;
        $this->viewPosts();
    }

}

?>