<?php 

switch ($_GET['function']) {
        case 'formadd':
		nouveauAppareil();
			break;
		case 1:
			echo "test";
			break;
		case 2:
			echo "test";
			break;
    }
    
    function nouveauAppareil()
    {
        if(isset($_POST['appareil']))
        {
            include_once('Controllers/accueil.php');
        }else{
            include_once('');
        }
        
        
    }