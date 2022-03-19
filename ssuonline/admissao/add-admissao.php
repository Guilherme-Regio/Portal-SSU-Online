<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../html.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    include("banco-admissao.php"); ?>
    <?php
    $nome_colaborador = $_POST['nome_colaborador'];
    $cpf_colaborador = $_POST['cpf_colaborador'];
    $cargo = $_POST['cargo'];
    $departamento = $_POST['departamento'];
    $gestor = $_POST['gestor'];
    $email_gestor = $_POST['email_gestor'];
    $vp = $_POST['id_categoria'];
    $diretoria = $_POST['id_sub_categoria'];
    $data_admissao = $_POST['data_admissao'];
    $regime_contratacao = $_POST['regime_contratacao'];
    $analista_rh = $_POST['analista_rh'];
    $matricula = $_POST['matricula'];
    $tipo_de_entrega = $_POST['tipo_de_entrega'];
    $cep = $_POST['cep'];
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $sri_equipamento = $_POST['sri_equipamento'];
    $sistema_operacional = $_POST['sistema_operacional'];
    $infomacao_adicional = $_POST['infomacao_adicional'];
    $tipo_de_vaga = $_POST['tipo_de_vaga'];
    $substituicao1_1 = $_POST['substituicao1_1'];
    $substituicao2_2 = $_POST['substituicao2_2'];
    $efetivacao1_1 = $_POST['efetivacao1_1'];
    $movimentacao1_1 = $_POST['movimentacao1_1'];
    $temporario1_1 = $_POST['temporario1_1'];
    $substituicao_loop_loop = $_POST['substituicao_loop_loop'];
    $recolhimento1_1 = $_POST['recolhimento1_1'];
    $status = $_POST['status'];
    $data_atual = date('d/m/Y H:i');

    if (insereLicencas($conexao, $nome_colaborador, $cpf_colaborador, $cargo, $departamento, $gestor, $email_gestor, $vp, $diretoria, $data_admissao, $regime_contratacao, $analista_rh, $matricula, $tipo_de_entrega, $cep, $uf, $cidade, $bairro, $rua, $numero, $complemento, $sri_equipamento, $sistema_operacional, $infomacao_adicional, $tipo_de_vaga, $substituicao1_1, $substituicao2_2, $efetivacao1_1, $movimentacao1_1, $temporario1_1, $substituicao_loop_loop, $status, $data_atual)) { ?>
        <p class="text-success">O cadastro do(a) colaborador(a) <?= $nome_colaborador; ?>, foi realizado com sucesso na lista de Admissão!</p>
    <?php } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="text-danger">O(a) colaborador(a) <?= $nome_colaborador; ?> não foi cadastrado na lista de Admissão!<?= $msg ?></p>
    <?php
    }
    ?>
    <?php
    if ($_POST['tipo_de_entrega'] == "Delivery") {
        if (insereNota($conexao, $nome_colaborador, $data_admissao, $cpf_colaborador, $rua, $numero, $complemento, $cep, $bairro, $cidade, $uf, $analista_rh)) { ?>
            <p class="text-success">O cadastro do(a) colaborador(a) <?= $nome_colaborador; ?>, foi realizado com sucesso na emissão de notas!</p>

        <?php } else {
            $msg = mysqli_error($conexao);
        ?>
            <p class="text-danger">O(a) colaborador(a) <?= $nome_colaborador; ?> não foi cadastrado na emissão de notas!<?= $msg ?></p>
    <?php
        }
    }
    ?>


<?php include __DIR__ . "/../footer.php";
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif; ?>