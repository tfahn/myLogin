<?php
// hash_pw.php?p=PASSWORT
// Diese Datei wird nicht auf dem Server ben�tigt
// Die Ausgabe im Feld pw_hash der Datenbank speichern (f�r den jeweiligen Nutzernamen)

echo password_hash( $_GET["p"], PASSWORD_DEFAULT );
