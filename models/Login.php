<?php

include_once('Conexao.php');

class Login extends Conexao{

    // Criando função para autenticar usuário
    public function autenticarUsuario($email){
        // A variável db é quem armazena as informações da conexão
        $db = parent::criarConexao();
        // Preparando query para inserir na tabela usuarios do BD - dentro dos () estão os nomes das colunas do BD
        $query = $db->prepare("SELECT * FROM usuarios WHERE email=?");
        $query->execute([$email]);
        // Nas linhas abaixo comento outra opção de escrever os parâmetros que passo entre (), no prepare e execute:
        // $query = $db->prepare("SELECT * FROM usuarios WHERE email:email AND senha:senha");
        // return $query->execute([:email=>$email,:senha=>$password]);

        // Verificando se a query deu certo. Se ela deu certo, ou seja, for diferente de falso, eu transformo a query em fetch_assoc. Como é a $query que guarda o resultado do execute, o fetchAll precisa ser nela.
        if($query != false){
            $resultadoLogin = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $resultadoLogin;
        
    }

}

?>