<?php

session_start();

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
        if(isset($_SESSION["nomeUsuarioLogado"])){
            include('views/newPost.php');
        }else{
            include('views/login.php');
        }
    } 

    private function viewPosts(){
        include('views/posts.php');
    }

    private function cadastrarPost(){
        // Criando objeto Post
        $post = new Post();

        // Recebendo dados do formulário do post pelo método POST do form
        $descricao = $_POST['descricao'];
        $nomeArquivo = $_FILES['img']['name'];
        $linkTemp = $_FILES['img']['tmp_name'];
        $caminhoImagem = "views/img/posts/$nomeArquivo";
        
        move_uploaded_file($linkTemp, $caminhoImagem);
        
        // O id do usuário que está fazendo o post armazeno pela sessão, já que o usuário só poderá postar se estiver logado. Passarei esse parâmetro na minha função criarPost, que detalho mais abaixo. 
        $idUsuarioLogado = $_SESSION["idUsuarioLogado"][0];

        // echo "<pre>";
        // var_dump($idUsuarioLogado);
        // exit;

        $resultado = $post->criarPost($descricao,$caminhoImagem,$idUsuarioLogado);

        // Verificando se o resultado é verdadeiro
        if($resultado){
            // Redirecionando o usuário para a página posts somente se der certo o cadastro do post. Estou usando rotas no caminho do location, por isso não preciso digitar views no caminho.
            header('Location:/fakeinstagram/posts');
        }else{
            echo "Não foi possível cadastrar seu post. =(";
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