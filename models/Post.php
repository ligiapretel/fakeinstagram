<?php

include_once('Conexao.php');

class Post extends Conexao{

    public function criarPost($descricao,$imagem){
        // Para acessar o método de uma classe pai, é preciso usar o parent::
        // A variável db é quem armazena as informações da conexão
        $db = parent::criarConexao();
        $query = $db->prepare("INSERT INTO posts (descricao,imagem) values(?,?)");
        return $query->execute([$descricao,$imagem]);
    }

    public function listarPosts(){
        $db = parent::criarConexao();
        $query = $db->query('SELECT * from posts ORDER BY id DESC');
        // FETCH_OBJ - retorna uma lista de objetos. Transforma cada coluna do BD em um atributo da classe. Muda a forma de acessar esse objeto (pode ser com foreach, mas em vez de colocar [] para acessar a etiqueta, uso a sintaxe da classe, com seta. Ex.: $post->descricao)
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

}

?>