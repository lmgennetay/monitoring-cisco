<?php

switch ($_GET['function']) {
        case 'formadd':
		    nouveauAppareil();
			break;
		case 'supprapp':
            supprimerAppareil($_GET['id']);
            break;
        case 'recherche':
            recherche();
            break;
		case 'formmodif':
			modifierAppareil();
			break;
        case 'ports':
            commande($_SESSION["appareil"]['id']);
            break;
        case 'consultPorts':
            $_SESSION['appareil'] = get_detailAppareil($_GET['id']);
            consultPorts();
            break;
        case 'submit':
            commande($_SESSION["appareil"]['id']);
            break;
        case 'pingApp':
            $_SESSION['appareil'] = get_detailAppareil($_GET['id']);
            pingApp();
            break;
        case 'pingInfo':
            pingInfo($_GET['ip']);
            break;
    }
    
function nouveauAppareil() {
    if(isset($_POST['libelle'])) {
        set_appareil($_POST);
        include_once('Controllers/accueil.php');
    } else {
        include_once('Views/AddMateriel.php');
    }
}

function supprimerAppareil($id) {
        deleteAppareil($id);
        include_once('Controllers/accueil.php');
}

function recherche() {
    if (isset($_POST['searchApp'])) {
        $listeAppareils = searchApp($_POST);
        foreach($listeAppareils as $k=>$v)
        {
            $listeAppareils[$k]['pingStatus'] = ping($listeAppareils[$k]['ip']);
        }
        $rechercheEnCours = $_POST['searchApp'];

        include_once('Views/accueil.php');
    }
}

function commande($id) {
    $commandesList = get_commands();
    
    if(isset($_POST['selected'])) {
        $content = file_get_contents("./Scripts/template.php");
        $content = iconv("CP1257","UTF-8", $content);
        $content = str_replace("%username%", $_SESSION['appareil']['identifiant'], $content);
        $content = str_replace("%password%", $_SESSION['appareil']['motdepasse'], $content);
        $content = str_replace("%enable_password%", $_SESSION['appareil']['motdepasse2'], $content);
        $content = str_replace("%ip%", $_SESSION['appareil']['ip'], $content);
        $commandline = explode(PHP_EOL, $_POST['commandeLine']);
        $com = "";
        foreach($commandline as $c) {
            $com .= trim('send "' . $c . '\n"') . PHP_EOL;
            $com .= 'expect "#"' . PHP_EOL;
        }
        $content = str_replace("%commandeici%", $com, $content);
        file_put_contents("./Scripts/template.txt", $content);

        echo"<pre>";
        echo $content;
        echo"</pre>";

        $current = file_get_contents("./Scripts/template.txt");
        file_put_contents("./Scripts/result.php", $current);
        unlink("./Scripts/template.txt");

        $output = shell_exec('expect ./Scripts/result.php');

        unlink("./Scripts/result.php");

        include_once('Views/commande.php');
    } else {
        include_once('Views/commande.php');
    }
}

function modifierAppareil() {
    if(isset($_POST)) {
        update_appareil($_POST);
        include_once('Controllers/accueil.php');
    } else {
        include_once('Views/modifAppareil.php');
    }
}

function pingApp() {
    include_once('Views/ping.php');
}

function consultPorts() {
    // $content = file_get_contents("./Scripts/template.php");
    // $content = str_replace("%username%", $_SESSION['appareil']['identifiant'], $content);
    // $content = str_replace("%password%", $_SESSION['appareil']['motdepasse'], $content);
    // $content = str_replace("%enable_password%", $_SESSION['appareil']['motdepasse2'], $content);
    // $content = str_replace("%ip%", $_SESSION['appareil']['ip'], $content);
    // $content = shell_exec('');
    $output = file_get_contents("./Scripts/exemple.php");
    $output = preg_split("/[\s]+/", $output);
    // print_r($output);
    $ligne = 0;
    $i = 0;
    $tab = Array();
    foreach($output as $o) {
        $tab[$ligne][$i] = $o;
        $i++;
        if($i == 7) {
            $ligne++;
            $i = 0;
        }
    }
    // print_r($tab);
    include_once('Views/ports.php');
}
