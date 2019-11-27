<?php
    // session_start();
    // verificando se o usuário logou. Se existir nomeUsuarioLogado, é true; se nomeUsuarioLogado[posição zero do array, que é a posição que armazena o nomeUsuarioLogado] for vazia, é falso.
    $nomeUsuarioLogado = isset($_SESSION["nomeUsuarioLogado"])? $_SESSION["nomeUsuarioLogado"][0]:[];
    // print_r($nomeUsuarioLogado);
?>
<header>
        <nav class="navbar topo-instagran justify-content-center">
            <a class="navbar-brand" href="/fakeinstagram/"><img width="90" src="views/img/logo.png" alt="" srcset="">Instagram</a>
            <?php
            // Se nomeUsuarioLogado for true, exibe uma opção de menu
            if($nomeUsuarioLogado){ ?>
                <p><?php echo "Olá, ".$nomeUsuarioLogado; ?></p>
                <a href="/fakeinstagram/logout">Sair</a>
            <?php }else{ ?>
                    <a href="/fakeinstagram/formulario-usuario">Cadastre-se</a>
                    <a href="/fakeinstagram/login">Login</a>
                <?php } ?>
        </nav>
</header>