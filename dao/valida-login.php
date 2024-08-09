<?php
session_start();
require_once("conexao.php");


if (isset($_POST['entrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare("SELECT id, nome, email, senha, perfil FROM usuarios WHERE email = ?;");
    $sql->execute(array($email));

    if ($sql->rowCount() > 0){
        $linha =$sql->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $linha['senha'])) { // ARRUMAR VERIFICAÇÃO DE SENHA POIS ESTÁ DANDO COMO SENHA ERRADA.
            // Sucesso no login
            $_SESSION['usuario_id']     = $linha['id'];
            $_SESSION['usuario_nome']  = $linha['nome'];
            $_SESSION['usuario_email'] = $linha['email'];
            $_SESSION['usuario_perfil'] = $linha['perfil'];

            $_SESSION['success'] = "Id: ". $_SESSION['usuario_id']."  , Nome: ". $_SESSION['usuario_nome']." , Email: ". $_SESSION['usuario_email'].", Perfil: ". $_SESSION['usuario_perfil']." ";
            header("Location: ../index.php");
            exit();
        } else {
            // Falha na senha
            $_SESSION['error'] = "Login ou senha incorreto(s)";
            header("Location: ../login.php");
            exit();
        }
    }else{
        $_SESSION['error'] = "Login ou senha incorreto(s)";
        header("Location: ../login.php");
        exit();
    }
}



?>