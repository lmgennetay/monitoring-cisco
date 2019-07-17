<?php

switch ($_GET['function']) {
        case 'formadd':
		    nouveauAppareil();
			break;
		case 'supprapp':
            supprimerAppareil($_GET['id']);
			break;
		case 2:
			echo "test";
			break;
    }
    
function nouveauAppareil() {
    if(isset($_POST['libelle'])) {
        set_appareil($_POST);
        include_once('Controllers/accueil.php');
    } else {
        include_once('Views/Form/AddMateriel.html');
        
    }
}

function supprimerAppareil($id)
{

        deleteAppareil($id);
        include_once('Controllers/accueil.php');
    
    
}
