<?php

    session_start();
    if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_perfil'] != 'admin')
    {
        header("Location: ../index.php");
        exit();
    }

include('conexao.php');

if (isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['linguagens']) && isset($_POST['link']) && isset($_FILES['foto'])) {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $linguagens = trim($_POST['linguagens']);
    $link = trim($_POST['link']);
    $foto = $_FILES['foto']['name'];
    $target_dir = "../fotos-projetos/";
    $target_file = $target_dir . basename($foto);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) 
    {
        $sql = $pdo->prepare("INSERT INTO projetos (titulo, descricao, linguagens, link, imagem) 
                VALUES (?, ?, ?, ?, ?);");

        $sql->execute(array($titulo, $descricao, $linguagens, $link, $foto));
        $_SESSION['projeto-cadastrado'] = "Projeto cadastrado com sucesso!";
        header("Location: ../admin_projetos.php");
    } else {
        echo "Erro ao fazer upload da foto.";
    }
}
?>