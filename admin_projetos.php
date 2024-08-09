<?php
    session_start();

    if (!isset($_SESSION['usuario_id'] )){
      header("Location: index.php");
      exit();
    }else if ($_SESSION['usuario_perfil'] != "admin"){
      header("Location: index.php");
    }else{
      $perfil =  $_SESSION['usuario_nome'];
    }

    if (isset($_SESSION['projeto-cadastrado'])){
      echo "<script>alert('".$_SESSION['projeto-cadastrado']."');</script>";
      unset($_SESSION['projeto-cadastrado']);
    } 
    if (isset($_SESSION['projeto-editado'])){
      echo "<script>alert('".$_SESSION['projeto-editado']."');</script>";
      unset($_SESSION['projeto-editado']);
    } 
    if (isset($_SESSION['falha-upload'])){
      echo "<script>alert('".$_SESSION['falha-upload']."');</script>";
      unset($_SESSION['falha-upload']);
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    <aside>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">NUPSI - ADM</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div>
                <span><i class="fa-solid fa-user"> </i> - <?php echo "$perfil"; ?></span>
              </div>

              <hr>

              <div class="mt-3">
                <a href="admin_projetos.php" class="btn btn-secondary" type="button">
                  Gerenciar Projetos
                </a>
              </div>

              <div class="mt-2">
                <a href="admin_pessoas.php" class="btn btn-secondary" type="button">
                  Gerenciar Pessoas
                </a>
              </div>


            </div>
          </div>
    </aside>

    <div>
        <header class="d-flex justify-content-between align-items-center p-3">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                &#9776;
            </button>

            <a href="index.php">
              <h2 class="m-0">NUPSI</h2>
            </a>

            <div>
            <a class="btn btn-outline-light mx-2 bg-danger" href="dao/logout.php">Logout</a>
            </div>
        </header>
        
        <main class="container" style="max-width: 1400px;">
          <h3>Gerenciamento de Projetos</h3>
          
          <div class="d-flex justify-content-end mb-3">
              <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#adicionarProjeto">Adicionar Projeto</button>
          </div>
          
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Imagem</th>
                          <th>Título</th>
                          <th>Descrição</th>
                          <th>Linguagens</th>
                          <th>Link</th>
                          <th>Data de Inclusão</th>
                          <th>Ações</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Linhas de exemplo; substitua com os dados reais -->
                      
                    <?php
                      require_once("dao/conexao.php");
                      $sql = $pdo->prepare("SELECT * FROM projetos order by id asc");
                      $sql->execute();

                      $info = $sql->fetchAll(PDO::FETCH_ASSOC);

                      foreach ($info as $key => $value) {
                        echo '<tr>';
                        echo '  <td>'.$value['id'].'</td>';
                        echo '  <td><img src="fotos-projetos/'.$value['imagem'].'" alt="Imagem do projeto" style="width: 300px;"></td>';
                        echo '  <td>'.$value['titulo'].'</td>';
                        echo '  <td>'.$value['descricao'].'</td>';
                        echo '  <td>'.$value['linguagens'].'</td>';
                        echo '  <td>'.$value['link'].'</td>';
                        echo '  <td>'.$value['data_inclusao'].'</td>';
                        echo '  <td>
                                  <button class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#editarProjeto" data-id="'.$value['id'].'" data-titulo="'.$value['titulo'].'" data-descricao="'.$value['descricao'].'" data-linguagens="'.$value['linguagens'].'" data-link="'.$value['link'].'" data-imagem="'.$value['imagem'].'">Editar</button>
                                  <button class="btn btn-outline-danger" type="button">Excluir</button>
                                </td>';
                        echo '</tr>';
                      }

                    ?>

                  

                     
                      <!--
                        <tr>
                            <td>1</td>
                            <td>Projeto Alpha</td>
                            <td>Descrição do Projeto Alpha</td>
                            <td>HTML, CSS, JavaScript</td>
                            <td><a href="#">github.com</a></td>
                            <td>01/01/2024</td>
                            <td>
                                <button class="btn btn-outline-warning" type="button">Editar</button>
                                <button class="btn btn-outline-danger" type="button">Excluir</button>
                            </td>
                        </tr>
                      -->
                  </tbody>
              </table>
          </div>
      </main>
    </div>
    
      <!-- modal adicionar projeto -->
    <div class="modal fade" id="adicionarProjeto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar projeto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form action="dao/projeto_adicionar.php" method="post" enctype="multipart/form-data">
              <div class="form-group mb-3">
                  <label for="Titulo">Nome do projeto:</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" required>
              </div>
              <div class="form-group mb-3">
                  <label for="descricao">Descrição:</label>
                  <textarea class="form-control" id="descricao" name="descricao" rows="3" maxlength="100" required></textarea>
              </div>
              <div class="form-group lado-alado mb-3">
                  <div>
                    <label for="linguagens">Linguagens (separar por vírgula):</label>
                    <textarea class="form-control" id="linguagens" name="linguagens" maxlength="100" required></textarea>
                  </div>
                  <div>
                    <label for="link">Link (projeto hospedado ou repositório GitHub):</label>
                    <input type="text" class="form-control" id="link" name="link" required>
                  </div>
              </div>
              <div class="form-group mb-3">
                  <label for="foto">Foto:</label>
                  <input type="file" class="form-control-file" id="foto" name="foto" required>
              </div>
              <div class="form-group mb-3 d-flex justify-content-end">
                <input type="reset" class="p-1" value="Limpar Campos">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" name="cadastrar-projeto" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

     <!-- modal editar projeto -->
    <div class="modal fade" id="editarProjeto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar projeto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form action="dao/projeto_editar.php" method="post" enctype="multipart/form-data">
              <input type="hidden" id="Id" name="id">
              <div class="form-group mb-3">
                  <label for="Titulo">Nome do projeto:</label>
                  <input type="text" class="form-control" id="Titulo" name="titulo" required>
              </div>
              <div class="form-group mb-3">
                  <label for="Descricao">Descrição:</label>
                  <textarea class="form-control" id="Descricao" name="descricao" rows="3" maxlength="100" required></textarea>
              </div>
              <div class="form-group lado-alado mb-3">
                  <div>
                    <label for="Linguagens">Linguagens (separar por vírgula):</label>
                    <textarea class="form-control" id="Linguagens" name="linguagens" maxlength="100" required></textarea>
                  </div>
                  <div>
                    <label for="Link">Link (projeto hospedado ou repositório GitHub):</label>
                    <input type="text" class="form-control" id="Link" name="link" required>
                  </div>
              </div>
              
                <div class="form-group mb-3">
                  <div class="form-content mb-3">
                    <label for="">Foto atual: </label>
                    <img src="" alt="" id="foto-atual" width="100%" height="100%" class="img-thumbnail">
                  </div>
                  <div class="form-content">
                    <label for="Foto">Nova foto:</label>
                    <input type="file" class="form-control-file" id="Foto" name="foto">
                    <input type="hidden" id="Foto_atual" name="foto_atual">
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" name="atualizar-projeto" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5086c6dc28.js" crossorigin="anonymous"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
            
            const modalAdicionar = document.getElementById('adicionarProjeto');
            const modalEditar = document.getElementById('editarProjeto'); 
            
            modalAdicionar.addEventListener('shown.bs.modal', function (event) {
              document.getElementById('titulo').focus();

            });

            // FUNÇÃO PARA PEGAR BOTÃO DE ACIONAMENTO DO MODAL COM OS ATRIBUTOS PASSADOS A ELE 
            modalEditar.addEventListener('show.bs.modal', function (event) {
              const button = event.relatedTarget;
              const id = button.getAttribute('data-id');
              const titulo = button.getAttribute('data-titulo');
              const descricao = button.getAttribute('data-descricao');
              const linguagens = button.getAttribute('data-linguagens');
              const link = button.getAttribute('data-link');
              const imagem = button.getAttribute('data-imagem');

              document.getElementById('Id').value = id;
              document.getElementById('Titulo').value = titulo;
              document.getElementById('Descricao').value = descricao;
              document.getElementById('Linguagens').value = linguagens;
              document.getElementById('Link').value = link;
              document.getElementById('Foto_atual').value = imagem
              
              const imagemAtual = document.getElementById('foto-atual');
              imagemAtual.src= "fotos-projetos/"+ imagem;
          })
       })

       /*
         echo '  <td>'.$value['id'].'</td>';
                        echo '  <td>'.$value['titulo'].'</td>';
                        echo '  <td>'.$value['descricao'].'</td>';
                        echo '  <td>'.$value['linguagens'].'</td>';
                        echo '  <td>'.$value['link'].'</td>';
                        echo '  <td>'.$value['imagem'].'</td>';
                        echo '  <td>'.$value['data_inclusao'].'</td>'
       */


    </script>
</body>
</html>