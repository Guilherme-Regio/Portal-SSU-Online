<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../html.php";
    include __DIR__ . "/../rat/banco-produto.php";
    include __DIR__ . "/../configuracoes/conecta.php"; ?>

    <!--  ALTERA PRODUTOS -->
    <?php
    $status_equipamento_alt = mysqli_real_escape_string($conexao, $_POST['status_equipamento_alterar']);
    $localidade_alt = mysqli_real_escape_string($conexao, $_POST['localidade_alterar']);
    $ativo_alt = mysqli_real_escape_string($conexao, $_POST['ativo_alterar']);
    $numero_serie_alt = mysqli_real_escape_string($conexao, $_POST['numero_serie']);
    $modelo_equipamento_alt = mysqli_real_escape_string($conexao, $_POST['modelo_equipamento']);
    $sistema_operacional_alt = mysqli_real_escape_string($conexao, $_POST['sistema_operacional']);
    $processador_alt = mysqli_real_escape_string($conexao, $_POST['processador']);
    $data_aquisicao_alt = mysqli_real_escape_string($conexao, $_POST['data_aquisicao']);
    $garantia_equipamento_alt = mysqli_real_escape_string($conexao, $_POST['garantia_equipamento']);
    $nome_colaborador_alt = mysqli_real_escape_string($conexao, $_POST['nome_colaborador']);
    $cpf_colaborador_alt = mysqli_real_escape_string($conexao, $_POST['cpf_colaborador']);
    $cargo_alt = mysqli_real_escape_string($conexao, $_POST['cargo']);
    $departamento_alt = mysqli_real_escape_string($conexao, $_POST['departamento']);
    $gestor_alt = mysqli_real_escape_string($conexao, $_POST['gestor']);
    $diretoria_alt = mysqli_real_escape_string($conexao, $_POST['id_sub_categoria']);
    $vp_alt = mysqli_real_escape_string($conexao, $_POST['id_categoria']);
    $mochila_alt = mysqli_real_escape_string($conexao, $_POST['mochila']);
    $analista_rh_alt = mysqli_real_escape_string($conexao, $_POST['analista_rh']);
    $data_admissao_alt = mysqli_real_escape_string($conexao, $_POST['data_admissao']);
    $regime_contratacao_alt = mysqli_real_escape_string($conexao, $_POST['regime_contratacao']);
    $tipo_de_vaga = mysqli_real_escape_string($conexao, $_POST['tipo_de_vaga']);
    $software_licenciado_alt = mysqli_real_escape_string($conexao, $_POST['software_licenciado']);
    $analista_ssu_alt = mysqli_real_escape_string($conexao, $_POST['analista_ssu']);
    $analista_ssu_atual_alt = mysqli_real_escape_string($conexao, $_POST['analista_ssu_atual']);
    $versao_office_alt = mysqli_real_escape_string($conexao, $_POST['versao_office']);
    $licenca_office_alt = mysqli_real_escape_string($conexao, $_POST['licenca_office']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
    $endereco_colaborador = mysqli_real_escape_string($conexao, $_POST['endereco_colaborador']);
    $dataop = date('Y/m/d');

    if (atualizarControle(
        $conexao,
        $status_equipamento_alt,
        $localidade_alt,
        $nome_colaborador_alt,
        $cpf_colaborador_alt,
        $cargo_alt,
        $departamento_alt,
        $gestor_alt,
        $diretoria_alt,
        $vp_alt,
        $mochila_alt,
        $analista_rh_alt,
        $data_admissao_alt,
        $regime_contratacao_alt,
        $tipo_de_vaga,
        $software_licenciado_alt,
        $analista_ssu_atual_alt,
        $versao_office_alt,
        $licenca_office_alt,
        $observacao,
        $dataop,
        $endereco_colaborador,
        $id
    )) {
        echo ("<script>
        window.alert('Cadastrado com Sucesso!')
        window.location.href='altera-form-produto.php?id=$id';
        </script>"); ?>


    <?php } else {
        $msg = mysqli_error($conexao);
        echo ("<script>
        window.alert('Não foi possivel Cadastrar!')
        window.location.href='altera-form-produto.php?id=$id';
        </script>");
    ?>

    <?php
    }
    if (inseriHistorico($conexao, $nome_colaborador_alt, $analista_ssu_atual_alt, $dataop, $ativo_alt))
    ?>
<?php include __DIR__ . "/../footer.php";
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
?>