<?php

//récupération de l'identifiant appareil passé en paramètre
	$idAppareilChoisi = $_GET["choixId"];
	
	
//récupération des infos  correspondant à l'appareil  choisi auparavant
	include_once('models/model.php');
	$appareilChoisi = get_detailAppareil($idAppareilChoisi);
	

// affichage de la vue associée

	include_once('Views/modifAppareil.php');