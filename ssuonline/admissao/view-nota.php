<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../html.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    include("banco-admissao.php"); ?>

    <!--  ALTERA PRODUTOS DA EMISSÃO DE NOTAS -->
    <?php
    $nome_colaborador_alt = mysqli_real_escape_string($conexao, $_POST['nome_colaborador_alterar']);
    $data_admissao_alt = mysqli_real_escape_string($conexao, $_POST['data_admissao_alterar']);
    $cpf_colaborador_alt = mysqli_real_escape_string($conexao, $_POST['cpf_colaborador_alterar']);
    $rua_alt = mysqli_real_escape_string($conexao, $_POST['rua_alterar']);
    $numero_alt = mysqli_real_escape_string($conexao, $_POST['numero_alterar']);
    $complemento_alt = mysqli_real_escape_string($conexao, $_POST['complemento_alterar']);
    $cep_alt = mysqli_real_escape_string($conexao, $_POST['cep_alterar']);
    $bairro_alt = mysqli_real_escape_string($conexao, $_POST['bairro_alterar']);
    $cidade_alt = mysqli_real_escape_string($conexao, $_POST['cidade_alterar']);
    $uf_alt = mysqli_real_escape_string($conexao, $_POST['uf_alterar']);
    $equipamento_alt = mysqli_real_escape_string($conexao, $_POST['equipamento_alterar']);
    $ativo_alt = mysqli_real_escape_string($conexao, $_POST['ativo_alterar']);
    $numero_serie_alt = mysqli_real_escape_string($conexao, $_POST['numero_serie_alterar']);
    $valor_alt = mysqli_real_escape_string($conexao, $_POST['valor_alterar']);
    $nota_fiscal_alt = mysqli_real_escape_string($conexao, $_POST['nota_fiscal_alterar']);
    $codigo_rastreio_alt = mysqli_real_escape_string($conexao, $_POST['codigo_rastreio_alterar']);
    $analista_rh_alt = mysqli_real_escape_string($conexao, $_POST['analista_rh_alterar']);
    $chamado_alt = mysqli_real_escape_string($conexao, $_POST['chamado_alterar']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);

    ?>
    <!--  QUERY RESPONSÁVEL POR ATUALIZAR OS DADOS DA EMISSÃO DE NOTAS -->
    <?php
    if (atualizaNota(
        $conexao,
        $nome_colaborador_alt,
        $data_admissao_alt,
        $cpf_colaborador_alt,
        $rua_alt,
        $numero_alt,
        $complemento_alt,
        $cep_alt,
        $bairro_alt,
        $cidade_alt,
        $uf_alt,
        $equipamento_alt,
        $ativo_alt,
        $numero_serie_alt,
        $valor_alt,
        $nota_fiscal_alt,
        $codigo_rastreio_alt,
        $analista_rh_alt,
        $chamado_alt,
        $id
    )) { ?>
        <p class="text-success">O endereço do <?= $nome_colaborador_alt; ?>,foi atualizado com sucesso!</p>


    <?php } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="text-danger">O equipamento <?= $ativo_alt; ?> não foi adicionado: <?= $msg ?></p>


    <?php
    }


    ?>
<?php include __DIR__ . "/../footer.php";
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
?>