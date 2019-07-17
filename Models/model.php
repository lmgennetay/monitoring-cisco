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
	if($status == 0)
	{
		return "Up";
	}else{
		return "Down";
	}
	
}

?>
