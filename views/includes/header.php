<?php
    // verificando se o usuário logou. Se existir nomeUsuarioLogado, é true; se nomeUsuarioLogado[posição zero do array, que é a posição que armazena o nomeUsuarioLogado] for vazia, é falso.
    $nomeUsuarioLogado = isset($_SESSION["nomeUsuarioLogado"])? $_SESSION["nomeUsuarioLogado"][0]:[];
    // print_r($nomeUsuarioLogado);
?>
<header>
    <nav class="navbar topo-instagran justify-content-center">
        <a class="navbar-brand mr-5" href="/fakeinstagram/"><img width="90" src="views/img/logo.png"
                alt="Instagram">Instagram</a>
        <?php
                // Se nomeUsuarioLogado for true, exibe uma opção de menu
                if($nomeUsuarioLogado){ ?>
        <div class="nav-item dropdown">
            <span class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><?php echo "Olá, ".$nomeUsuarioLogado; ?></span>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/fakeinstagram/logout">Sair</a>
            </div>
        </div>
        <?php }else{ ?>
            <a class="ml-4" href="/fakeinstagram/formulario-usuario">Cadastre-se</a>
            <a class="ml-4" href="/fakeinstagram/login">Login</a>
        <?php } ?>
    </nav>
</header>