<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) :
    include("banco-acesso.php");
    include("conecta.php");
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    include __DIR__ . "/../portal/banco-software.php";
?>
    <?php
    if (verificaRat()) {
    }
    $id = $_GET['id'];
    $produto = buscaSoftware($conexao, $id);
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <br></br>
    <!-- ALTERAR OS CAMPOS PARA ENVIAR AS INFORMAÇÕES PARA A RAT GERAL -- PAREI AQUI -->
    <!-- Formulário para alterar a RAT e imprimir -->
    <form class="container" action="/portal/atualiza-software.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="form-row">
            <!-- Campo do Status do Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="software_alterar">Software</label>
                <input type="text" name="software_alterar" class="form-control" id="software_alterar" placeholder="Software" value="<?= ($produto['escopo']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="tipo_de_licenciamento_alterar">Tipo de Licenciamento</label>
                <input type="text" name="tipo_de_licenciamento_alterar" class="form-control" id="tipo_de_licenciamento_alterar" placeholder="Tipo de Licenciamento" value="<?= ($produto['tipo_de_licenciamento']) ?>" required>
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="qtd_usada_alterar">Quantidade em Uso</label>
                <input type="number" name="qtd_usada_alterar" class="form-control" id="qtd_usada_alterar" placeholder="Quantidade em Uso" value="<?= ($produto['qtd_usada']) ?>" required>
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="qtd_pedida_alterar">Quantidade Pedida</label>
                <input type="number" name="qtd_pedida_alterar" class="form-control" id="qtd_pedida_alterar" placeholder="Quantidade Pedida" value="<?= ($produto['qtd_pedida']) ?>" required>
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="qtd_fornecida_alterar">Quantidade Orçada</label>
                <input type="number" name="qtd_fornecida_alterar" class="form-control" id="qtd_fornecida_alterar" placeholder="Quantidade Orçamentada" value="<?= ($produto['qtd_fornecida']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="key_user_alterar">Key User</label>
                <input type="text" name="key_user_alterar" class="form-control" id="key_user_alterar" placeholder="Key User" value="<?= ($produto['key_user']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="gerente_alterar">Gerente</label>
                <input type="text" name="gerente_alterar" class="form-control" id="gerente_alterar" placeholder="Gerente" value="<?= ($produto['gerente']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="vp_alterar">VP da licença</label>
                <input type="text" name="vp_alterar" class="form-control" id="vp_alterar" placeholder="VP da Licença" value="<?= ($produto['vp']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="valor_alterar">Valor da Licença</label>
                <input type="text" name="valor_alterar" class="form-control" id="valor_alterar" placeholder="Valor da Licença" value="<?= ($produto['valor']) ?>" required>
            </div>
            <div class="form-group col-md-12 char">
                <label class="label" for="descricao_alterar">Descrição</label>
                <input type="text" name="descricao_alterar" class="form-control" id="descricao_alterar" placeholder="Valor da Licença" value="<?= ($produto['descricao']) ?>" required>
            </div>
            <script type="text/javascript">
                $("#valor_alterar").mask("#.##0,00", {
                    reverse: true
                });
            </script>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button class="btn btn-primary" type="submit" data-tt="tooltip" data-placement="bottom" title="Salvar" style="background: #3a3f48; border-color:#3a3f48;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Botão para Salvar o Formulario -->
        </div>

    </form>


    <?php include("footer.php"); ?>
<?php
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>