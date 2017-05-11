<?php
include_once( 'login-inc.php' );

if ( ! is_logged_in() ) {
	header( 'Location: login.php' );
	die ( 'Keine Berechtigung!' );
}

?>
<p>Hallo <?php echo $_SESSION['user']; ?>, hier steht was geheimes</p>	
<a href="login.php?logout=1">Ausloggen</a>