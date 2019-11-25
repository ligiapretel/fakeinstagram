<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram | Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
    
    <?php include "views/includes/header.php"; ?>
    <main class="d-flex justify-content-center">
        <div class="card col-4 p-3">
            <h2 class="titulo-cadastro-usuario">Cadastre-se para ver fotos e vídeos dos seus amigos.</h2>
            <form action="/fakeinstagram/cadastrar-usuario" method="POST" enctype="multipart/form-data">
                <input type="email" class="form-control form-control-sm mb-3" name="email" placeholder="E-mail" required>
                <input type="text" class="form-control form-control-sm mb-3" name="nome" placeholder="Nome completo" required>
                <input type="text" class="form-control form-control-sm mb-3" name="apelido" placeholder="Nome de usuário" required>
                <input type="password" class="form-control form-control-sm mb-3" name="password" placeholder="Senha" required>
                <label for="img-perfil-id" class="form-control-sm">Foto de perfil</label>
                <input type="file" class="form-control-sm mb-3" name="img-perfil" id="img-perfil-id" placeholder="Foto de perfil">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Cadastre-se</button>
                </div>
            </form>
        </div>
    
    </main>