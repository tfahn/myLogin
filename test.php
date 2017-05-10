<?php
if(!(isset($_SESSION['eingeloggt'])) && !($_SESSION['eingeloggt'] == 1)) {
    if (isset($_POST['Login'])) {
        if(($_POST['username'] == 'Username') && ($_POST['pass'] == 'Passwort')) {
            $_SESSION['eingeloggt'] = 1;
        }else{
            echo("Falsche Zugangsdaten");
            echo("<br><a href='test.php'>Noch einmal versuchen</a> ");
        }
    } else {
        ?>

        <form action="test.php" method="post">
            Benutzername:<input type="text" name="username"><br>
            Passwort:<input type="password" name="pass"><br>
            <input type="submit" name="Login">
        </form>

        <?php
    }
}else{
    if(isset($_POST['Logout'])){
        session_destroy();
    }else{
        ?>
        <form action="test.php" method="post">
            <input type="submit" name="Logout">
        </form>
<?php
    }
}
?>