<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../configuracoes/banco-acesso.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    if (verificaRHadmissao()) {
    };
?>
    <?php
    include("banco-admissao.php");

    $id = $_GET['id'];
    $produto = buscaAdmissao($conexao, $id);
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- ALTERAR OS CAMPOS PARA ENVIAR AS INFORMAÇÕES PARA A RAT GERAL -- PAREI AQUI -->
    <!-- Formulário para alterar a RAT e imprimir -->
    <form class="display nowrap" action="view-admissao.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="form-row">
            <!-- Campo do Status do Equipamento -->
            <div class="form-group col-md-4 char">
                <label class="label" for="nome_colaborador_alterar">Nome Completo do Colaborador</label>
                <input type="text" name="nome_colaborador_alterar" class="form-control" id="nome_colaborador_alterar" placeholder="Nome do Colaborador" value="<?= ($produto['nome_colaborador']) ?>" required>
            </div>
            <!-- Campo nome Completo Funcionário-->
            <div class="form-group col-md-3 char">
                <label class="label" for="cpf_colaborador_alterar">Cadastro de Pessoa Física</label>
                <input type="text" name="cpf_colaborador_alterar" class="form-control" id="cpf_colaborador_alterar" placeholder="CPF do Colaborador" value="<?= ($produto['cpf_colaborador']) ?>" required>
            </div>
            <script type="text/javascript">
                $("#cpf_colaborador_alterar").mask("000.000.000-00");
            </script>
            <div class="form-group col-md-2 char">
                <label class="label" for="cargo_alterar">Cargo</label>
                <input class="form-control" type="text" id="cargo_alterar" placeholder="Cargo do Colaborador" name="cargo_alterar" value="<?= ($produto['cargo']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="departamento">Departamento</label>
                <input class="form-control" type="text" id="departamento_alterar" placeholder="Departamento" name="departamento_alterar" value="<?= ($produto['departamento']) ?>" required>
            </div>
            <!-- Campo do Nome do Gestor -->
            <div class="form-group col-md-3 char">
                <label class="label" for="gestor_alterar">Nome do Gestor</label>
                <input class="form-control" type="text" id="gestor_alterar" placeholder="Nome Completo do Gestor" name="gestor_alterar" value="<?= ($produto['gestor']) ?>" required>
            </div>
            <!-- Campo do Email do Gestor -->
            <div class="form-group col-md-3 char">
                <label class="label" for="email_gestor_alterar">E-mail do Gestor</label>
                <input class="form-control" type="text" id="email_gestor_alterar" placeholder="E-mail do Gestor" name="email_gestor_alterar" value="<?= ($produto['email_gestor']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="vp_area">VP da Área</label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    <option value="<?= ($produto['vp']) ?>"><?= ($produto['vp']) ?></option>
                    <?php
                    include("conecta.php");
                    $result_cat_post = "SELECT * FROM categorias_post ORDER BY nome_categoria";
                    $resultado_cat_post = mysqli_query($conexao, $result_cat_post);
                    while ($row_cat_post = mysqli_fetch_assoc($resultado_cat_post)) {
                        echo '<option value="' . $row_cat_post['id'] . '">' . $row_cat_post['nome_categoria'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="diretoria">Diretoria:</label>
                <select class="form-control" name="id_sub_categoria" id="id_sub_categoria">
                    <option value="<?= ($produto['diretoria']) ?>"><?= ($produto['diretoria']) ?></option>
                </select>
            </div>
            <script type="text/javascript">
                $(function() {
                    $('#id_categoria').change(function() {
                        if ($(this).val()) {
                            $('#id_sub_categoria').hide();
                            $.getJSON('sub_categorias_post.php?search=', {
                                id_categoria: $(this).val(),
                                ajax: 'true'
                            }, function(j) {
                                var options = '<option value="">Selecione</option>';
                                for (var i = 0; i < j.length; i++) {
                                    options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
                                }
                                $('#id_sub_categoria').html(options).show();
                            });
                        } else {
                            $('#id_sub_categoria').html('<option value=""Selecione</option>');
                        }
                    });
                });
            </script>
            <!-- Campo da Data de Admissão-->
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

            <!-- Campo do Tipo de Contratação -->
            <div class="form-group col-md-3 char">
                <label class="label" for="regime_contratacao_alterar">Tipo de Contratação</label>
                <select class="form-control" type="text" id="regime_contratacao_alterar" name="regime_contratacao_alterar" required>
                    <option><?= ($produto['regime_contratacao']) ?></option>
                    <option>Colaborador CLT</option>
                    <option>Colaborador CLT 100% Home Office</option>
                    <option>Colaborador PJ</option>
                    <option>Colaborador Terceiro</option>
                    <option>Selecione</option>
                </select>
            </div>
            <!-- Campo Analista -->
            <div class="form-group col-md-3 char">
                <label class="label" for="analista_rh_alterar">Analista Responsável</label>
                <input type="text" name="analista_rh_alterar" class="form-control" id="analista_rh_alterar" placeholder="Analista Responsável" value="<?= ($produto['analista_rh']) ?>">
            </div>

            <div class="form-group col-md-2 char">
                <label class="label" for="matricula_alterar">Matricula</label>
                <input class="form-control" type="text" id="matricula_alterar" placeholder="Matricula" name="matricula_alterar" value="<?= ($produto['matricula']) ?>">
            </div>
            <!-- Campo do Tipo de Entrega -->
            <div class="form-group col-md-2 char">
                <label class="label" for="tipo_de_entrega_alterar">Tipo de Entrega</label>
                <select class="form-control" type="text" id="tipo_de_entrega_alter" name="tipo_de_entrega_alterar" required>
                    <option><?= ($produto['tipo_de_entrega']) ?></option>
                    <option>Drive Thru</option>
                    <option>Delivery</option>
                    <option>RDTech</option>
                    <option>Selecione</option>
                </select>
            </div>
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
            <!-- Campo do CEP-->
            <div class="form-group col-md-3 char">
                <label class="label" for="cep_alterar">CEP</label>
                <input type="text" name="cep_alterar" class="form-control" id="cep_alterar" placeholder="CEP" maxlength="9" value="<?= ($produto['cep']) ?>" required>
            </div>
            <script type="text/javascript">
                $("#cep_alterar").mask("00000-000");
            </script>
            <!-- Campo do Estado-->
            <div class="form-group col-md-3 char">
                <label class="label" for="uf_alterar">Estado</label>
                <input type="text" name="uf_alterar" class="form-control" id="uf_alterar" placeholder="Estado" value="<?= ($produto['uf']) ?>" required>
            </div>
            <!-- Campo do Cidade-->
            <div class="form-group col-md-3 char">
                <label class="label" for="cidade_alterar">Cidade</label>
                <input type="text" name="cidade_alterar" class="form-control" id="cidade_alterar" placeholder="Cidade" value="<?= ($produto['cidade']) ?>" required>
            </div>
            <!-- Campo do Bairro-->
            <div class="form-group col-md-3 char">
                <label class="label" for="bairro_alterar">Bairro</label>
                <input type="text" name="bairro_alterar" class="form-control" id="bairro_alterar" placeholder="Bairro" value="<?= ($produto['bairro']) ?>" required>
            </div>
            <!-- Campo do Endereço-->
            <div class="form-group col-md-5 char">
                <label class="label" for="rua_alterar">Endereço</label>
                <input type="text" name="rua_alterar" class="form-control" id="rua_alterar" placeholder="Endereço" value="<?= ($produto['rua']) ?>" required>
            </div>
            <!-- Campo do Número da Residência -->
            <div class="form-group col-md-1 char">
                <label class="label" for="numero_alterar">Número</label>
                <input type="text" name="numero_alterar" class="form-control" id="numero_alterar" placeholder="Número" value="<?= ($produto['numero']) ?>" required>
            </div>
            <!-- Campo do Complemento -->
            <div class="form-group col-md-4 char">
                <label class="label" for="complemento_alterar">Complemento</label>
                <input type="text" name="complemento_alterar" class="form-control" id="complemento_alterar" placeholder="Complemento" value="<?= ($produto['complemento']) ?>">
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="sri_equipamento_alterar">SRI de Maquina</label>
                <input class="form-control" type="text" id="sri_equipamento_alterar" placeholder="SRI do Equipamento" name="sri_equipamento_alterar" value="<?= ($produto['sri_equipamento']) ?>" required>
            </div>

            <div class="form-group col-md-4 char">
                <label class="label" for="sistema_operacional_alterar">Sistema Operacional</label>
                <select class="form-control" type="text" id="sistema_operacional_alterar" name="sistema_operacional_alterar">
                    <option><?= ($produto['sistema_operacional']) ?></option>
                    <option>Windows</option>
                    <option>Linux</option>
                    <option>MacOS</option>
                </select>
            </div>

            <div class="form-group col-md-6 char">
                <label class="label" for="infomacao_adicional_alterar">Alguma Informação Adicional sobre o Equipamento?</label>
                <input class="form-control" type="info" id="infomacao_adicional_alterar" placeholder="Adicional sobre o Equipamento" name="infomacao_adicional_alterar" value="<?= ($produto['complemento']) ?>">
            </div>
            <!-- Campo do Tipo de Vaga -->
            <div class="form-group col-md-2 char">
                <label class="label" for="tipo_de_vaga_alterar">Tipo de Vaga</label>
                <select class="form-control" type="text" id="tipo_de_vaga_alterar" name="tipo_de_vaga_alterar" onchange="muda(this);" required>
                    <option><?= ($produto['tipo_de_vaga']) ?></option>
                    <option value="Vaga Nova">Vaga Nova</option>
                    <option value="substituicao">Substituição</option>
                    <option value="efetivacao">Efetivação</option>
                    <option value="temporario">Temporário</option>
                    <option value="movimentacao">Movimentação</option>
                </select>
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="equipamento_alterar">Equipamento</label>
                <input class="form-control" type="text" id="equipamento_alterar" placeholder="Equipamento" name="equipamento_alterar" value="<?= ($produto['equipamento']) ?>">
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="ativo_alterar">Ativo</label>
                <input class="form-control" type="text" id="ativo_alterar" placeholder="Ativo" name="ativo_alterar" maxlength="9" pattern="\d*" value="<?= ($produto['ativo']) ?>">
            </div>
            <div class="form-group col-md-2 char">
                <label class="label" for="numero_serie_alterar">Número de Série</label>
                <input class="form-control" type="texts" id="numero_serie_alterar" placeholder="Número de Série" name="numero_serie_alterar" value="<?= ($produto['numero_serie']) ?>">
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="login_alterar">Login</label>
                <input class="form-control" type="text" id="login_alterar" placeholder="Login" name="login_alterar" value="<?= ($produto['login_us']) ?>">
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="senha_alterar">Senha</label>
                <input class="form-control" type="text" id="senha_alterar" placeholder="Senha" name="senha_alterar" value="<?= ($produto['senha']) ?>">
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="email_alterar">E-mail</label>
                <input class="form-control" type="text" id="email_alterar" placeholder="E-mail" name="email_alterar" value="<?= ($produto['email']) ?>">
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="status_alterar">Status</label>
                <select class="form-control" type="text" id="status_alterar" placeholder="Status" name="status_alterar">
                    <option>Concluido</option>
                </select>
            </div>
            <div class="form-group col-md-6 char">
                <label class="label" for="substituicao1_1_alterar">Nome do Funcionário Substituido</label>
                <input class="form-control" type="text" id="substituicao1_1_alterar" placeholder="Nome do Colaborador" name="substituicao1_1_alterar" value="<?= ($produto['substituicao1_1']) ?>">
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="substituicao2_2_alterar">Motivo</label>
                <select class="form-control" type="text" id="substituicao2_2_alterar" placeholder="Motivo" name="substituicao2_2_alterar">
                    <option><?= ($produto['substituicao2_2']) ?></option>
                    <option>Desligamento</option>
                    <option>Movimentação</option>
                </select>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="recolhimento1_1_alterar">Notebook foi Devolvido</label>
                <select class="form-control" type="text" id="recolhimento1_1_alterar" placeholder="Recolhimento" name="recolhimento1_1_alterar">
                    <option><?= ($produto['recolhimento1_1']) ?></option>
                    <option>Sim</option>
                    <option>Não</option>
                </select>
            </div>
        </div>
        <!-- Botão Salvar -->
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

    </form>


    <?php include __DIR__ . "/../footer.php"; ?>
<?php

else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>