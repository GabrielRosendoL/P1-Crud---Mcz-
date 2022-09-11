<!-- Ações de login -->

<?php
include('conexao.php');

if(isset($_POST['usuario']) || isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0) {
        echo "";
    } else if(strlen($_POST['senha']) == 0) {
        echo "";
    } else {

        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "";
        }

    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="widthe-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Login</title>
    </head>
    <body>
        <!-- Layout principal --> 
        <div class="tela-login">
            <div class="lado-esquerdo">
                <!-- Título -->
                <h1>Bem-vindo!<br>Faça login para continuar.</h1>
                <!-- Inserção do GIF -->
                <img src="Movie Night.gif" class="lado-esquerdo-imagem" alt="Filme animacao">
            </div>
            <div class="lado-direito">
                <form class="card-do-login" action="" method="POST">
                    <!-- Campo de login -->
                    <h1>LOGIN</h1>
                    <div class="campo-de-texto">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário">
                    </div>
                    <div class="campo-de-texto">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <button class="btn-login">ENTRAR</button>
                </form>
            </div>
            </div>
        </div>
    </body>
</html>