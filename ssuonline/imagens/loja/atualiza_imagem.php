<?php
session_start();
if (isset($_SESSION['user'])) :
    include ("banco_imagem.php");
    include __DIR__ . "/../../configuracoes/conecta.php";
    $nome_imagem_alt = mysqli_real_escape_string($conexao, $_POST['nome_imagem_alterar']);
    $departamento_alt = mysqli_real_escape_string($conexao, $_POST['departamento_alterar']);
    $descricao_alt = mysqli_real_escape_string($conexao, $_POST['descricao_alterar']);
    $versao_alt = mysqli_real_escape_string($conexao, $_POST['versao_alterar']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    if (updateImagem($conexao, $nome_imagem_alt, $departamento_alt, $descricao_alt, $versao_alt, $id)) {
        echo ("<script>
        window.alert('Alteração Concluida')
        window.location.href='listar-loja.php';
        </script>");
    };
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
