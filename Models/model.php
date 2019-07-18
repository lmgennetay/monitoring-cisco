<?php
function get_appareils()
{
    global $bdd;

    $req = $bdd->prepare(" SELECT * from appareils order by id desc ");
	$req->execute();
    $appareils = $req->fetchAll(PDO::FETCH_ASSOC);

    return $appareils;
}

function set_appareil($request)
{
    global $bdd;
	$libelle = ucfirst($_POST["libelle"]);
	$ip = $_POST["ip"];
	$identifiant = $_POST["identifiant"];
	$motdepasse = $_POST["motdepasse"];
	$motdepasse2 = $_POST["motdepasse2"];
	$req = $bdd->prepare("INSERT INTO appareils(`libelle`, `ip`,`identifiant`, `motdepasse`, `motdepasse2`)VALUES ('$libelle','$ip','$identifiant','$motdepasse','$motdepasse2')");
    $req->execute();

}

function ping($ip)
{
	exec("ping -n 1 ".$ip, $output, $status);
	//exec("ping -c 1 ".$ip, $output, $status);
	if($status == 0)
	{
		return "Up";
	}else{
		return "Down";
	}
	
}

function deleteAppareil($id)
{
    global $bdd;

    $req = $bdd->prepare(" DELETE from appareils where id = '$id' ");
	$req->execute();
}

function get_conn_user($request) {
	global $bdd;
	$resultat = "";
	$id = $_POST["id"];
	$mdp = $_POST["mdp"];
	$req = $bdd->prepare("SELECT user, mdp from user WHERE user = '$id' AND mdp = sha1('$mdp')");
    $req->execute();
	$user = $req->fetchAll(PDO::FETCH_ASSOC);
	if($user) {
		$_SESSION['token'] = sha1($id) . sha1($mdp);
		$_SESSION['id'] = sha1($id);
		$_SESSION['mdp'] = sha1($mdp);
		$resultat = "true";
	} else {
		$resultat = "false";
	}
    return $resultat;
}

function get_commands()
{
    global $bdd;

    $req = $bdd->prepare("SELECT * from commande order by label desc");
	$req->execute();
    $commandes = $req->fetchAll(PDO::FETCH_ASSOC);

    return $commandes;
}
function get_detailAppareil($idApp)
{
    global $bdd;  
    $req = $bdd->prepare("SELECT * FROM appareils WHERE id=$idApp");
	$req->execute();
    $appareils = $req->fetch();
        
    return $appareils;
}

function set_modifAppareil($wLibelleApp,$wIpApp,$wIdentifiantApp,$wMdpApp,$wMdp2App)
{
    global $bdd;
    $req = $bdd->prepare("UPDATE appareils SET libelle ='$wLibelleApp', ip ='$wIpApp', identifiant ='$wIdentifiantApp', motdepasse ='$wMdpApp', motdepasse2 ='$wMdp2App' WHERE id=$idApp");
	$req->execute();
}
