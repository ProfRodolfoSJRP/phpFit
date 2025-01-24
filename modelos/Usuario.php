<?php
// Incluir arquivo de configurações
require_once '../configuracao.php';

// Classe que representa um usuário
class Usuario{

    // Validador de Email - Verifica se já existe no BD
    public static function emailExiste($email)
    {
        // Usa a variavel global para bd
        global $pdo;

        // Prepara uma consulta no SQL para contar quantos e-mail existem
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios where email =?");

        // Executa a consulta SQL 
        $stmt->execute([$email]);

        // Retorna true se email existe
        return $stmt->fetchColumn() > 0;
    }

    // Cadastrar um novo usuário
    public static function cadastrar($nome, $email, $senha){
        global $pdo;

        if(self::emailExiste($email)){
            return "E-mail Já dadastrado ! Digite outro !";
        }

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

    // Logar no sistema 
    public static function login($email, $senha){
        // Usa a variavel global $pdo para manipular o banco de dados
        global $pdo ;

        // Preparando uma consulta SQL para buscar os usuários pelo email
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");

        // Executa a consulta SQL com o e-mail como parâmetro
        $stmt->execute([$email]);

        // Obtém o registro do usuário com um array associativo
        $usuario = $stmt->fetch();

        // Verifica se o usuário foi encontrado no banco de dados
        if($usuario && password_verify($senha,$usuario['senha'])){
            // Inicia a sessão PHP para armazenar os dados do usuário
            session_start();
            // Armazena as informações capturadas do BD
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            return true;
        }
        return false;
    }
}