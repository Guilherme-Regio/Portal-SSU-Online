<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../configuracoes/banco-acesso.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    if (verificaRat()) {
    };
?>
    <?php
    include("banco-produto.php");
    ?>
    <?php
    ini_set('default_charset', 'UTF-8');
    ?>
    <?php
    $id = $_GET['id'];
    $produto = buscaControle($conexao, $id);
    $ativo = $produto['ativo'];
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'> </script>


    <!-- Formulário para alterar a RAT e imprimir -->
    <form action="view-produto.php" class="display nowrap" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="form-row">
            <!-- Campo do Status do Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="status_equipamento_alterar">Status do Equipamento</label>
                <select type="text" name="status_equipamento_alterar" class="form-control" id="status_equipamento_alterar" placeholder="Status do Equipamento" required>
                    <option><?= ($produto['status_equipamento']) ?></option>
                    <option>Em uso</option>
                    <option value="Disponivel">Disponivel</option>
                    <option>Doação</option>
                    <option>Roubo/Furto</option>
                    <option>Obsoleto/Descarte</option>
                    <option>Onboarding</option>
                    <option>Rollout</option>
                    <option>Aguardando Devolucao</option>
                    <option>Empréstimo</option>
                    <option>Quarentena</option>
                    <option>Backup</option>
                    <option>Manutenção</option>
                    <option>Doação Vitat</option>
                </select>
            </div>
            <!-- Campo nome Completo Funcionário-->
            <div class="form-group col-md-2 char">
                <label class="label" for="localidade_alterar">Localidade</label>
                <input type="text" name="localidade_alterar" class="form-control" id="localidade_alterar" placeholder="Localidade" value="<?= ($produto['localidade']) ?>" required>
            </div>
            <!-- Campo do Ativo -->
            <div class="form-group col-md-2 char">
                <label class="label" for="ativo_alterar">Ativo</label>
                <input type="number" name="ativo_alterar" class="form-control" id="ativo_alterar" placeholder="Ativo" value="<?= ($produto['ativo']) ?>" readonly required>
            </div>
            <!-- Campo do Número de Série -->
            <div class="form-group col-md-2 char">
                <label class="label" for="numero_serie">Número de Série</label>
                <input type="text" name="numero_serie" class="form-control" id="numero_serie" placeholder="Número de Série" value="<?= ($produto['numero_serie']) ?>" readonly required>
            </div>
            <!-- Campo do Modelo do Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="modelo_equipamento">Modelo de Equipamento</label>
                <input type="text" name="modelo_equipamento" class="form-control" id="modelo_equipamento" placeholder="Modelo de Equipamento" value="<?= ($produto['modelo_equipamento']) ?>" readonly required>
            </div>
            <!-- fim row -->
        </div>
        <!-- Segundo form -->
        <div class="form-row">
            <!-- Campo do Sistema Operacional-->
            <div class="form-group col-md-3 char">
                <label class="label" for="sistema_operacional">Sistema Operacional</label>
                <input type="text" name="sistema_operacional" class="form-control" id="sistema_operacional" placeholder="Sistema Operacional" value="<?= ($produto['sistema_operacional']) ?>" readonly required>
            </div>
            <!-- Campo do Processador-->
            <div class="form-group col-md-3 char">
                <label class="label" for="processador">Processador</label>
                <input type="text" name="processador" class="form-control" id="processador" placeholder="processador" value="<?= ($produto['processador']) ?>" readonly>
            </div>
            <!-- Campo da Data de Aquisição do Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="data_aquisicao">Data da Aquisição</label>
                <input type="text" name="data_aquisicao" class="form-control" id="data_aquisicao" placeholder="Data da Aquisição" value="<?= ($produto['data_aquisicao']) ?>" readonly>
            </div>
            <!-- Campo de Mascara da Aquisição -->
            <script>
                $("#data_aquisicao").mask("00/00/0000");
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>
            <!-- Campo da Data de Garantia -->
            <div class="form-group col-md-3 char">
                <label class="label" for="garantia_equipamento">Data da Garantia</label>
                <input type="text" name="garantia_equipamento" class="form-control" id="garantia_equipamento" placeholder="Data da Garantia" value="<?= ($produto['garantia_equipamento']) ?>" readonly>
            </div>
            <!-- Campo de Mascara de Garantia -->
            <script>
                $("#garantia_equipamento").mask("00/00/0000");
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>
            <!-- Campo do Nome do Colaborador -->
            <div class="form-group col-md-4 char">
                <label class="label" for="nome_colaborador">Nome Completo do Colaborador</label>
                <input type="text" name="nome_colaborador" class="form-control" id="nome_colaborador" placeholder="Nome Completo do Colaborador" value="<?= ($produto['nome_colaborador']) ?>" required>
            </div>
            <!-- Campo do CPF do Colaborador -->
            <div class="form-group col-md-3 char">
                <label class="label" for="cpf_colaborador">CPF do Colaborador</label>
                <input type="text" name="cpf_colaborador" class="form-control" id="cpf_colaborador" placeholder="CPF do Colaborador" value="<?= ($produto['cpf_colaborador']) ?>">
            </div>
            <!-- Campo de Mascara do CPF -->
            <script type="text/javascript">
                $("#cpf_colaborador").mask("000.000.000-00");
            </script>
            <!-- Campo do Cargo do Colaborador -->
            <div class="form-group col-md-2 char">
                <label class="label" for="cargo">Cargo</label>
                <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Cargo do Colaborador" value="<?= ($produto['cargo']) ?>" required>
            </div>
            <!-- Campo do Departamento do Colaborador -->
            <div class="form-group col-md-3 char">
                <label class="label" for="departamento">Departamento</label>
                <select type="text" name="departamento" class="form-control" id="cargo" placeholder="Departamento" required>
                    <option><?= ($produto['departamento']) ?></option>
                    <option value="">Em Branco</option>
                    <option>Administração de Compras</option>
                    <option>Administração de Vendas Corporativas</option>
                    <option>Administrativo e Compras Indiretas</option>
                    <option>Administrativo e Contas de Consumo</option>
                    <option>Administração CSC</option>
                    <option>Agile</option>
                    <option>Apoio a Lojas</option>
                    <option>Apoio Administrativo e Contratos</option>
                    <option>CAGC Brasilia</option>
                    <option>CAGC Barão</option>
                    <option>CAGC Bom Retiro</option>
                    <option>CAGC Buritis</option>
                    <option>CAGC Campo Grande</option>
                    <option>CAGC Campinas</option>
                    <option>CAGC Cuiaba</option>
                    <option>CAGC Curitiba</option>
                    <option>CAGC Corifeu</option>
                    <option>CAGC Frei Caneca</option>
                    <option>CAGC Florianapolis</option>
                    <option>CAGC Goiania</option>
                    <option>CAGC Marechal</option>
                    <option>CAGC Meier</option>
                    <option>CAGC Recife</option>
                    <option>CAGC Ribeirão Preto</option>
                    <option>CAGC Porto Alegre</option>
                    <option>CAGC Salvador</option>
                    <option>CAGC Vitoria</option>
                    <option>Call Center - Raiadrogasil</option>
                    <option>CD - Guarulhos</option>
                    <option>CD Butantã-Administrativo</option>
                    <option>CD RJ</option>
                    <option>CD Ceara</option>
                    <option>CD Ribeirao Preto</option>
                    <option>CD Minas Gerais</option>
                    <option>Compras Diretas</option>
                    <option>Comunicacao Interna e Eventos</option>
                    <option>Consultoria Farmaceutica</option>
                    <option>Contabilidade Gerencial</option>
                    <option>Contabilidade Societaria</option>
                    <option>Contratos</option>
                    <option>Controle de Vendas</option>
                    <option>Data Center</option>
                    <option>Desenvolvimento e Diversidade</option>
                    <option>Desenvolvimento Imobiliario</option>
                    <option>Engenharia e Expansão</option>
                    <option>Engenharia e Manutenção</option>
                    <option>Engenharia e Projetos</option>
                    <option>Expansão</option>
                    <option>Financeiro</option>
                    <option>Fiscal</option>
                    <option>Gente e Cultura</option>
                    <option>G&C - Ambulatório</option>
                    <option>G&C - Comunicação</option>
                    <option>G&C-Educ Corpor e D.O.</option>
                    <option>G&C-Educ Folha de pagamento</option>
                    <option>G&C-P&S-Adm C.T.Relações Sindicais</option>
                    <option>GC-Educação Corporativa - Desenvolvimento</option>
                    <option>GC-Educação Corporativa - Treinamentos I</option>
                    <option>GC-Educação Corporativa - Treinamentos II</option>
                    <option>GC-Investimentos Sociais</option>
                    <option>GC-Operações de CDS-I-Butantã</option>
                    <option>GC-Operações de CDS-I-Embu</option>
                    <option>GC-Operações de CDS-II-S.J.P.</option>
                    <option>GC-P&S-Adm C.T.- SESMT</option>
                    <option>GC-P&S-Administração do Contrato Trabalho</option>
                    <option>GC-P&S-Beneficios</option>
                    <option>GC-P&S-Planejamento e Performance</option>
                    <option>GC-P&S-Processos de Administração do Contrato Trabalho</option>
                    <option>GC-P&S-Processos e Melhorias</option>
                    <option>GC-P&S-Remuneração</option>
                    <option>G&C - Sustentabilidade</option>
                    <option>GC-P&S-Remuneração e Planejamento</option>
                    <option>GC-Planejamento e Serviços</option>
                    <option>Gestão de Categoria</option>
                    <option>Gestão de Estoque</option>
                    <option>Gestao Farma e Frequencia</option>
                    <option>Governancas Riscos e Compliance</option>
                    <option>Informação e Auditoria</option>
                    <option>Infraestrutura</option>
                    <option>Juridico</option>
                    <option>Juridico e Consultoria Farmaceutica</option>
                    <option>Legalizacao</option>
                    <option>Legalização Imobiliaria</option>
                    <option>Marca Propria</option>
                    <option>Marketing</option>
                    <option>Marketplace</option>
                    <option>Marketing CRM</option>
                    <option>Midia e Promoção</option>
                    <option>Operação de Varejo-Drogasil</option>
                    <option>Operação de Varejo-Raia</option>
                    <option>Planejamento Comercial</option>
                    <option>Planejamento Corporativo</option>
                    <option>Planejamento e Controle de Produção</option>
                    <option>Planejamento e Eficiencia de Expansao</option>
                    <option>Planejamento e Eficiencia Operacional</option>
                    <option>Planejamento RI</option>
                    <option>Prevecao de Perdas</option>
                    <option>Pricing</option>
                    <option>Regional OPV</option>
                    <option>Relac Negocio - OPV I</option>
                    <option>Relac Negocio - OPV II</option>
                    <option>Relacionamento com Negocio - Expansão</option>
                    <option>Relacionamento com Negocio - Matriz</option>
                    <option>Relacionamento Negocio - Corp & CD</option>
                    <option>Relações com Investidores</option>
                    <option>Squad</option>
                    <option>SAC\Multicanal</option>
                    <option>Secretaria</option>
                    <option>Segurança</option>
                    <option>Seguros e Risco</option>
                    <option>Serviços Atendimento ao Cliente - Drogasil</option>
                    <option>Serviços Gerais</option>
                    <option>Sistemas 1</option>
                    <option>Sistemas 2</option>
                    <option>Sistemas 3</option>
                    <option>Suporte Administrativo</option>
                    <option>Tecnologia da Informação</option>
                    <option>TI Desenvolvimento</option>
                    <option>TI Sat</option>
                    <option>TI Set</option>
                    <option>TI SSU</option>
                    <option>TI Telecom</option>
                    <option>Trade Marketing</option>
                    <option>Transportes</option>
                    <option>Tributario e Fiscal</option>
                    <option>Vendas Corp - Multicanal ADM</option>
                    <option>Vendas Empresariais -SP</option>
                    <option>Vendas Multicanal</option>
                    <option>Vendas Multicanal Call Center</option>
                    <option>Vendas PBM</option>
                </select>
            </div>
            <!-- Campo do Gestor do Colaborador -->
            <div class="form-group col-md-3 char">
                <label class="label" for="gestor">Gestor do Colaborador</label>
                <input type="text" name="gestor" class="form-control" id="gestor" placeholder="Nome do Gestor" value="<?= ($produto['gestor']) ?>" required>
            </div>
            <!-- Campo do VP da Área -->
            <div class="form-group col-md-3 char">
                <label class="label" for="vp_area">VP da Área</label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    <option value="<?= ($produto['vp']) ?>"><?= ($produto['vp']) ?></option>
                    <?php
                    include __DIR__ . "/../configuracoes/conecta.php";
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
            <!-- Campo da Mochila -->
            <div class="form-group col-md-3 char">
                <label class="label" for="mochila">Mochila</label>
                <select type="text" name="mochila" class="form-control" id="mochila" placeholder="VP da Área">
                    <option><?= ($produto['mochila']) ?></option>
                    <option>Sim</option>
                    <option>Não</option>
                </select>
            </div>
            <!-- Campo do Analista RH Responsável -->
            <div class="form-group col-md-4 char">
                <label class="label" for="analista_rh">Analista RH Responsável</label>
                <input type="text" name="analista_rh" class="form-control" id="analista_rh" placeholder="Analista RH Responsável" value="<?= ($produto['analista_rh']) ?>">
            </div>
            <!-- Campo da Data de Admissão-->
            <div class="form-group col-md-2 char">
                <label class="label" for="data-admissao">Data de Admissão</label>
                <div class="input-group date" data-date-format="dd/mm/yyyy">
                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="data_admissao" name="data_admissao" value="<?= ($produto['data_admissao']) ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <script>
                $("#data_admissao").mask("00/00/0000");
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>
            <!-- Campo do Regime de Contratação-->
            <div class="form-group col-md-3 char">
                <label class="label" for="regime_contratacao">Regime Contratação</label>
                <select type="text" name="regime_contratacao" class="form-control" id="regime_contratacao" placeholder="Regime Contratação" required>
                    <option><?= ($produto['regime_contratacao']) ?></option>
                    <option value="">Em Branco</option>
                    <option>CLT</option>
                    <option>PJ</option>
                    <option>Temporário</option>
                    <option>Estagiário</option>
                    <option>Jovem Aprendiz</option>
                    <option>Diretoria</option>
                </select>
            </div>
            <!-- Campo do Tipo de Vaga -->
            <div class="form-group col-md-3 char">
                <label class="label" for="tipo_de_vaga">Tipo de Vaga</label>
                <select type="text" name="tipo_de_vaga" class="form-control" id="tipo_de_vaga" placeholder="Tipo de Vaga" required>
                    <option><?= ($produto['tipo_de_vaga']) ?></option>
                    <option value="">Em Branco</option>
                    <option>Nova</option>
                    <option>Substituição</option>
                    <option>Efetivação</option>
                    <option>Temporário</option>
                    <option>Movimentação</option>
                </select>
            </div>
            <!-- Campo do Software Licenciado -->
            <div class="form-group col-md-3 char">
                <label class="label" for="software_licenciado">Software Licenciado</label>
                <input type="text" name="software_licenciado" class="form-control" id="software_licenciado" placeholder="Software Licenciado" value="<?= ($produto['software_licenciado']) ?>">
            </div>
            <!-- Campo do Analista RDTech Responsável -->
            <div class="form-group col-md-3 char">
                <label class="label" for="analista_ssu">Técnico Anterior Responsável</label>
                <input type="text" name="analista_ssu" class="form-control" id="analista_ssu" placeholder="Técnico Anterior Responsável" value="<?= ($produto['analista_ssu']) ?>" readonly>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="analista_ssu_atual">Técnico Atual Responsável</label>
                <input type="text" name="analista_ssu_atual" class="form-control" id="analista_ssu_atual" placeholder="Técnico Atual Responsável" value="<?php echo $_SESSION["user"] ?>" readonly>
            </div>
            <!-- Campo do Analista RDTech Responsável -->
            <div class="form-group col-md-3 char">
                <label class="label" for="versao_office">Versão do Office</label>
                <select type="text" name="versao_office" class="form-control" id="versao_office" placeholder="Versão do Office" required>
                    <option><?= ($produto['versao_office']) ?></option>
                    <option>Versão do Office</option>
                    <option>Office 2010 PRO PLUS</option>
                    <option>Office 2013 HOME BUSINESS</option>
                    <option>Office 2013 STANDARD</option>
                    <option>Office 2013 PROFISSIONAL</option>
                    <option>Office 2013 PROFISSIONAL PLUS</option>
                    <option>Office 2016 HOME BUSINESS</option>
                    <option>Office 2016 STANDARD</option>
                    <option>Office 2016 PROFISSIONAL</option>
                    <option>Office 2016 PROFISSIONAL PLUS</option>
                    <option>Office 2019 HOME BUSINESS</option>
                    <option>Office 2019 STANDARD</option>
                    <option>Office 2019 PROFISSIONAL</option>
                    <option>Office 2019 PROFISSIONAL PLUS</option>
                    <option>Office 365</option>
                    <option>Open Office</option>
                    <option>Sem Office</option>
                </select>
            </div>
            <!-- Campo Licença Office \ Email Office -->
            <div class="form-group col-md-3 char">
                <label class="label" for="licOff">Licença Office \ Email Office </label>
                <input type="text" name="licenca_office" class="form-control" id="licenca_office" placeholder="Licença Office \ Email Office" value="<?= ($produto['licenca_office']) ?>" required>
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="endereco_colaborador">Endereço do Colaborador</label>
                <input type="text" name="endereco_colaborador" class="form-control" id="endereco_colaborador" placeholder="Endereço" value="<?= ($produto['endereco_colaborador']) ?>">
            </div>
            <div class="form-group col-md-3 char">
                <label class="label" for="observacao">Observação</label>
                <input type="text" name="observacao" class="form-control" id="observacao" placeholder="Observação" value="<?= ($produto['observacao']) ?>">
            </div>
            </div>
            <!-- Botão para Salvar o Formulario -->
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="imprat.php?id=<?= $produto['id'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Check-List" style="background: #3a3f48; border-color:#3a3f48;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg>
                    </a>
                </div>
                <?php
                if ($produto['regime_contratacao'] === "PJ" or $produto['regime_contratacao'] === "Temporário") { ?>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <a href="imptermo_pj.php?id=<?= $produto['id'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Termo de Responsabilidade" style="background: #3a3f48; border-color:#3a3f48;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            </svg></a>
                    </div>
                <?php
                } else { ?>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <a href="imptermo.php?id=<?= $produto['id'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Termo de Responsabilidade" style="background: #3a3f48; border-color:#3a3f48;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            </svg></a>
                    </div>
                <?php
                }
                ?>
                <div class="btn-group mr-2" role="group" aria-label="Fourth group">
                    <button class="btn btn-primary" type="submit" data-tt="tooltip" data-placement="bottom" title="Salvar" style="background: #3a3f48; border-color:#3a3f48;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>
                    </button>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Fourth group">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#staticBackdrop" data-tt="tooltip" data-placement="bottom" title="Histórico de Colaboradores" style="background: #3a3f48; border-color:#3a3f48;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </button>
                </div>
                <script>
                    $("#status_equipamento_alterar").change(function() {
                        if (this.value == "Disponivel") {
                            $('#nome_colaborador').removeAttr('required');
                            $('#cpf_colaborador').removeAttr('required');
                            $('#cargo').removeAttr('required');
                            $('#departamento').removeAttr('required');
                            $('#gestor').removeAttr('required');
                            $('#id_categoria').removeAttr('required');
                            $('#id_sub_categoria').removeAttr('required');
                            $('#regime_contratacao').removeAttr('required');
                            $('#tipo_de_vaga').removeAttr('required');
                        }
                        if (this.value == "Doação") {
                            $('#localidade_alterar').removeAttr('required');
                            $('#cargo').removeAttr('required');
                            $('#departamento').removeAttr('required');
                            $('#id_sub_categoria').removeAttr('required');
                            $('#regime_contratacao').removeAttr('required');
                            $('#tipo_de_vaga').removeAttr('required');
                        }
                    });
                </script>
            </div>
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 36%;" ;>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Histórico de Colaboradores</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div id="table" class="table-editable table-responsive">
                                <table id="historico" class="display nowrap " style="width: 100%">
                                    <tbody>
                                        <?php $produtoss = listaHistorico($conexao, $ativo);
                                        foreach ($produtoss as $produtos) :
                                        ?>
                                            <tr>
                                                <td><?= $produtos['nome'] ?></td>
                                                <td><?= $produtos['analista'] ?></td>
                                                <td><?= $produtos['dataop'] ?></td>
                                            </tr>
                                        <?php
                                        endforeach
                                        ?>
                                        <script>
                                            $(document).ready(function() {
                                                $('#historico').DataTable({
                                                    "scrollY": 200,
                                                    "scrollX": true
                                                });
                                            });
                                        </script>
                                        <style type="text/css">
                                            div.dataTables_wrapper {
                                                width: 600;
                                                margin: 0 auto;
                                            }
                                        </style>
                                </table>
                            </div>
                        </div>
                    </div>
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