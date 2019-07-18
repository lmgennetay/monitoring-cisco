<?php


//récupération des infos pouvant être modifiées
$nouveauLibelle=$_POST["TLibelle"];

//récupération des mots de passes
//$Mdp=$_POST["TMdp"];

//Activation de la modification
	include_once('models/model.php');
	set_modifAppareil($nouveauLibelle);

//affichage de la vue associée
	include_once('views/modifAppareil.php');

	?>