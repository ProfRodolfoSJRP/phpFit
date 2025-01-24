<?php
// Inicia a sessão para identificar se um usuário existe
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpFIT - Página Inicial</title>
</head>
<body>
    <h1>PHP FIT</h1>
    <p>Gerencie e organize seus treinos</p>
    
    <?php
    // Se um usuário existir mostra a opção de Sair e Tela inicial
    if(isset($_SESSION['usuario_id'])){ ?>
        <li>
            <a href="visoes/dashboard.php">Painel Principal</a>
        </li>
        <li>
            <a href="visoes/cadastro_exercicio.php">Cadastrar Exercicio</a>
        </li>
        <li>
            <a href="controladores/UsuarioControlador.php?acao=logout">Sair</a>
        </li>
        <?php } else { ?>
        <li>
            <a href="visoes/login.php">Acessar Sistema</a>
        </li>
        <li>
            <a href="visoes/cadastro.php">Cadastrar</a>
        </li>
    <?php } ?>
</body>
</html>