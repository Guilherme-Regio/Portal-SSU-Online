<?php 
include __DIR__ . "/../html.php";
include __DIR__ . "/../configuracoes/conecta.php";
include("banco-entrada-estoque-xml.php"); ?>

<?php
if (!empty($_FILES['arquivo']['tmp_name'])) {
    $arquivos = new DomDocument();
    $arquivos->load($_FILES['arquivo']['tmp_name']);
    $linhas = $arquivos->getElementsByTagName("Row");
    $primeira_linha = true;
    foreach ($linhas as $linha) {
        if ($primeira_linha == false) {
            $Status = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
            $localidade = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
            $ativo = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
            $Serie = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
            $Modelo = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
            $Sistema = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
            $processador = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
            $Data_Aquisicao = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
            $Garantia_do_Equipamento = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
            $Nota = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
            $Tecnico = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
            if (insereEstoque($conexao, $Status, $localidade, $ativo, $Serie, $Modelo, $Sistema, $processador, $Data_Aquisicao, $Garantia_do_Equipamento, $Nota, $Tecnico)) { ?>
                <p class="text-success">O cadastro do(a) colaborador(a) <?= $ativo; ?>, foi realizado com sucesso!</p>
<?php
            };
        };
        $primeira_linha = false;
    };
};
?>
<?php include __DIR__ . "/../footer.php"; ?>