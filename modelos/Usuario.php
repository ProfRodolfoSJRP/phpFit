<?php
// Incluir arquivo de configurações
require_once '../configuracao.php';

// Classe que representa um usuário
class Usuario{
    // Cadastrar um novo usuário
    public static function cadastrar($nome, $email, $senha){
        global $pdo;

        // Gera uma hash de senha criptografada 
        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara para a consulta SQL passando os valores da VIEW 
        $stmt = $pdo->prepare("INSERT INTO usuarios(nome, email, senha)
        VALUES (?,?,?) ");

        // Executa a consulta SQL enviando os valores
        if($stmt->execute([$nome,$email,$hashSenha])){
            // Se deu tudo certo 
            return true;
        }else{
            // Se deu rui 
            return "Erro ao cadastrar usuário, tente novamente.";
        }
    }
  
}