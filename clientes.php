<?php
    session_start();

   

   

    if (!isset($_SESSION['usuario_id'] )){
      header("Location: index.php");
      exit();
    }else if ($_SESSION['usuario_perfil'] != "cliente"){
      header("Location: index.php");
    }else{
      $id =  $_SESSION['usuario_id'];
      $nome =  $_SESSION['usuario_nome'];
      $email =  $_SESSION['usuario_email'];
      $perfil = $_SESSION['usuario_perfil'];
    }


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#007bff">
  <title>Nupsi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/clientes.css">
  <link rel="stylesheet" href="styles/sidebar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/logoBranca.png" type="image/x-icon">
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
                <hr>
                <li><a class="dropdown-item " href="clientes.php">CLIENTES</a></li>
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

  <main style="margin-top: 150px;">
    <div class="pagina-cliente">
      <h2>Dados do Cliente</h2>
      <div class="dados-cliente">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" value="<?php echo"$nome"; ?>" readonly>

        <label for="email">Email:</label>
        <input type="email" id="email" value="<?php echo"$email"; ?>" readonly>

      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center" role="search">
      <button class="btn btn-outline-light mx-2 bg-primary" href="#" data-bs-toggle="modal"
        data-bs-target="#atualizarInfo">Editar</button>
    </div>
  </main>

  <br>

  <footer>
    <div class="footer-content">
      <div class="footer-card">
        <h3>NUPSI</h3>
        <p>Av. ESCÓCIA, 1001 - Cidade das Águas, Frutal - MG, 38202-436</p>
        <p><b>Telefone: </b>(012 34) 3429-3470</p>
        <p><b>Email: </b>testesteste.gmail.com</p>
      </div>
      <div class="footer-card">
        <h3><b>Links úteis</b></h3>
        <a href="https://github.com/UEMGNUPSI" target="_blank">
          <p>GitHub</p>
        </a>

      </div>

      <div class="footer-card">
        <h3><b>Siga-nos!</b></h3>
        <a href="https://www.facebook.com/NupsiUemgFrutal/photos_by?locale=pt_BR" target="_blank">
          <p>Nos siga no facebook e fique por dentro de tudo que acontece no NUPSI</p>
        </a>
      </div>
    </div>

    <div class="hr"></div>

    <div class="rights">
      <p>&#174; Todos os direitos reservados. 2024</p>
    </div>
  </footer>

  <div class="modal fade" id="atualizarInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-input">
              <div class="mb-3">
                <label for="Nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="Nome" name="nome" placeholder="Seu novo nome">
              </div>
            </div>
            <div class="mb-3">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="script/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/5086c6dc28.js" crossorigin="anonymous"></script>
  <script>

    const modalAtualizar = document.getElementById('atualizarInfo')
    if (modalAtualizar) {
      modalAtualizar.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget

        nome = document.getElementById('nome').value;
        document.getElementById('Nome').value = nome;
        document.getElementById('Nome').focus();
      })
    }

    
  </script>
</body>

</html>