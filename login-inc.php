<?php

session_start();

function is_logged_in() {
	return isset( $_SESSION['logged-in'] ) && $_SESSION['logged-in'] == 1;
}
