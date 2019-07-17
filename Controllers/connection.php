<?php

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
	include_once('Views/connUser.php');
} else {
	switch ($_GET['function']) {
		case 'formConn':
			formConn();
			break;
		case 'sendConnUser':
			sendConnUser();
			break;
		case 'deconn':
			deconn();
			break;
		default:
			ConnUser();
			break;
	}
}

function formConn()
{
	include_once('Views/connexion.php');
}

function ConnUser()
{
	include_once('Views/connUser.php');
}

function sendConnUser()
{
	if(isset($_POST['id']) && isset($_POST['mdp'])) {
		$result = get_conn_user($_POST);
		if ($result == 'true') {
			include_once('Controllers/accueil.php');
		} else {
			include_once('Views/connUser.html');
		}
	} else {
		include_once('Views/connUser.html');
	}
}

function deconn() {
	$_SESSION = array();
	session_destroy();
	include_once('Views/connUser.php');
}
