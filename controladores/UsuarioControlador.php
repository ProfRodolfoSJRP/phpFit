<?php
// Inclui o arquivo de configurações Principal do Projeto.
require_once '../configuracao.php';

// Inclui o modelo 'usuario', que contem as regras de negocios 
// Contem os comandos para Cadastrar, Login

require_once '../modelos/Usuario.php';

// Verifica se a requisição foi feita usando o método POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Obtém a ação passada no formulário, como 'cadastrar' ou  'login'.
    $acao = $_POST['acao'];

    // Se a ação for "cadastrar", executa o fluxo de cadastro de usuário
    if($acao == 'cadastrar'){
        // Óbtem os dados enviados pelo formulário de cadastro
        $nome = $_POST['nome']; // Nome do usuario.
        $email = $_POST['email']; // Email do usuário
        $senha = $_POST['rafael'];

        // Chama o Método cadastrar da classe usuário que esta no modelo usuario
        $resultado = Usuario::cadastrar($nome,$email,$senha);
        // Se o cadastro for bem sucedido retorna true
        if($resultado === true){
            // Redireciona o usuário para a página de login com uma mensagem 
            header("Location: ".BASE_URL."visoes/login.php?msg=Cadastrado");
        }else{
            header("Location: ".BASE_URL."visoes/login.php?msg=ERRO!");
        }
    }

    else if($acao == 'login'){
        // Óbtem os dados enviados pelo formulário de cadastro
        $email = $_POST['email']; // Email do usuário
        $senha = $_POST['senha'];

        // Chama o Método cadastrar da classe usuário que esta no modelo usuario
        $resultado = Usuario::login($email,$senha);
        // Se o cadastro for bem sucedido retorna true
        if($resultado === true){
            // Redireciona o usuário para a página de login com uma mensagem 
            header("Location: ".BASE_URL."index.php");
        }else{
            header("Location: ".BASE_URL."visoes/login.php?msg=Email ou senha errados!");
        }
    }
}

// Código para sair do sistema 
elseif(isset($_GET['acao']) && $_GET['acao'] == 'logout'){
    // Chama o metodo logout do modelo 
    Usuario::logout();

    // Redireciona apos sair do sistema
    header("Location: ".BASE_URL."index.php");
}