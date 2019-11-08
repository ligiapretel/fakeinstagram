<?php

// Essa classe apenas retorna a conexão para quem quiser usar. Ela não faz query, nem nada mais.
class Conexao{
    // Os atributos ficam privados, pois já vamos deixar a conexão gerada para ser usada em outros lugares
    private $host = 'mysql:host=localhost;dbname=instagram;port=3307';
    private $user = 'root';
    private $password = '';

    protected function criarConexao(){
        return new PDO($this->host, $this->user, $this->password);
    }

}

?>