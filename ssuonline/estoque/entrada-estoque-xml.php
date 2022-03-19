<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../configuracoes/banco-acesso.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    if (verificaEstoque()) {
    };
?>
    
    <div class="container">
        <form accept-charset="utf-8" class="container " action="add-entrada-estoque-xml.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="arquivo" id="arquivo" required>
                        <label class="custom-file-label " for="arquivo">Selecione o Arquivo XML</label>
                        <br></br>
                        <button class="btn btn--radius btn--green" type="submit">Enviar</button>
                        <a class="btn btn-primary" href="https://localhost/rdtech/download/cadastro_de_equipamentos.xml" download>Download</a>
                    </div>
                </div>
            </div>
        </form>
        <?php include __DIR__ . "/../footer.php"; ?>
    <?php

else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

    ?>