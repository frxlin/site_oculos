<?php


require_once "conexao.php";

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os valores do formulário e os armazena nas variáveis $name, $email e $senha
    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    // Cria a consulta SQL para inserir os dados na tabela 'users'
    $sql = "INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)";

    // Prepara a consulta SQL
    $stmt = $conn->prepare($sql);

    // Vincula as variáveis aos parâmetros na consulta preparada
    $stmt->bind_param("sss", $name, $email, $senha);

    // Executa a consulta e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        
        echo "<script>alert('Usuário criado com sucesso'); </script>";
    } else {
        
        echo "<script>alert('Erro ao criar usuário: " . addslashes($conn->error) . "');</script>";
    }

    // Fecha a consulta preparada
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Document</title>
</head>

<body>



    <div class="center transparent ">
        <div class="wrapper ">
            <form action="cadastro.php" method="post" class="form" id="form">


                <p class="title">Registrar </p>
                <p class="message">Registre agora e tenha acesso completo do nosso Site. </p>
                <div class="flex">
                    <label>
                        <input required id="Nome" name="name" type="text" class="input">
                        <span>Nome completo</span>
                    </label>


                </div>

                <label>
                    <input required id="Email" name="email" type="email" class="input">
                    <span>Email</span>
                </label>

                <label>
                    <input type="password" id="Senha" name="senha" class="input">
                    <span>Senha</span>
                </label>
                <label>
                    <input required id="ConfirmSenha" name="csenha" type="password" class="input">
                    <span>Confirmar Senha</span>
                </label>
                <button class="submit" id="een">Enviar</button>
                <p class="signin">Você ja possue conta? <a href="../php/login.php">Login</a> </p>
            </form>
        </div>
    </div>
    <script src="../js/registrar.js"></script>
</body>

</html>