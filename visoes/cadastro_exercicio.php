<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Exercício</title>
</head>
<body>
    <h1> Cadastrar Exercício </h1>
    <form action="../controladores/ExercicioControlador.php" 
          method="post" enctype="multipart/form-data">

    <p>Nome do Exercicio <input type="text" name="nome"></p>
    <p>Grupo Muscular <input type="text" name="grupo_muscular"></p>
    <p>Descrição <textarea name="descricao"></textarea></p>
    <p>Imagem <input type="file" name="imagem"></p>
    <p>Vídeo <input type="file" name="video"></p>
    <button type="submit">Cadastrar</button>

    </form>
</body>
</html>