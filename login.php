<?php
session_start();

function check_password( $user, $pw ) {
	//TODO: Aus Datenbank & gehasht
	return 'user' == $user && 'pw' == $pw;
}

function is_logged_in() {
	return isset( $_SESSION['logged-in'] ) && $_SESSION['logged-in'] == 1;
}

// Zuerst prüfen, damit beim Logout gleich das Formular wieder angezeigt wird
if ( isset( $_GET['logout'] ) ) {
	session_destroy();
	unset ( $_SESSION['logged-in'] );
}

if ( ! is_logged_in() ) {
    if ( isset( $_POST['login'] ) ) {
		
		$username = $_POST['username'];
		$password = $_POST['pass'];
		
        if ( check_password( $username, $password ) ) {
			// Login erfolgreich
            $_SESSION['logged-in'] = 1;
			$_SESSION['user'] = $username;
			header('Location: login.php');
        } else {
            echo("Falsche Zugangsdaten");
            echo("<br><a href='login.php'>Noch einmal versuchen</a> ");
        }
    } else {
        ?>

        <form action="login.php" method="post">
            Benutzername: <input type="text" name="username"><br>
            Passwort: <input type="password" name="pass"><br>
            <input type="submit" name="login" value="Anmelden">
        </form>

        <?php
    }
} else {
?>
	<p>Hallo <?php echo $_SESSION['user']; ?>, hier steht was geheimes</p>	
	<a href="login.php?logout=1">Ausloggen</a>
<?php
}
