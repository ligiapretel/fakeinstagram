<?php

include_once('Conexao.php');

class User extends Conexao{

    // Criando função para inserir usuário no BD
    public function criarUsuario($email,$nome,$apelido,$password,$caminhoImagemPerfil){
        // Para acessar o método de uma classe pai, é preciso usar o parent::
        // A variável db é quem armazena as informações da conexão
        $db = parent::criarConexao();
        // Preparando query para inserir na tabela usuarios do BD - dentro dos () estão os nomes das colunas do BD
        $query = $db->prepare("INSERT INTO usuarios (email,nome_completo,nome_usuario,senha,foto) values(?,?,?,?,?)");
        // ATENÇÃO!!!! Checar qual nome dar para a variável da imagem aqui. Estou usando o mesmo nome que coloquei no UserController, do que está vindo via POST.
        return $query->execute([$email,$nome,$apelido,$password,$caminhoImagemPerfil]);
    }

}

?>