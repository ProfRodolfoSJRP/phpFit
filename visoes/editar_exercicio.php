<?php

require_once '../configuracao.php';
require_once '../modelos/Exercicio.php';

// Busca os exercicios no banco de dados 
$exercicio = Exercicio::buscaTodos();

if(!$exercicio){
    echo "Nenhum exercicio encontrado !";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercicios</title>
</head>
<body>
    <table>
        <thead>
            <th>Nome</th>
            <th>Grupo Muscular</th>
            <th>Descrição</th>
            <th>Ação</th>
        </thead>
        <tbody>
            <?php
            foreach($exercicio as $ex){ 
            ?>
            <tr>
                <td><?php echo $ex['nome']; ?></td>
                <td><?php echo $ex['grupo_muscular']; ?></td>
                <td><?php echo $ex['descricao']; ?></td>
                <td><img width="100" src="../<?php echo $ex['imagem'];?>"></td>
            </tr>
            <?php
            } // Fechamento Foreach
            ?>
        </tbody>
    </table>
</body>
</html>