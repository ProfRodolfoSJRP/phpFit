<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login phpFIT</title>
</head>
<body>
    <h3>Login</h3>

    <!-- Exibe as mensagem de erro -->

    <?php 
        if(isset($_GET['msg'])) { 
            echo $_GET['msg'];
        }
        if(isset($_GET['erro'])) { 
            echo $_GET['erro'];
        }
    ?>
    
    <form action="../controladores/UsuarioControlador.php" method="POST">
        <p>Email : <input type="email" name="email" placeholder="Email"></p>
        <p>Senha : <input type="password" name="senha" placeholder="Senha"></p>
        <button type="submit" name="acao" value="login">Entrar</button>
    </form>
    <p>Não possui conta ? <a href="cadastro.php">Cadastrar!</a></p>
</body>
</html>