<?php
session_start();
include_once('Models/model.php');
include_once('Connection/connection.php');


if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('Controllers/accueil.php');
}

else
{
	switch ($_GET['section']) {
		case 'newconfig':
		include_once('Controllers/appareil.php');
			die;
			break;
		case 1:
			echo "test";
			break;
		case 2:
			echo "test";
			break;
	}
}
