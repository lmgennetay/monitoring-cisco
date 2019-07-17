<?php

switch ($_GET['function']) {
        case 'formadd':
		    nouveauAppareil();
			break;
		case 'supprapp':
            supprimerAppareil($_GET['id']);
			break;
        case 'ports':
            ports($_GET['id']);
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

function supprimerAppareil($id)
{
        deleteAppareil($id);
        include_once('Controllers/accueil.php');
}

function ports($id)
{
        include_once('Controllers/accueil.php');
}
