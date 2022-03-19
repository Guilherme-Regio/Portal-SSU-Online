<?php
session_start();
if (isset($_SESSION['user'])) :
    include ("banco-software.php");
    include __DIR__ . "/../configuracoes/conecta.php";
    $software_alterar = mysqli_real_escape_string($conexao, $_POST['software_alterar']);
    $tipo_de_licenciamento_alterar = mysqli_real_escape_string($conexao, $_POST['tipo_de_licenciamento_alterar']);
    $qtd_usada_alterar = mysqli_real_escape_string($conexao, $_POST['qtd_usada_alterar']);
    $qtd_pedida_alterar = mysqli_real_escape_string($conexao, $_POST['qtd_pedida_alterar']);
    $qtd_fornecida_alterar = mysqli_real_escape_string($conexao, $_POST['qtd_fornecida_alterar']);
    $key_user_alterar = mysqli_real_escape_string($conexao, $_POST['key_user_alterar']);
    $gerente_alterar = mysqli_real_escape_string($conexao, $_POST['gerente_alterar']);
    $vp_alterar = mysqli_real_escape_string($conexao, $_POST['vp_alterar']);
    $valor_alterar = mysqli_real_escape_string($conexao, $_POST['valor_alterar']);
    $descricao_alterar = mysqli_real_escape_string($conexao, $_POST['descricao_alterar']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    if (updateSoftware($conexao, $software_alterar, $tipo_de_licenciamento_alterar, $qtd_usada_alterar, $qtd_pedida_alterar, $qtd_fornecida_alterar, $key_user_alterar, $gerente_alterar, $vp_alterar, $valor_alterar, $descricao_alterar, $id)) {
        echo ("<script>
        window.alert('Alteração Concluida')
        window.location.href='software-lista.php';
        </script>");
    };
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
