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
        case 'ports':
            $_SESSION['appareil'] = get_detailAppareil($_GET['id']);
            ports($_SESSION["appareil"]['id']);
            break;
        case 'submit':
            ports($_SESSION["appareil"]['id']);
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

        $return = "coucou";
        include_once('Views/ports.php');
    } else {
        include_once('Views/ports.php');
    }
}
    
