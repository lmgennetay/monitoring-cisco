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
            $_SESSION['appareil'] = get_detailAppareil($_GET['id']);
            ports($_SESSION["appareil"]['id']);
            break;
        case 'submit':
            ports($_SESSION["appareil"]['id']);
            break;
        case 'pingApp':
            pingApp();
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

function ports($id)
{

    $commandesList = get_commands();
    
    if(isset($_POST['selected'])) {

        $content = file_get_contents("./Scripts/template.php");
        $content = str_replace("%username%", $_SESSION['appareil']['identifiant'], $content);
        $content = str_replace("%password%", $_SESSION['appareil']['motdepasse'], $content);
        $content = str_replace("%enable_password%", $_SESSION['appareil']['motdepasse2'], $content);
        $content = str_replace("%ip%", $_SESSION['appareil']['ip'], $content);
        $commandline = explode(PHP_EOL, $_POST['commandeLine']);
        $com = "";
        foreach($commandline as $c) {
            $com .= 'send "' . $c . '\n"' . PHP_EOL;
            $com .= 'sleep 0.5' . PHP_EOL;
        }
        $content = str_replace("%commandeici%", $com, $content);
        file_put_contents("./Scripts/template.txt", $content);
        
        
        echo"<pre>";
        echo $content;
        echo"</pre>";
        die;

   //Edition du txt

        $current = file_get_contents("./Scripts/template.txt");
        file_put_contents("./Scripts/template2.php", $current);
        //traitement par le serveur

        unlink("./Scripts/template2.php");
        unlink("./Scripts/template.txt");

        include_once('Views/ports.php');
    } else {
        include_once('Views/ports.php');
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
    if(isset($_GET['ip'])) {
        $result = pingInfo($_GET['ip']);
        // foreach($result as $r) {
        //     $a = utf8_encode($r);
        //     echo $a . '<br>';
        // }
        print_r($result);
    } else {
        include_once('Controllers/accueil.php');
    }
}
