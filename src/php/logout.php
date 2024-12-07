<?php

// Verifica se uma sessão já foi iniciada. Caso contrário, inicia uma nova sessão.
if (!isset($_SESSION)) {
    session_start();
}

// Inicializa o array 'carrinhos' dentro da sessão. Isso serve para garantir que o array exista.
$_SESSION['carrinhos'] = array();

// Destroi a sessão, apagando todas as variáveis de sessão e encerrando a sessão.
session_destroy();

// Redireciona o usuário para a página de login.
header("Location: login.php");

?>