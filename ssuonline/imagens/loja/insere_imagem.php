<?php
session_start();
if (isset($_SESSION['user'])) :
    include ("banco_imagem.php");
    include __DIR__ . "/../../configuracoes/conecta.php";
    $_FILES['arquivo'];
    $nomedoArquivo = $_FILES['arquivo']['name'];
    $caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];
    $caminhoSalvar = './';
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao_img']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome_imagem']);
    $versao = mysqli_real_escape_string($conexao, $_POST['versao']);
    $departamento = mysqli_real_escape_string($conexao, $_POST['departamento']);
    $caminho = 'imagem/' . $nomedoArquivo;
    move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar . $nomedoArquivo);
    if (inseriImagem($conexao, $nome, $versao, $descricao, $departamento, $caminho)) {
        echo ("<script>
        window.alert('Upload Concluido!')
        window.location.href='listar-loja.php';
        </script>");
    };
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
