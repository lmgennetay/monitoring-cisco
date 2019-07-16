<?php

include_once('Connection/connection.php');


if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('Controllers/accueil.php');
}

else
{
	switch ($_GET['section']) {
		case 'test':
			echo "test";
			break;
		case 1:
			echo "i égal 1";
			break;
		case 2:
			echo "i égal 2";
			break;
	}
}
