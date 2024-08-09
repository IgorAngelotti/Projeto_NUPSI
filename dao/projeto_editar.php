<?php
    session_start();
    if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_perfil'] != 'admin')
    {
        header("Location: ../index.php");
        exit();
    }


    if (isset($_POST['atualizar-projeto'])){
        require_once("conexao.php");

        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $linguagens = $_POST['linguagens'];
        $link = $_POST['link'];

        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            // Se o campo de arquivo não está vazio, usar o arquivo enviado
            $foto = $_FILES['foto']['name'];
          } else {
            // Se o campo de arquivo está vazio, usar o valor do campo de texto oculto
            $foto = $_POST['foto_atual'];
          }

          $sql = $pdo->prepare("UPDATE projetos SET titulo = ?, descricao = ?, linguagens = ?, link = ?, imagem = ? WHERE id = ?");
          $sql->execute(array($titulo, $descricao, $linguagens, $link, $foto, $id));
          $_SESSION['projeto-editado'] = "Projeto editado com sucesso!";  
          header("Location: ../admin_projetos.php");
    }


?>