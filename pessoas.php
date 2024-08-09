<?php
session_start();

if (isset($_SESSION['usuario_perfil'])){
  $perfil = $_SESSION['usuario_perfil'];
}else{
  $perfil = "";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/pessoas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg border-bottom border-body fixed-top" data-bs-theme="dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/logoBranca.png" alt="logo nupsi"
                id="logo-navbar"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
              aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarColor01">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" onclick="scrollToTop()" aria-current="page" href="index.php#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php#sobre">Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php#h3-projetos">Projetos</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    O NUPSI
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item nav-link" href="index.php#h3-fundamentos">Fundamentos</a></li>
                    <li><a class="dropdown-item nav-link" href="index.php#h3-conheca">Conheça</a></li>
                    <li><a class="dropdown-item nav-link" href="index.php#h3-comunidade">Comunidade</a></li>
                    <li><a class="dropdown-item " href="admin_projetos.html">ADMIN</a></li>
                    <li><a class="dropdown-item " href="clientes.html">CLIENTES</a></li>
                  </ul>
                </li>
              </ul>
              <div class="d-flex" role="search">
              <?php if ($perfil == ""): ?>
                <a class="btn btn-outline-light mx-2 bg-primary" href="login.php">Login</a>
                <a class="btn btn-outline-light bg-success" href="cadastro.html" >Cadastre-se</a>

              <?php elseif ($perfil == "cliente"): ?>
                <a class="btn btn-outline-light bg-success" href="clientes.php" >Acessar perfil</a>
                <a class="btn btn-outline-light mx-2 bg-danger" href="dao/logout.php">Logout</a>

              <?php elseif ($perfil == "admin"): ?>
                <a class="btn btn-outline-light bg-success" href="admin_projetos.php" >Gerenciamento</a>
                <a class="btn btn-outline-light mx-2 bg-danger" href="dao/logout.php">Logout</a>
              <?php endif; ?>
            </div>
            </div>
        </nav>
      </header>

      <main>
          <h1>Comunidade</h1>
          <h2>A seguir, veja os integrantes e suas informações</h2>
        <div id="pessoas-container">

            <section class="participant-card">
               <div class="text-card">
                    <h2>João Silva</h2>
                    <p>Idade: 25</p>
                    <p>Período de Participação: 2016-2018</p>
                    <p>LinkedIn: <a href="">lorem ipsum</a></p>
                    <h3>Projetos</h3>
                    <ul>
                        <li>Projeto A</li>
                        <li>Projeto B</li>
                        <li>Projeto C</li>
                    </ul>
               </div>
               <img src="assets/elon musk.png" alt="">
            </section>

            <section class="participant-card">
                <div class="text-card">
                    <h2>Maria Oliveira</h2>
                    <p>Idade: 22</p>
                    <p>Período de Participação: 2023-2024</p>
                    <p>LinkedIn: <a href="">lorem ipsum</a></p>
                    <h3>Projetos</h3>
                    <ul>
                        <li>Projeto X</li>
                        <li>Projeto Y</li>
                    </ul>
                </div>
                <img src="assets/janja.png" alt="">
            </section>
        </div>
      </main>

    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5086c6dc28.js" crossorigin="anonymous"></script>
</body>
</html>