<?php
    session_start();
    require_once("conexao.php");

    if (isset($_POST['cadastrar'])){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, perfil) values (?, ?, ?, 'cliente');");
        $sql->execute(array($nome, $email, $senha));

        $_SESSION['cadastro-concluido'] = "Cadastro efetuado com sucesso!";
        header("location: ../login.php");
        exit();
    }



?>