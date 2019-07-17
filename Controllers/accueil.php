<?php
$listeAppareils = get_appareils();
$appareil = null;
foreach($listeAppareils as $k=>$v)
{
	$listeAppareils[$k]['pingStatus'] = ping($listeAppareils[$k]['ip']);
}

include_once('Views/accueil.php');

