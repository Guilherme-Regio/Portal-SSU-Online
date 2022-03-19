<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../html.php";
    include __DIR__ . "/banco-admissao.php";
    include __DIR__ . "/../configuracoes/conecta.php"; ?>

    <!--  ALTERA PRODUTOS -->
    <?php

    $nome_colaborador_alt = mysqli_real_escape_string($conexao, $_POST['nome_colaborador_alterar']);
    $cpf_colaborador_alt = mysqli_real_escape_string($conexao, $_POST['cpf_colaborador_alterar']);
    $cargo_alt = mysqli_real_escape_string($conexao, $_POST['cargo_alterar']);
    $departamento_alt = mysqli_real_escape_string($conexao, $_POST['departamento_alterar']);
    $gestor_alt = mysqli_real_escape_string($conexao, $_POST['gestor_alterar']);
    $email_gestor_alt = mysqli_real_escape_string($conexao, $_POST['email_gestor_alterar']);
    $vp_alt = mysqli_real_escape_string($conexao, $_POST['id_categoria']);
    $diretoria_alt = mysqli_real_escape_string($conexao, $_POST['id_sub_categoria']);
    $data_admissao_alt = mysqli_real_escape_string($conexao, $_POST['data_admissao_alterar']);
    $regime_contratacao_alt = mysqli_real_escape_string($conexao, $_POST['regime_contratacao_alterar']);
    $analista_rh_alt = mysqli_real_escape_string($conexao, $_POST['analista_rh_alterar']);
    $matricula_alt = mysqli_real_escape_string($conexao, $_POST['matricula_alterar']);
    $tipo_de_entrega_alt = mysqli_real_escape_string($conexao, $_POST['tipo_de_entrega_alterar']);
    $cep_alt = mysqli_real_escape_string($conexao, $_POST['cep_alterar']);
    $uf_alt = mysqli_real_escape_string($conexao, $_POST['uf_alterar']);
    $cidade_alt = mysqli_real_escape_string($conexao, $_POST['cidade_alterar']);
    $bairro_alt = mysqli_real_escape_string($conexao, $_POST['bairro_alterar']);
    $rua_alt = mysqli_real_escape_string($conexao, $_POST['rua_alterar']);
    $numero_alt = mysqli_real_escape_string($conexao, $_POST['numero_alterar']);
    $complemento_alt = mysqli_real_escape_string($conexao, $_POST['complemento_alterar']);
    $sri_equipamento_alt = mysqli_real_escape_string($conexao, $_POST['sri_equipamento_alterar']);
    $sistema_operacional_alt = mysqli_real_escape_string($conexao, $_POST['sistema_operacional_alterar']);
    $infomacao_adicional_alt = mysqli_real_escape_string($conexao, $_POST['infomacao_adicional_alterar']);
    $tipo_de_vaga_alt = mysqli_real_escape_string($conexao, $_POST['tipo_de_vaga_alterar']);
    $equipamento_alt = mysqli_real_escape_string($conexao, $_POST['equipamento_alterar']);
    $ativo_alt = mysqli_real_escape_string($conexao, $_POST['ativo_alterar']);
    $numero_serie_alt = mysqli_real_escape_string($conexao, $_POST['numero_serie_alterar']);
    $login_alt = mysqli_real_escape_string($conexao, $_POST['login_alterar']);
    $senha_alt = mysqli_real_escape_string($conexao, $_POST['senha_alterar']);
    $email_alt = mysqli_real_escape_string($conexao, $_POST['email_alterar']);
    $status_alt = mysqli_real_escape_string($conexao, $_POST['status_alterar']);
    $substituicao1_1_alt = mysqli_real_escape_string($conexao, $_POST['substituicao1_1_alterar']);
    $substituicao2_2_alt = mysqli_real_escape_string($conexao, $_POST['substituicao2_2_alterar']);
    $recolhimento1_1_alt = mysqli_real_escape_string($conexao, $_POST['recolhimento1_1_alterar']);
    $enviar_email = mysqli_real_escape_string($conexao, $_POST['enviar_email']);
    $endereco_alt = mysqli_real_escape_string($conexao, "CEP: {$cep_alt}, ESTADO: {$uf_alt}, CIDADE: {$cidade_alt}, BAIRRO: {$bairro_alt}, ENDEREÇO: {$rua_alt}, NUMERO: {$numero_alt} e COMPLEMENTO: {$complemento_alt}");
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $status_equipamento = mysqli_real_escape_string($conexao, 'Em uso');
    if ($enviar_email === "Enviar"){
       require __DIR__.'/../email.php';
    };
    if ($ativo_alt != "") {
        if (buscaAtivo($conexao, $ativo_alt)) {
            if (insereRat($conexao, $status_equipamento, $nome_colaborador_alt, $cpf_colaborador_alt, $cargo_alt, $departamento_alt, $gestor_alt, $diretoria_alt, $vp_alt, $analista_rh_alt, $data_admissao_alt, $regime_contratacao_alt, $tipo_de_entrega_alt, $tipo_de_vaga_alt, $endereco_alt, $ativo_alt)) { ?>
                <p class="text-success">O equipamento do usuário <?= $nome_colaborador_alt; ?>,foi adicionado com sucesso no banco geral!</p>
            <?php } else {
                $msg = mysqli_error($conexao);
            ?>
                <p class="text-danger">O equipamento <?= $ativo_alt; ?> não foi adicionado! <?= $msg ?></p>
                <?php
            }
            if ($_POST['tipo_de_entrega_alterar'] == "Delivery") {
                if (atualizaAtivo($conexao, $nome_colaborador_alt, $ativo_alt, $numero_serie_alt)) { ?>
                    <p class="text-success">O equipamento do usuário <?= $nome_colaborador_alt; ?>,foi adicionado com sucesso na lista emissão de notas!</p>
                <?php } else {
                    $msg = mysqli_error($conexao);
                ?>
                    <p class="text-danger">O equipamento <?= $ativo_alt; ?> não foi adicionado! <?= $msg ?></p>
            <?php
                }
            }
        } else {
            ?>
            <p class="text-danger">O equipamento <?= $ativo_alt; ?> não foi adicionado no banco geral, ativo não encontrado!</p>

        <?php
        }
    };
    if (insereAdmissao(
        $conexao,
        $status_alt,
        $nome_colaborador_alt,
        $cpf_colaborador_alt,
        $cargo_alt,
        $departamento_alt,
        $gestor_alt,
        $email_gestor_alt,
        $diretoria_alt,
        $vp_alt,
        $analista_rh_alt,
        $data_admissao_alt,
        $regime_contratacao_alt,
        $matricula_alt,
        $tipo_de_entrega_alt,
        $tipo_de_vaga_alt,
        $ativo_alt,
        $numero_serie_alt,
        $cep_alt,
        $uf_alt,
        $cidade_alt,
        $bairro_alt,
        $rua_alt,
        $numero_alt,
        $complemento_alt,
        $sri_equipamento_alt,
        $sistema_operacional_alt,
        $infomacao_adicional_alt,
        $login_alt,
        $senha_alt,
        $email_alt,
        $substituicao1_1_alt,
        $substituicao2_2_alt,
        $recolhimento1_1_alt,
        $id
    )) { ?>
        <p class="text-success">O equipamento do usuário <?= $nome_colaborador_alt; ?>,foi adicionado com sucesso no banco Admissão!</p>


    <?php } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="text-danger">O equipamento <?= $ativo_alt; ?> não foi adicionado: <?= $msg ?></p>


    <?php
    }


    ?>
<?php include __DIR__."/../footer.php";
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>