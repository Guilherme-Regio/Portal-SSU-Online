<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../html.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    include ("banco-entrada-estoque.php"); ?>
    <?php
    $status_equipamento = $_POST['status_equipamento'];
    $localidade = $_POST['localidade'];
    $ativo = $_POST['ativo'];
    $numero_serie = $_POST['numero_serie'];
    $modelo_equipamento = $_POST['modelo_equipamento'];
    $sistema_operacional = $_POST['sistema_operacional'];
    $processador = $_POST['processador'];
    $data_aquisicao = $_POST['data_aquisicao'];
    $garantia_equipamento = $_POST['garantia_equipamento'];
    $analista_ssu = $_POST['analista_ssu'];
    $nota_fiscal_equipamento = $_POST['nota_fiscal_equipamento'];


    if (insereEstoque($conexao, $status_equipamento, $localidade, $ativo, $numero_serie, $modelo_equipamento, $sistema_operacional, $processador, $data_aquisicao, $garantia_equipamento, $nota_fiscal_equipamento, $analista_ssu)) { ?>
        <p class="text-success">O equipamento <?= $ativo; ?>, foi cadastrado com sucesso!</p>
    <?php } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="text-danger">O equipamento <?= $ativo; ?> não foi cadastrado: <?= $msg ?></p>
    <?php
    }
    ?>
<?php include __DIR__ . "/../footer.php";
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
?>