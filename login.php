<?php
include_once( 'connectDB.php' );
include_once( 'login-inc.php' );

function check_password( $user, $pw ) {
	global $db_link;
	
	$res = runSQL( "SELECT pw_hash FROM users WHERE user=\"" . mysqli_real_escape_string( $db_link, $user ) . "\"" );
	$count = $res->num_rows;
	
	if ( $count != 1 )
		return false;
	
	$row = $res->fetch_row();
	$pw_hash = $row[0];

	return password_verify( $pw, $pw_hash );
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
