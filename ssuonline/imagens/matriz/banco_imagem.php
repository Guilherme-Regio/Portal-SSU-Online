<?php
if (isset($_SESSION['user'])) :
    ini_set('default_charset', 'UTF-8');
?>
<?php
    function removeImagem($conexao, $id)
    {
        $query = "DELETE FROM imagens where id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function inseriImagem($conexao, $nome, $versao, $descricao, $departamento, $caminho)
    {
        $query = "insert into imagens (nome, versao, descricao, departamento, download) 
    values ('{$nome}','{$versao}','{$descricao}','{$departamento}','{$caminho}')";
        return mysqli_query($conexao, $query);
    }
    function updateImagem($conexao, $nome_imagem_alt, $departamento_alt, $descricao_alt, $versao_alt, $id)
    {
        $query = "UPDATE imagens SET nome='$nome_imagem_alt', departamento='$departamento_alt', descricao='$descricao_alt', versao='$versao_alt' WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function buscaControle($conexao, $id)
    {
        $query = "SELECT * FROM imagens where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
