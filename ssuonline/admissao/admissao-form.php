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
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <form accept-charset="utf-8" class="display nowrap" action="add-admissao.php" method="POST">
        <!-- Primeiro form da Admissão -->
        <div class="form-row">
            <!-- Campo do Nome do funcionário -->
            <div class="form-group col-md-3 char">
                <label class="label" for="nome_colaborador">Nome do Colaborador</label>
                <input accept-charset="utf-8" class="form-control" type="text" id="nome_colaborador" placeholder="Nome do Colaborador" name="nome_colaborador" required>
            </div>
            <!-- Campo do CPF do colaborador -->
            <div class="form-group col-md-3 char">
                <label class="label" for="cpf_colaborador">Cadastro de Pessoa Física</label>
                <input class="form-control" type="text" id="cpf_colaborador" placeholder="CPF do Colaborador" name="cpf_colaborador" maxlength="13" required>
            </div>
            <script type="text/javascript">
                $("#cpf_colaborador").mask("000.000.000-00");
            </script>
            <!-- Campo do Cargo do Colaborador -->
            <div class="form-group col-md-3 char">
                <label class="label" for="cargo" style="font-weight:bold;">Cargo</label>
                <input list="cargo" class="form-control" placeholder="Departamento" required />
                <datalist id="cargo">
                    <option value="Testando">
                    <option value="PMO - ESPECIALISTA">
                    <option value="PMO - SÊNIOR">
                    <option value="PMO - PLENO">
                    <option value="TECH LEAD FULLSTACK JAVA">
                    <option value="DEV FULLSTACK JAVA - ESPECIALISTA">
                    <option value="DEV FULLSTACK JAVA - SÊNIOR">
                    <option value="DEV JAVA BACKEND - ESPECIALISTA">
                    <option value="DEV JAVA BACKEND - ESPECIALISTA">
                    <option value="DEV JAVA BACKEND - SÊNIOR">
                    <option value="DEV JAVA BACKEND - PLENO">
                    <option value="DEV JAVA BACKEND - JUNIOR">
                    <option value="DEV FRONTEND - ESPECIALISTA">
                    <option value="DEV FRONTEND - SÊNIOR">
                    <option value="DEV FRONTEND - PLENO">
                    <option value="DEV FRONTEND - JUNIOR">
                    <option value="TECH LEAD MOBILE">
                    <option value="DEV MOBILE - ESPECIALISTA">
                    <option value="DEV MOBILE - SÊNIOR">
                    <option value="TECH LEAD FRONT REACTNATIVE">
                    <option value="DEV FRONT REACTNATIVE - ESPECIALISTA">
                    <option value="DEV FRONT REACTNATIVE - SÊNIOR">
                    <option value="DEV FRONT REACTNATIVE - PLENO">
                    <option value="DEV FRONT REACTNATIVE - JUNIOR">
                    <option value="TECH LEAD BACK NODEJS">
                    <option value="DEV BACK NODEJS - ESPECIALISTA">
                    <option value="DEV BACK NODEJS - SÊNIOR">
                    <option value="DEV BACK NODEJS - PLENO">
                    <option value="DEV BACK NODEJS - JUNIOR">
                    <option value="TECH LEAD TESTES-QA">
                    <option value="ANALISTA DE TESTES-QA AUTOMATIZADOR - ESPECIALISTA">
                    <option value="ANALISTA DE TESTES-QA AUTOMATIZADOR - SÊNIOR">
                    <option value="ANALISTA DE TESTES-QA AUTOMATIZADOR - PLENO">
                    <option value="ANALISTA DE TESTES-QA AUTOMATIZADOR - JUNIOR">
                    <option value="ANALISTA DE TESTES-QA FUNCIONAL - SÊNIOR">
                    <option value="ANALISTA DE TESTES-QA FUNCIONAL - PLENO">
                    <option value="ANALISTA DE TESTES-QA FUNCIONAL - JUNIOR">
                    <option value="ANALISTA DE SISTEMAS BACK PHP - MAGENTO 2 - ESPECIALISTA">
                    <option value="ANALISTA DE SISTEMAS BACK PHP - MAGENTO 2 - SÊNIOR">
                    <option value="ANALISTA DE SISTEMAS BACK PHP - MAGENTO 2 - PLENO">
                    <option value="ANALISTA DE SISTEMAS BACK PHP - MAGENTO 2 - JUNIOR">
                    <option value="ANALISTA DE SISTEMAS FRONTEND - MAGENTO 2 - ESPECIALISTA">
                    <option value="ANALISTA DE SISTEMAS FRONTEND - MAGENTO 2 - SÊNIOR">
                    <option value="ANALISTA DE SISTEMAS FRONTEND - MAGENTO 2 - PLENO">
                    <option value="ANALISTA DE SISTEMAS FRONTEND - MAGENTO 2 - JUNIOR">
                    <option value="DEVSECOPS ESPECIALISTA">
                    <option value="DEVSECOPS SÊNIOR">
                    <option value="DEVSECOPS PLENO">
                    <option value="DEVOPS ESPECIALISTA">
                    <option value="DEVOPS SÊNIOR">
                    <option value="DEVOPS PLENO">
                    <option value="TECH LEAD JAVA MICROSERVIÇOS">
                    <option value="DEV JAVA MICROSERVIÇOS - ESPECIALISTA">
                    <option value="DEV JAVA MICROSERVIÇOS - SÊNIOR">
                    <option value="DEV JAVA MICROSERVIÇOS - PLENO">
                    <option value="DEV JAVA MICROSERVIÇOS - JUNIOR">
                    <option value="ANALISTA DE ARQUITETURA - SÊNIOR">
                    <option value="ANALISTA DE ARQUITETURA E SOLUÇÕES - SÊNIOR">
                    <option value="ANALISTA DE MIDDLEWARE - SENIOR">
                </datalist>
                </input>
            </div>
            <!-- Campo do Departamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="departamento">Departamento</label>
                <input class="form-control" list="departamento" placeholder="Departamento" class="form-control" required />
                <datalist id="departamento">
                    <option value=" Agile">
                    <option value=" Administração de Compras">
                    <option value=" Administração de Vendas Corporativas">
                    <option value=" Administrativo e Compras Indiretas">
                    <option value=" Administrativo e Contas de Consumo">
                    <option value=" Administrativo Centro RD">
                    <option value=" Apoio Administrativo e Contratos">
                    <option value=" CAGC Brasília">
                    <option value=" CAGC Barão">
                    <option value=" CAGC Bom Retiro">
                    <option value=" CAGC Buritis">
                    <option value=" CAGC Campo Grande">
                    <option value=" CAGC Campinas">
                    <option value=" CAGC Cuiabá">
                    <option value=" CAGC Curitiba">
                    <option value=" CAGC Corifeu">
                    <option value=" CAGC Frei Caneca">
                    <option value=" CAGC Florianapolis">
                    <option value=" CAGC Goiania">
                    <option value=" CAGC Marechal">
                    <option value=" CAGC Meier">
                    <option value=" CAGC Recife">
                    <option value=" CAGC Ribeirão Preto">
                    <option value=" CAGC Porto Alegre">
                    <option value=" CAGC Salvador">
                    <option value=" CAGC Vitoria">
                    <option value=" Call Center">
                    <option value=" CD Guarulhos">
                    <option value=" CD RJ">
                    <option value=" CD Ceara">
                    <option value=" CD Ribeirão Preto">
                    <option value=" CD Minas Gerais">
                    <option value=" Compras Diretas">
                    <option value=" Comunicação Interna e Eventos">
                    <option value=" Consultoria Farmacêutica">
                    <option value=" Contabilidade Societária">
                    <option value=" Contratos">
                    <option value=" Controle de Vendas">
                    <option value=" Data Center">
                    <option value=" Desenvolvimento e Diversidade">
                    <option value=" Desenvolvimento Imobiliário">
                    <option value=" Engenharia e Expansão">
                    <option value=" Engenharia e Manutenção">
                    <option value=" Engenharia e Projetos">
                    <option value=" Expansão">
                    <option value=" Financeiro">
                    <option value=" Fiscal">
                    <option value=" Gente e Cultura">
                    <option value=" G&C Ambulatório">
                    <option value=" G&C Comunicação">
                    <option value=" G&C Educação Corporativa">
                    <option value=" G&C Folha de Pagamento">
                    <option value=" G&C Relações Sindicais">
                    <option value=" G&C Investimentos Sociais">
                    <option value=" G&C SESMT">
                    <option value=" G&C Administração do Contrato">
                    <option value=" G&C Benefícios">
                    <option value=" G&C Planejamento e Perfomance">
                    <option value=" G&C Processos Adm e Melhorias">
                    <option value=" G&C Remuneração">
                    <option value=" G&C Sustentabilidade">
                    <option value=" Gestão de Categorias">
                    <option value=" Gestão de Estoque">
                    <option value=" Gestão Farma e Frequência">
                    <option value=" Governança Riscos e Compliance">
                    <option value=" Informação e Auditoria">
                    <option value=" Juridico">
                    <option value=" Legalização">
                    <option value=" Legalização Imobiliária">
                    <option value=" Marca Própria">
                    <option value=" Marketing">
                    <option value=" Marketing CRM">
                    <option value=" Mídia e Promoção">
                    <option value=" Operação de Varejo">
                    <option value=" Planejamento Comercia">
                    <option value=" Planejamento Corporativa">
                    <option value=" Planejamento e Controle e Produção">
                    <option value=" Planejamento e Eficiência">
                    <option value=" Planejamento RI">
                    <option value=" Prevenção de Perdas">
                    <option value=" Pricing">
                    <option value=" RD VENTURE">
                    <option value=" Relacionamento com o Negocio">
                    <option value=" Relações com Investidores">
                    <option value=" SAC/Multicanal">
                    <option value=" Secretaria">
                    <option value=" Segurança">
                    <option value=" Seguros e Riscos">
                    <option value=" Suporte Administrativo">
                    <option value=" TI">
                    <option value=" TI SAT(Suporte Loja)">
                    <option value=" Trade Marketing">
                    <option value=" Transportes">
                    <option value=" Tributário e Fiscal">
                    <option value=" Vendas Multicanal">
                    <option value=" Vendas PBM">
                    <option value=" Vendas Empresariais">
                </datalist>
                </input>
            </div>
            <!-- Campo do Nome do Gestor -->
            <div class="form-group col-md-3 char">
                <label class="label" for="gestor">Nome do Gestor</label>
                <input class="form-control" type="text" id="gestor" placeholder="Nome Completo do Gestor" name="gestor" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="vp_area">VP da Área</label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    <option value=" ">Selecione</option>
                    <?php
                    include("/configuracoes/conecta.php");
                    $result_cat_post = "SELECT * FROM categorias_post ORDER BY nome_categoria";
                    $resultado_cat_post = mysqli_query($conexao, $result_cat_post);
                    while ($row_cat_post = mysqli_fetch_assoc($resultado_cat_post)) {
                        echo '<option value=" ' . $row_cat_post['id'] . '">' . $row_cat_post['nome_categoria'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="diretoria">Diretoria:</label>
                <select class="form-control" name="id_sub_categoria" id="id_sub_categoria">
                    <option value=" ">Selecione</option>
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
                                var options = '<option value=" ">Selecione</option>';
                                for (var i = 0; i < j.length; i++) {
                                    options += '<option value=" ' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
                                }
                                $('#id_sub_categoria').html(options).show();
                            });
                        } else {
                            $('#id_sub_categoria').html('<option value=" "Selecione</option>');
                        }
                    });
                });
            </script>
            <!-- Campo do Email do Gestor -->
            <div class="form-group col-md-3 char">
                <label class="label" for="email_gestor">E-mail do Gestor</label>
                <input class="form-control" type="text" id="email_gestor" placeholder="E-mail do Gestor" name="email_gestor" required>
            </div>
            <!-- Campo da Data de Admissão-->
            <div class="form-group col-md-2 char">
                <label class="label" for="data-admissao">Data de Admissão</label>
                <div class="input-group date" data-date-format="dd/mm/aaaa">
                    <input type="text" class="form-control" placeholder="dd/mm/aaaa" id="data_admissao" name="data_admissao" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'> </script>
            <script>
                $("#data_admissao").mask("00/00/0000");
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>

            <!-- Campo do Tipo de Contratação -->
            <div class="form-group col-md-3 char">
                <label class="label" for="regime_contratacao">Tipo de Contratação</label>
                <select class="form-control" type="text" id="regime_contratacao" name="regime_contratacao" required>
                    <option selected>Colaborador CLT</option>
                    <option selected>Colaborador CLT 100% Home Office</option>
                    <option selected>Colaborador PJ</option>
                    <option selected>Colaborador Terceiro</option>
                    <option selected>Selecione</option>
                </select>
            </div>
            <!-- Campo Analista -->
            <div class="form-group col-md-3 char">
                <label class="label" for="analista_rh">Analista Responsável</label>
                <input type="text" name="analista_rh" readonly class="form-control" id="analista_rh" placeholder="tec" value=" <?php echo $_SESSION['user']; ?>">
            </div>

            <div class="form-group col-md-2 char">
                <label class="label" for="matricula">Matricula</label>
                <input class="form-control" type="text" id="matricula" placeholder="Matricula" name="matricula">
            </div>
            <!-- Campo do Tipo de Entrega -->
            <div class="form-group col-md-2 char">
                <label class="label" for="tipo_de_entrega">Tipo de Entrega</label>
                <select class="form-control" type="text" id="tipo_de_entrega" name="tipo_de_entrega" required>
                    <option>Drive Thru</option>
                    <option value=" Delivery">Delivery</option>
                    <option>RDTech</option>
                    <option selected>Selecione</option>
                </select>
            </div>
            <script>
                $(document).ready(function() {

                    function limpa_formulário_cep() {
                        // Limpa valores do formulário de cep.
                        $("#rua").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#uf").val("");
                    }

                    //Quando o campo cep perde o foco.
                    $("#cep").blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            //Valida o formato do CEP.
                            if (validacep.test(cep)) {

                                //Preenche os campos com "..." enquanto consulta webservice.
                                $("#rua").val("...");
                                $("#bairro").val("...");
                                $("#cidade").val("...");
                                $("#uf").val("...");

                                //Consulta o webservice viacep.com.br/
                                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                    if (!("erro" in dados)) {
                                        //Atualiza os campos com os valores da consulta.
                                        $("#rua").val(dados.logradouro);
                                        $("#bairro").val(dados.bairro);
                                        $("#cidade").val(dados.localidade);
                                        $("#uf").val(dados.uf);
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
                <label class="label" for="cep">CEP</label>
                <input type="text" name="cep" class="form-control" id="cep" placeholder="CEP" maxlength="9" required>
            </div>
            <script type="text/javascript">
                $("#cep").mask("00000-000");
            </script>
            <!-- Campo do Estado-->
            <div class="form-group col-md-3 char">
                <label class="label" for="uf">Estado</label>
                <input type="text" name="uf" class="form-control" id="uf" placeholder="Estado" required>
            </div>
            <!-- Campo do Cidade-->
            <div class="form-group col-md-3 char">
                <label class="label" for="cidade">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" required>
            </div>
            <!-- Campo do Bairro-->
            <div class="form-group col-md-3 char">
                <label class="label" for="bairro">Bairro</label>
                <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" required>
            </div>
            <!-- Campo do Endereço-->
            <div class="form-group col-md-5 char">
                <label class="label" for="rua">Endereço</label>
                <input type="text" name="rua" class="form-control" id="rua" placeholder="Endereço" required>
            </div>
            <!-- Campo do Número da Residência -->
            <div class="form-group col-md-1 char">
                <label class="label" for="numero">Número</label>
                <input type="text" name="numero" class="form-control" id="numero" placeholder="Número" required>
            </div>
            <!-- Campo do Complemento -->
            <div class="form-group col-md-4 char">
                <label class="label" for="complemento">Complemento</label>
                <input type="text" name="complemento" class="form-control" id="complemento" placeholder="complemento">
            </div>

            <div class="form-group col-md-2 char">
                <label class="label" for="sri_equipamento">SRI de Maquina</label>
                <input class="form-control" type="text" id="sri_equipamento" placeholder="SRI do Equipamento" name="sri_equipamento">
            </div>

            <div class="form-group col-md-4 char">
                <label class="label" for="sistema_operacional">Sistema Operacional</label>
                <select class="form-control" type="text" id="sistema_operacional" name="sistema_operacional">
                    <option>Windows</option>
                    <option>Linux</option>
                    <option>MacOS</option>
                </select>
            </div>

            <div class="form-group col-md-6 char">
                <label class="label" for="infomacao_adicional">Alguma Informação Adicional sobre o Equipamento?</label>
                <input class="form-control" type="info" id="infomacao_adicional" placeholder="Adicional sobre o Equipamento" name="infomacao_adicional">
            </div>
            <!-- Campo do Tipo de Vaga -->
            <div class="form-group col-md-2 char">
                <label class="label" for="tipo_de_vaga">Tipo de Vaga</label>
                <select class="form-control" type="text" id="tipo_de_vaga" name="tipo_de_vaga" onchange="muda(this);" required>
                    <option value=" Vaga Nova">Vaga Nova</option>
                    <option value=" substituicao">Substituição</option>
                    <option value=" efetivacao">Efetivação</option>
                    <option value=" temporario">Temporário</option>
                    <option value=" movimentacao">Movimentação</option>
                </select>
            </div>
            <!-- Quando referido a palavra "TAG" é uma abreviação da escolha do tipo de vaga e onde cada campo se encaixou na sua escolha -->
            <!-- Campo do Colaborador a Ser Substituido <TAG SUBSTITUIÇÃO> -->
            <div class="form-group col-md-4 char" id="substituicao1" style="display: none;">
                <label class="label" for="substituicao1_1">Colaborador a ser Substituído</label>
                <input type="text" name="substituicao1_1" class="form-control" id="substituicao1_1" placeholder="Nome do Colaborador">
            </div>
            <!--Campo do Motivo da Substituição  <TAG SUBSTITUIÇÃO> -->
            <div class="form-group col-md-2 char" id="substituicao2" style="display: none;">
                <label class="label" for="substituicao2_2">Motivo</label>
                <select class="form-control" type="text" id="substituicao2_2" name="substituicao2_2" onchange="mudar(this);">
                    <option value=" ">Selecione</option>
                    <option value=" desligamento">Desligamento</option>
                    <option value=" movimentacao">Movimentação</option>
                </select>
            </div>
            <!--Campo Efetivação <TAG EFETIVAÇÃO> -->
            <div class="form-group col-md-2 char" id="efetivacao1" style="display: none;">
                <label class="label" for="efetivacao1_1">Efetivação</label>
                <select class="form-control" type="text" id="efetivacao1_1" name="efetivacao1_1" onchange="mudar2(this);">
                    <option value=" ">Selecione</option>
                    <option value=" Vaga Nova">Vaga Nova</option>
                    <option value=" substituicao">Substituição</option>
                </select>
            </div>
            <!--Campo Movimentação <TAG MOVIMENTAÇÃO e TAG SUBSTITUIÇÃO> -->
            <div class="form-group col-md-2 char" id="movimentacao1" style="display: none;">
                <label class="label" for="movimentacao1_1">Movimentação</label>
                <select class="form-control" type="text" id="movimentacao1_1" name="movimentacao1_1" onchange="mudar3(this);">>
                    <option value=" ">Selecione</option>
                    <option value=" Vaga Nova">Vaga Nova</option>
                    <option value=" substituicao">Substituição</option>
                </select>
            </div>
            <!--Campo Movimentação <TAG TEMPORARIO> -->
            <div class="form-group col-md-2 char" id="temporario1" style="display: none;">
                <label class="label" for="temporario1_1">Temporário</label>
                <select class="form-control" type="text" id="temporario1_1" name="temporario1_1" onchange="mudar4(this);">>
                    <option value=" ">Selecione</option>
                    <option value=" Vaga Nova">Vaga Nova</option>
                    <option value=" substituicao">Substituição</option>
                </select>
            </div>
            <!--Campo do Colaborador a Ser Substituido <TAG SUBSTITUIÇÃO, TAG MOVIMENTAÇÃO, TAG EFETIVAÇÃO e TAG TEMPORARIO>-->
            <div class="form-group col-md-4 char" id="substituicao_loop" style="display: none;">
                <label class="label" for="substituicao_loop_loop">Colaborador a ser Substituído</label>
                <input type="text" name="substituicao_loop_loop" class="form-control" id="substituicao_loop_loop" placeholder="Nome do Colaborador">
            </div>
            <!-- Campo Devolução de Equipamento <TAG SUBSTITUIÇÃO, TAG MOVIMENTAÇÃO, TAG EFETIVAÇÃO e TAG TEMPORARIO>-->
            <div class="form-group col-md-3 char" id="recolhimento" style="display: none;">
                <label class="label" for="recolhimento1_1">Notebook Devolvido</label>
                <select class="form-control" type="text" id="recolhimento1_1" name="recolhimento1_1">
                    <option>Sim</option>
                    <option>Não</option>
                </select>
            </div>

            <!-- USO DE JavaScript PARA REALIZAR A LEITURA DA ESCOLHA E ADICIONAR OS CAMPOS CORRETAMENTE -->
            <script type='text/javascript'>
                function muda(obj) {
                    var i = obj.selectedIndex;
                    var j = obj.options[i].value;
                    if (j == 'Vaga Nova') {
                        document.getElementById('temporario1').style.display = "none";
                        document.getElementById('temporario1_1').value = "";
                        document.getElementById('efetivacao1').style.display = "none";
                        document.getElementById('efetivacao1_1').value = "";
                        document.getElementById('substituicao1').style.display = "none";
                        document.getElementById('substituicao1_1').value = "";
                        document.getElementById('substituicao1_1').required = false;
                        document.getElementById('substituicao2').style.display = "none";
                        document.getElementById('substituicao2_2').value = "";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                        document.getElementById('movimentacao1').style.display = "none";
                        document.getElementById('movimentacao1_1').value = "";
                    } else
                    if (j == 'substituicao') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                        document.getElementById('substituicao1').style.display = "block";
                        document.getElementById('substituicao1_1').required = true;
                        document.getElementById('substituicao2').style.display = "block";
                        document.getElementById('temporario1').style.display = "none";
                        document.getElementById('temporario1_1').value = "";
                        document.getElementById('efetivacao1').style.display = "none";
                        document.getElementById('efetivacao1_1').value = "";
                        document.getElementById('movimentacao1').style.display = "none";
                        document.getElementById('movimentacao1_1').value = "";
                    } else
                    if (j == 'efetivacao') {
                        document.getElementById('efetivacao1').style.display = "block";
                        document.getElementById('temporario1').style.display = "none";
                        document.getElementById('temporario1_1').value = "";
                        document.getElementById('substituicao1').style.display = "none";
                        document.getElementById('substituicao1_1').value = "";
                        document.getElementById('substituicao1_1').required = false;
                        document.getElementById('substituicao2').style.display = "none";
                        document.getElementById('substituicao2_2').value = "";
                        document.getElementById('movimentacao1').style.display = "none";
                        document.getElementById('movimentacao1_1').value = "";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                    } else
                    if (j == 'movimentacao') {
                        document.getElementById('movimentacao1').style.display = "block";
                        document.getElementById('temporario1').style.display = "none";
                        document.getElementById('temporario1_1').value = "";
                        document.getElementById('efetivacao1').style.display = "none";
                        document.getElementById('efetivacao1_1').value = "";
                        document.getElementById('substituicao1').style.display = "none";
                        document.getElementById('substituicao1_1').value = "";
                        document.getElementById('substituicao1_1').required = false;
                        document.getElementById('substituicao2').style.display = "none";
                        document.getElementById('substituicao2_2').value = "";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                    } else
                    if (j == 'temporario') {
                        document.getElementById('temporario1').style.display = "block";
                        document.getElementById('efetivacao1').style.display = "none";
                        document.getElementById('efetivacao1_1').value = "";
                        document.getElementById('substituicao1').style.display = "none";
                        document.getElementById('substituicao1_1').value = "";
                        document.getElementById('substituicao1_1').required = false;
                        document.getElementById('substituicao2').style.display = "none";
                        document.getElementById('substituicao2_2').value = "";
                        document.getElementById('movimentacao1').style.display = "none";
                        document.getElementById('movimentacao1_1').value = "";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                    }

                }
            </script>
            <script>
                function mudar(obj) {
                    var i = obj.selectedIndex;
                    var j = obj.options[i].value;
                    if (j == '') {
                        document.getElementById('movimentacao1').style.display = "none";
                        document.getElementById('movimentacao1_1').value = "";
                        document.getElementById('recolhimento').style.display = "none";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                    } else
                    if (j == 'desligamento') {
                        document.getElementById('movimentacao1').style.display = "none";
                        document.getElementById('movimentacao1_1').value = "";
                        document.getElementById('recolhimento').style.display = "block";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                    } else
                    if (j == 'movimentacao') {
                        document.getElementById('recolhimento').style.display = "none";
                        document.getElementById('movimentacao1').style.display = "block";
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                    }
                }
            </script>
            <script>
                function mudar2(obj) {
                    var i = obj.selectedIndex;
                    var j = obj.options[i].value;
                    if (j == '') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";

                    } else
                    if (j == 'Vaga Nova') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                    } else
                    if (j == 'substituicao') {
                        document.getElementById('substituicao_loop').style.display = "block";
                        document.getElementById('substituicao_loop_loop').required = true;
                        document.getElementById('recolhimento').style.display = "block";
                    }
                }
            </script>
            <script>
                function mudar3(obj) {
                    var i = obj.selectedIndex;
                    var j = obj.options[i].value;
                    if (j == '') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";

                    } else
                    if (j == 'Vaga Nova') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                    } else
                    if (j == 'substituicao') {
                        document.getElementById('substituicao_loop').style.display = "block";
                        document.getElementById('substituicao_loop_loop').required = true;
                        document.getElementById('recolhimento').style.display = "block";
                    }
                }
            </script>
            <script>
                function mudar4(obj) {
                    var i = obj.selectedIndex;
                    var j = obj.options[i].value;
                    if (j == '') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";

                    } else
                    if (j == 'Vaga Nova') {
                        document.getElementById('substituicao_loop').style.display = "none";
                        document.getElementById('substituicao_loop_loop').value = "";
                        document.getElementById('substituicao_loop_loop').required = false;
                        document.getElementById('recolhimento').style.display = "none";
                    } else
                    if (j == 'substituicao') {
                        document.getElementById('substituicao_loop').style.display = "block";
                        document.getElementById('substituicao_loop_loop').required = true;
                        document.getElementById('recolhimento').style.display = "block";
                    }
                }
            </script>
            <div class="form-group col-md-2 char" id="status_1" style="display: none;">
                <select class="form-control" type="text" id="status" name="status">
                    <option selected>Em andamento</option>
                </select>
            </div>
            <!-- Fim row -->
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