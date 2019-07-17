<?php

session_start();
include_once('Models/model.php');
include_once('Connection/connection.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
	if (!isset($_SESSION['token']) && !isset($_SESSION['id']) && !isset($_SESSION['mdp'])) {
		include_once('Controllers/accueil.php');
	} else {
		if ($_SESSION['token'] == $_SESSION['id'] . $_SESSION['mdp']) {
			include_once('Controllers/accueil.php');
		} else {
			include_once('Controllers/connection.php');
		}
	}
} else {
	if (!isset($_SESSION['token']) && !isset($_SESSION['id']) . !isset($_SESSION['mdp'])) {
		include_once('Controllers/connection.php');
	} else {
		switch ($_GET['section']) {
			case 'newconfig':
				include_once('Controllers/appareil.php');
				die;
				break;
			case 'connection':
				include_once('Controllers/accueil.php');
				die;
				break;
			case 'detailAppareil':
				include_once('Controllers/detailAppareil.php');
				die;
				break;
			case 2:
				echo "test";
				break;
		}
	}
}
