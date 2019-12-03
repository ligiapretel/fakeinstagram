<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram | Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
    
    <?php include "views/includes/header.php"; ?>
    <main class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-10 col-md-6 col-lg-4 d-flex justify-content-center">
                <img class="img-fluid img-login-register" src="views/img/iphone_insta.png">
            </div>
            <div class="card col-10 col-sm-8 col-md-4 col-lg-3 p-4">
                <h2 class="title-form">Entre para ver fotos e vídeos dos seus amigos.</h2>
                <form action="/fakeinstagram/autenticar-login" method="POST">
                    <input type="email" class="form-control form-control-sm mb-3" name="email" placeholder="E-mail"
                        required>
                    <!-- <input type="text" class="form-control form-control-sm mb-3" name="apelido" placeholder="Nome de usuário" required> -->
                    <input type="password" class="form-control form-control-sm mb-3" name="password" placeholder="Senha"
                        required>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </div>
                    <a href="#">
                        <p class="link-form">Esqueci a senha</p>
                    </a>
                    <div class="line"></div>
                    <a href="/fakeinstagram/formulario-usuario">
                        <p class="link-form">Ainda não possui conta? Cadastre-se</p>
                    </a>
                    <div class="line"></div>
                    <p class="text-app">Baixe o aplicativo</p>
                    <div class="d-flex justify-content-around">
                        <a href="#"><img src="views/img/appstore.png" class="img-app"></a>
                        <a href="#"><img src="views/img/googleplay.png" class="img-app"></a>
                    </div>
                </form>
            </div>
        </div>
    
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>