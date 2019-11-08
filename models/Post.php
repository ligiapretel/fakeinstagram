<?php

include_once('Conexao.php');

class Post extends Conexao{

    public function criarPost($descricao,$imagem){
        // Para acessar o método de uma classe pai, é preciso usar o parent::
        $db = parent::criarConexao();
        $query = $db->prepare("INSERT INTO posts (descricao,imagem) values(?,?)");
        return $query->execute([$descricao,$imagem]);
    }

}

?>