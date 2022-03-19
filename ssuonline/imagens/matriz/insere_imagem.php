<?php
session_start();
if (isset($_SESSION['user'])) :
    include("banco_imagem.php");
    include __DIR__ . "/../../configuracoes/conecta.php";
    $_FILES['arquivo'];
    $nomedoArquivo = $_FILES['arquivo']['name'];
    $caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];
    $caminhoSalvar = 'imagem/';
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao_img']);
    $versao = mysqli_real_escape_string($conexao, $_POST['versao']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome_imagem']);
    $departamento = mysqli_real_escape_string($conexao, $_POST['departamento']);
    $caminho = 'imagem/' . $nomedoArquivo;
    move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar . $nomedoArquivo);
    if (inseriImagem($conexao, $nome, $versao, $descricao, $departamento, $caminho)) {
        echo ("<script>
        window.alert('Upload Concluido!')
        window.location.href='listar-matriz.php';
        </script>");
    };
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
