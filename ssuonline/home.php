<?php
session_start();
require_once 'html.php';
?>
<br></br>
<br></br>
<br></br>
<br></br>
<h1 style="font-family: vag-rounded-bold; color: #3a3f48; font-size: 4.5em; text-align: center;">Bem vindo, <?php echo $_SESSION["user"] ?>!!!</h1>
<p class="span12 text-center">SSU Online.</p>
<?php include("footer.php"); ?>
<style>
    @font-face {
        font-family: vag-rounded-bold;
        src: url(/configuracoes/fonts/vag-rounded-bold.ttf)
    }
</style>