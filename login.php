<?php
session_start();

if (isset($_SESSION['cadastro-concluido'])){
    echo "<script>alert('".$_SESSION['cadastro-concluido']."');</script>";
    unset($_SESSION['cadastro-concluido']);
}
if (isset($_SESSION['error'])){
    echo "<script>alert('".$_SESSION['error']."')</script>";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])){
    echo "<script>alert('".$_SESSION['success']."')</script>";
    unset($_SESSION['success']);
}


?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>

        <div class="left">
            <a href="index.php"><img src="assets/logo2.png" alt="logo NUPSI"></a>
        </div>
        <div class="right">
            <h1>Login</h1>
            <form action="dao/valida-login.php" method="post">
                <div class="mb-3">
                    <label for="email">Email </label>
                    <div class="input-area">
                        <label for="Email"><i class="fa-regular fa-envelope"></i></label>
                        <input type="email" placeholder="Email" id="Email" name="email" maxlength="254" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="senha">Senha </label>
                    <div class="input-area">
                        <label for="Senha"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" placeholder="Password" maxlength="128" id="Senha" name="senha" required>
                    </div>
                </div>

                <button type="submit" name="entrar" class="btn">Entrar</button>
            </form>
            <p>Não tem uma conta? <a href="cadastro.html" class="btn-link">Cadastre-se agora!</a></p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5086c6dc28.js" crossorigin="anonymous"></script>
</body>

</html>