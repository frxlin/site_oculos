<?php

session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

// Verifica se a conexão com o banco de dados é válida. Caso contrário, exibe uma mensagem de erro e termina o script.
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$result = null;

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os valores do formulário e os armazena nas variáveis $email e $senha
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Cria a consulta SQL para verificar o usuário no banco de dados
    $sql = "SELECT * FROM users WHERE email='$email' AND senha='$senha' ";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Usuário encontrado, agora recupera os dados
        $user = $result->fetch_assoc();

        // Define a variável de sessão para o nome do usuário
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $user['nome'];  // Armazena o nome do usuário na sessão

        echo "Login bem sucedido, " . $_SESSION["username"] . "!";

        // Exibe uma mensagem de debug no console do navegador (apenas para desenvolvimento)
        echo "<script>console.log('Debug Objects: " . $_SESSION["username"] . "' );</script>";

        // Redireciona o usuário para a página 'index.php'
        header("Location: index.php");
        exit(); // Adicionando exit para garantir que a execução do script pare após o redirecionamento
    } else {
        echo "<p style='color: red;'>Senha  ou Usuário incorretos</p>
        renicie a pagina e tente de novo";
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">

    <title>Login</title>
</head>

<body>




    <div class="wrapper center transparent ">
        <form action="login.php" method="post" class="form" id="Form">
            <p class="form-login ">Login</p>
            <div class="input-box ">
                <input type="email" name="email" id="email" class="input" placeholder="Email">
            </div>
            <div class="input-box">
                <input type="password" id="senha" name="senha" class="input" placeholder="senha">
            </div>
            <div class="remember-forgot">
                <label>
                    <a href="#">esqueceu a senha?? </a>
            </div>
            <button class="btn" type="submit">Login</button>
         
            <div class="register-link">
            <p>você não tem conta? <a href="../php/cadastro.php">Registrar</a></p>
    </div>
    <button class="btn" type="button" onclick="window.location.href='../php/index.php';">Voltar</button>


    </form>
    </div>


    <script src="../js/login.js"></script>
   
   
</body>

</html>
<script src="../js/refresh.js"></script>