<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) :
    include("banco-acesso.php");
    include("conecta.php");
    $acess = $_SESSION['user'];
    $acesso = "'" . $acess . "'";
    include __DIR__ . "/../imagens/loja/banco_imagem.php";
?>
    <?php
    if (editImagem()) {
    } ?>
    <?php
    ini_set('default_charset', 'UTF-8');
    $id = $_GET['id'];
    $produto = buscaControle($conexao, $id);
    ?>
    <form action="/imagens/loja/atualiza_imagem.php" class="display nowrap" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="form-row">
            <div class="form-group col-md-6 char">
                <label class="label" for="nome_imagem_alterar">Nome da Imagem</label>
                <input type="text" name="nome_imagem_alterar" class="form-control" id="nome_imagem_alterar" placeholder="Nome da Imagem" value="<?= ($produto['nome']) ?>">
            </div>
            <div class="form-group col-md-6 char">
                <label class="label" for="departamento_alterar">Departamento</label>
                <select type="text" name="departamento_alterar" class="form-control" id="departamento_alterar" placeholder="Departamento da Imagem">
                    <option value="<?= ($produto['departamento']) ?>"><?php echo $produto['departamento'] ?></option>
                    <option value="Matriz - SSU">Matriz - SSU</option>
                    <option value="Matriz - SSU">Farmácias</option>
                </select>
            </div>

            <div class="form-group col-md-6 char">
                <label class="label" for="descricao_alterar">Descrição</label>
                <input type="text" name="descricao_alterar" class="form-control" id="descricao_alterar" placeholder="Descrição da Imagem" value="<?= ($produto['descricao']) ?>">
            </div>
            <div class="form-group col-md-6 char">
                <label class="label" for="versao_alterar">Versão</label>
                <input type="text" name="versao_alterar" class="form-control" id="versao_alterar" placeholder="Versão" value="<?= ($produto['versao']) ?>">
            </div>
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
            <?php
            ?>
            <?php include __DIR__ . "/../footer.php"; ?>
        <?php

    else :

        echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

        exit();
    endif;

        ?>