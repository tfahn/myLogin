<?php
session_start();

function check_password( $user, $pw ) {
	//TODO: Aus Datenbank & gehasht
	return 'user' == $user && 'pw' == $pw;
}

if ( ! isset( $_SESSION['eingeloggt'] ) || $_SESSION['eingeloggt'] != 1 ) {
    if ( isset( $_POST['login'] ) ) {
		
		$username = $_POST['username'];
		$password = $_POST['pass'];
		
        if ( check_password( $username, $password ) ) {
			// Login erfolgreich
            $_SESSION['eingeloggt'] = 1;
        } else {
            echo("Falsche Zugangsdaten");
            echo("<br><a href='login.php'>Noch einmal versuchen</a> ");
        }
    } else {
        ?>

        <form action="login.php" method="post">
            Benutzername:<input type="text" name="username"><br>
            Passwort:<input type="password" name="pass"><br>
            <input type="submit" name="login">
        </form>

        <?php
    }
} else {
    if( isset( $_POST['logout'] ) ) {
        session_destroy();
    } else {
        ?>
        <form action="login.php" method="post">
            <input type="submit" name="logout">
        </form>
<?php
    }
}
