<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sistema_nupsi";

	// Criar a conexão
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", "$username", '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
?>
