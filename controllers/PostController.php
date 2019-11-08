<?php

include_once("models/Post.php");

class PostController{

    public function acao($rotas){
        switch($rotas){
            case "posts":
                $this->viewPosts();
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

        $post = new Post();
        $resultado = $post->criarPost($descricao,$caminhoImagem);

        if($resultado){
            // Redirecionando o usuário para a página posts somente se der certo o cadastro do post. Estamos usando rotas no caminho do location, por isso não preciso digitar views no caminho.
            header('Location:/fakeinstagram/posts');
        }

    }

}

?>