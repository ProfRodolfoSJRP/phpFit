
<?php 
// Requer os dados da conexão
require_once '../configuracao.php';

// Classe Exercicio, onde vamos armazenar todas as regras 
class Exercicio{
    // Cadastro
    public static function cadastrar($nome, $grupo_muscular, $descricao, $imagem, $video){

        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO exercicios (nome, grupo_muscular, descricao, imagem, video) VALUES (?,?,?,?,?)");
        return $stmt->execute([$nome,$grupo_muscular,$descricao, $imagem,$video]);
    }
}