<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {

    $adServer = "ldap://dominio.com";

    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ldaprdn = 'dominio' . "\\" . $username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);

    if ($bind) {
        $filter = "(sAMAccountName=$username)";
        $result = ldap_search($ldap, "dc=dominio,dc=com", $filter);
        $info = ldap_get_entries($ldap, $result);
        for ($i = 0; $i < $info["count"]; $i++) {
            if ($info['count'] > 1)
                break;
            $_SESSION["user"] = $info[$i]["name"][0];
            $_SESSION["grupos"] = $info[$i]['memberof'];
            $_SESSION["nick"] = $info[$i]["samaccountname"][0];
            $_SESSION["cargo"] = $info[$i]["title"][0];
            header("Location: home.php");
        }
        @ldap_close($ldap);
    } else {
        echo ("<script>
        window.alert('login ou senha inválidos!')
        window.location.href='index.php';
        </script>");
    }
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>SSU Online</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link href="/bibliotecas/bootstrap-4/css/bootstrap.css" rel="stylesheet" />
        <link href="/bibliotecas/css/rat.css" rel="stylesheet" />

        <link rel="icon" href="icon/rd.ico">
    </head>

    <body>
        <div class="container">
            <div id="login">
                <form action="" method="POST" class="form-signin formulario">
                    <br></br>
                    <div class="text-center mb-4 user-center">
                        <h1>SSU Online</h1>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="username" class="form-control" placeholder="Login" required autofocus>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name="password" class="form-control" placeholder="Senha" required>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="ok" value="Logar">Entrar</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2022</p>
                </form>

                <?php echo isset($erro) ? $erro : '';  ?>
            </div>
        </div>
    </body>

    </html>
<?php } ?>