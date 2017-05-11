<?php
include_once( 'login-inc.php' );

function check_password( $user, $pw ) {
	$users = array( 
		'user' => '$2y$10$4b.HEihcOIOkaWSrr8P/UeSQsKvBGDqHBiuIB7AezgbATVqkZ/HLC', // PW: pw
		'test' => '$2y$10$R26LvhVF4y68sak69p2qVeWjh1e.ybDV0WQ7HpgFhS8WhjfdeSzze', // PW: test
	);
	//TODO: Aus Datenbank
	
	if ( !array_key_exists( $user, $users ) )
		return false;
	
	return password_verify( $pw, $users[ $user ] );
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
			
			header('Location: secret.php'); //TODO: URL anpassen
        } else {
            echo("Falsche Zugangsdaten");
            login_form();
        }
    } else {
        login_form();
    }
}

function login_form() {
?>

	<form action="login.php" method="post">
		Benutzername: <input type="text" name="username"><br>
		Passwort: <input type="password" name="pass"><br>
		<input type="submit" name="login" value="Anmelden">
	</form>

<?php
}
