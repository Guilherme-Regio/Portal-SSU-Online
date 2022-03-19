<?php session_start(); ?>
<?php
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../configuracoes/banco-acesso.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    if (verificaAdmissao()) {
    };
?>
    <?php
    include("banco-admissao.php");

    $id = $_GET['id'];
    $produto = buscaNota($conexao, $id);
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <form class="display nowrap" action="view-nota.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="form-row">
            <div class="form-group col-md-3 char">
                <label class="label" for="nome_colaborador_alterar">Nome Completo do Colaborador</label>
                <input type="text" name="nome_colaborador_alterar" class="form-control" id="nome_colaborador_alterar" placeholder="Nome do Colaborador" value="<?= ($produto['nome_colaborador']) ?>" required>
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="data-admissao">Data de Admissão</label>
                <div class="input-group date" data-date-format="dd/mm/aaaa">
                    <input type="text" class="form-control" placeholder="dd/mm/aaaa" id="data_admissao_alterar" name="data_admissao_alterar" value="<?= ($produto['data_admissao']) ?>" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'> </script>
            <script>
                $("#data_admissao_alterar").mask("00/00/0000");
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>
            <div class="form-group col-md-3 char">
                <label class="label" for="cpf_colaborador_alterar">Cadastro de Pessoa Física</label>
                <input type="text" name="cpf_colaborador_alterar" class="form-control" id="cpf_colaborador_alterar" placeholder="CPF do Colaborador" value="<?= ($produto['cpf_colaborador']) ?>" required>
            </div>
            <script type="text/javascript">
                $("#cpf_colaborador_alterar").mask("000.000.000-00");
            </script>
            <script>
                $(document).ready(function() {

                    function limpa_formulário_cep() {
                        // Limpa valores do formulário de cep.
                        $("#rua_alterar").val("");
                        $("#bairro_alterar").val("");
                        $("#cidade_alterar").val("");
                        $("#uf_alterar").val("");
                    }

                    //Quando o campo cep perde o foco.
                    $("#cep_alterar").blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            //Valida o formato do CEP.
                            if (validacep.test(cep)) {

                                //Preenche os campos com "..." enquanto consulta webservice.
                                $("#rua_alterar").val("...");
                                $("#bairro_alterar").val("...");
                                $("#cidade_alterar").val("...");
                                $("#uf_alterar").val("...");

                                //Consulta o webservice viacep.com.br/
                                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                    if (!("erro" in dados)) {
                                        //Atualiza os campos com os valores da consulta.
                                        $("#rua_alterar").val(dados.logradouro);
                                        $("#bairro_alterar").val(dados.bairro);
                                        $("#cidade_alterar").val(dados.localidade);
                                        $("#uf_alterar").val(dados.uf);
                                    } //end if.
                                    else {
                                        //CEP pesquisado não foi encontrado.
                                        limpa_formulário_cep();
                                        alert("CEP não encontrado, tente novamente ou digite manualmente.");
                                    }
                                });
                            } //end if.
                            else {
                                //cep é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } //end if.
                        else {
                            //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    });
                });
            </script>
            <!-- Campo do Endereço-->
            <div class="form-group col-md-4 char">
                <label class="label" for="rua_alterar">Endereço</label>
                <input type="text" name="rua_alterar" class="form-control" id="rua_alterar" placeholder="Endereço" value="<?= ($produto['rua']) ?>" required>
            </div>
            <!-- Campo do Número da Residência -->
            <div class="form-group col-md-1 char">
                <label class="label" for="numero_alterar">Número</label>
                <input type="text" name="numero_alterar" class="form-control" id="numero_alterar" placeholder="Número" value="<?= ($produto['numero']) ?>" required>
            </div>
            <!-- Campo do Complemento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="complemento_alterar">Complemento</label>
                <input type="text" name="complemento_alterar" class="form-control" id="complemento_alterar" placeholder="Complemento" value="<?= ($produto['complemento']) ?>">
            </div>
            <!-- Campo do CEP-->
            <div class="form-group col-md-2 char">
                <label class="label" for="cep_alterar">CEP</label>
                <input type="text" name="cep_alterar" class="form-control" id="cep_alterar" placeholder="CEP" maxlength="9" value="<?= ($produto['cep']) ?>" required>
            </div>
            <script type="text/javascript">
                $("#cep_alterar").mask("00000-000");
            </script>
            <!-- Campo do Bairro-->
            <div class="form-group col-md-3 char">
                <label class="label" for="bairro_alterar">Bairro</label>
                <input type="text" name="bairro_alterar" class="form-control" id="bairro_alterar" placeholder="Bairro" value="<?= ($produto['bairro']) ?>" required>
            </div>
            <!-- Campo do Cidade-->
            <div class="form-group col-md-3 char">
                <label class="label" for="cidade_alterar">Cidade</label>
                <input type="text" name="cidade_alterar" class="form-control" id="cidade_alterar" placeholder="Cidade" value="<?= ($produto['cidade']) ?>" required>
            </div>
            <!-- Campo do Estado-->
            <div class="form-group col-md-2 char">
                <label class="label" for="uf_alterar">Estado</label>
                <input type="text" name="uf_alterar" class="form-control" id="uf_alterar" placeholder="Estado" value="<?= ($produto['uf']) ?>" required>
            </div>
            <!-- Campo do Equipamento-->
            <div class="form-group col-md-2 char">
                <label class="label" for="equipamento_alterar">Equipamento</label>
                <input class="form-control" type="text" id="equipamento_alterar" placeholder="Equipamento" name="equipamento_alterar" value="<?= ($produto['equipamento']) ?>">
            </div>
            <!-- Campo do Ativo-->
            <div class="form-group col-md-2 char">
                <label class="label" for="ativo_alterar">Ativo</label>
                <input class="form-control" type="text" id="ativo_alterar" placeholder="Ativo" name="ativo_alterar" maxlength="9" readonly pattern="\d*" value="<?= ($produto['ativo']) ?>">
            </div>
            <!-- Campo do Número de Série-->
            <div class="form-group col-md-2 char">
                <label class="label" for="numero_serie_alterar">Número de Série</label>
                <input class="form-control" type="texts" id="numero_serie_alterar" placeholder="Número de Série" name="numero_serie_alterar" readonly value="<?= ($produto['numero_serie']) ?>">
            </div>
            <!-- Campo do Valor-->
            <div class="form-group col-md-2 char">
                <label class="label" for="valor_alterar">Valor</label>
                <input class="form-control" type="texts" id="valor_alterar" placeholder="Valor" name="valor_alterar" value="<?= ($produto['valor']) ?>">
            </div>
            <!-- Campo do Nota Fiscal -->
            <div class="form-group col-md-2 char">
                <label class="label" for="nota_fiscal_alterar">Nota Fiscal</label>
                <input class="form-control" type="texts" id="nota_fiscal_alterar" placeholder="Nota Fiscal" name="nota_fiscal_alterar" value="<?= ($produto['nota_fiscal']) ?>">
            </div>
            <!-- Campo do Código de Rastreio -->
            <div class="form-group col-md-3 char">
                <label class="label" for="codigo_rastreio_alterar">Código de Rastreio</label>
                <input class="form-control" type="texts" id="codigo_rastreio_alterar" placeholder="Código de Rastreio" name="codigo_rastreio_alterar" value="<?= ($produto['codigo_rastreio']) ?>">
            </div>
            <!-- Campo Analista -->
            <div class="form-group col-md-3 char">
                <label class="label" for="analista_rh_alterar">Analista Responsável</label>
                <input type="text" name="analista_rh_alterar" class="form-control" id="analista_rh_alterar" placeholder="Analista Responsável" value="<?= ($produto['analista_rh']) ?>">
            </div>
            <!-- Campo Analista -->
            <div class="form-group col-md-3 char">
                <label class="label" for="chamado_alterar">Chamado</label>
                <input type="text" name="chamado_alterar" class="form-control" id="chamado_alterar" placeholder="Chamado" value="<?= ($produto['chamado']) ?>">
            </div>
            <!-- Botão para Salvar o Formulario -->
            <!-- Botão Salvar -->
            </div>
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
        </div>

    </form>


    <?php include __DIR__ . "/../footer.php"; ?>
<?php

else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>