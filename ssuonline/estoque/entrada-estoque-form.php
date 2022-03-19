<?php session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../configuracoes/banco-acesso.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    if (verificaEstoque()) {
    };
?>
    <form accept-charset="utf-8" class="display nowrap " action="add-entrada-estoque.php" method="POST">
        <!-- Primeiro form -->
        <div class="form-row">
            <!-- Campo do Status do Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="status_equipamento">Status Equipamento</label>
                <select class="form-control" type="text" id="status_equipamento" name="status_equipamento" required>
                    <option selected>Disponivel</option>
                    <option>Em uso</option>
                    <option>Onboarding</option>
                    <option>Rollout</option>
                    <option>Doação</option>
                    <option>Roubo/Furto</option>
                    <option>Obsoleto/Descarte</option>
                    <option>Aguardando Devolução</option>
                    <option>Empréstimo</option>
                    <option>Quarentena</option>
                    <option>Backup</option>
                    <option>Manutenção</option>
                    <option>Aguardando Doação</option>
                    <option>Doação Vitat</option>
                </select>
            </div>
            <!-- Campo da localidade -->
            <div class="form-group col-md-2 char">
                <label class="label" for="localidade">Localidade</label>
                <input class="form-control" type="text" id="localidade" placeholder="Localidade" value="Matriz" name="localidade" required>
            </div>
            <!-- Campo do Ativo -->
            <div class="form-group col-md-2 char">
                <label class="label" for="ativo">Ativo</label>
                <input class="form-control" type="text" id="ativo" placeholder="Ativo" name="ativo" pattern="[0-9]+$" required>
            </div>
            <!-- Campo do Número de Série -->
            <div class="form-group col-md-2 char">
                <label class="label" for="numero_serie">Número de Série</label>
                <input class="form-control" type="text" id="numero_serie" placeholder="Número de Série" name="numero_serie" required>
            </div>
            <!-- Campo do Modelo do Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="modelo_equipamento">Modelo do Equipamento</label>
                <select class="form-control" type="text" id="modelo_equipamento" name="modelo_equipamento" required>
                    <option>Selecione</option>
                    <option>Alugado Catalog</option>
                    <option>Alugado Dell</option>
                    <option>Alugado Lenovo</option>
                    <option>DELL OptiPlex 3050</option>
                    <option>DELL OptiPlex 3060</option>
                    <option>DELL OptiPlex 7050</option>
                    <option>iMac (21.5-inch, 2017)</option>
                    <option>Macbook Air Intel</option>
                    <option>Mac Mini (Late 2014)</option>
                    <option>MacBook Pro (13-inch, 2015)</option>
                    <option>MacBook Air (13-inch, 2017)</option>
                    <option>MacBook Pro (13-inch, 2019)</option>
                    <option>Macbook Pro 13</option>
                    <option>MacBook Pro (13-inch, 2020)</option>
                    <option>Macbook Pro 16</option>
                    <option>DELL Latitude 3410</option>
                    <option>DELL Latitude 3420</option>
                    <option>DELL Latitude 3450</option>
                    <option>DELL Latitude 3470</option>
                    <option>DELL Latitude 3480</option>
                    <option>DELL Latitude 3490</option>
                    <option>DELL Latitude 5400</option>
                    <option>DELL Latitude 5320</option>
                    <option>DELL Latitude 5320 2X1</option>
                    <option>DELL Latitude 5410</option>
                    <option>DELL Latitude 5420</option>
                    <option>DELL Latitude 5480</option>
                    <option>DELL Latitude 5490</option>
                    <option>DELL Latitude 7380</option>
                    <option>DELL Latitude 7400</option>
                    <option>DELL Latitude 7480</option>
                    <option>DELL Latitude 7490</option>
                    <option>DELL Vostro </option>
                    <option>DELL 3400</option>
                    <option>Lenovo Thinkpad L390</option>
                    <option>Lenovo ThinkPad E14 Gen2</option>
                    <option>Outros</option>
                </select>
            </div>
            <!-- Campo do Sistema Operacional -->
            <div class="form-group col-md-3 char">
                <label class="label" for="sistema_operacional">Sistema Operacional</label>
                <select class="form-control" type="text" id="sistema_operacional" name="sistema_operacional" required>
                    <option>Selecione</option>
                    <option>Mac OS</option>
                    <option>Windows</option>
                    <option>Linux</option>
                </select>
            </div>
            <!-- Campo do Processador -->
            <div class="form-group col-md-2 char">
                <label class="label" for="processador">Processador</label>
                <select class="form-control" type="text" id="processador" name="processador" required>
                    <option>Selecione</option>
                    <option>Core I3</option>
                    <option>Core I5</option>
                    <option>Core I7</option>
                    <option>Core I9</option>
                    <option>M1</option>
                </select>
            </div>
            <!-- Campo da Data de Aquisição -->
            <div class="form-group col-md-2 char">
                <label class="label" for="data_aquisicao">Data de Aquisição</label>
                <div class="input-group date" data-date-format="dd/mm/yyyy">
                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="data_aquisicao" name="data_aquisicao" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'> </script>
            <script>
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>
            <!-- Campo da Data de Garantia -->
            <div class="form-group col-md-2 char">
                <label class="label" for="garantia_equipamento">Data de Garantia</label>
                <div class="input-group date" data-date-format="dd/mm/yyyy">
                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="garantia_equipamento" name="garantia_equipamento" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'> </script>
            <script>
                $('.input-group.date').datepicker({
                    format: "dd/mm/yyyy"
                });
            </script>
            <!-- Campo do Analista Responsável por Receber o Equipamento -->
            <div class="form-group col-md-3 char">
                <label class="label" for="analista_ssu">Técnico</label>
                <input type="text" name="analista_ssu" readonly class="form-control" id="analista_ssu" value=" <?php echo $_SESSION['user']; ?>">
            </div>
            <div class="form-group col-md-4 char">
                <label class="label" for="nota_fiscal_equipamento">Nota Fiscal do Equipamento</label>
                <input type="text" name="nota_fiscal_equipamento" class="form-control" placeholder="Nota Fiscal" id="nota_fiscal_equipamento" required>
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