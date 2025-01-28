<?php
// Chama configuração do banco de dados
require_once '../configuracao.php';
// Chama o modelo Exercicio
require_once '../modelos/Exercicio.php';

// Cadastro de exercícios
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'cadastrar'){
    // Captura os valores que vão vir do formulário
    $nome = $_POST['nome'];
    $grupo_muscular = $_POST['grupo_muscular'];
    $descricao = $_POST['descricao'];

    $diretorioImagem = '../uploads/imagem/';
    $diretorioVideo = '../uploads/video/';

    // Lógica para subir imagem
    $imagem = null;

    if(!empty($_FILES['imagem']['name'])){
        $nomeImagem = uniqid().'_'.basename($_FILES['imagem']['name']);
        $caminhoImagem = $diretorioImagem.$nomeImagem;
        move_uploaded_file($_FILE['imagem']['tmp_name'], $caminhoImagem);
        $imagem = 'uploads/imagens/'.$nomeImagem;
    }

    $video = null;
    if(!empty($_FILES['video']['name'])){
        $nomeVideo = uniqid().'_'.basename($_FILES['video']['name']);
        $caminhoVideo = $diretorioVideo.$nomeVideo;
        move_uploaded_file($_FILE['video']['tmp_name'], $caminhoVideo);
        $video = 'uploads/videos/'.$nomeVideo;
    }

    if(Exercicio::cadastrar($nome,$grupo_muscular,$descricao,$imagem,$video)){
        header("Location: ../visoes/cadastro_exercicio.php?msg=Cadastrado!");
    }else{
        header("Location: ../visoes/cadastro_exercicio.php?msg=Erro ao Cadastrar!");
    }
}