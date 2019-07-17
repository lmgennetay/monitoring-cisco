<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Monitoring CISCO">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Julien DROUART, Louis-Marie GENNETAY, Louis MAUGER">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monitoring CISCO</title>
        <link rel="stylesheet" href="Assets/Css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script type="text/javascript" src="Js/fonction.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="icon" href="Assets/Images/favicon.png">
    </head>

    <body>
        <header class="menu"><?php include_once('Views/menu.php') ?></header>
        <div class="conteneur">
            <h1 class="text-center blue">Ajout d'un appareil</h1>
            <div class="separator"></div>
            <div class="formAppDiv">
                <form class="formApp"  method="post" action="index.php?section=newconfig&function=formadd">              
                    <ul>
                        <li id="li_1" >
                            <label class="description" for="element_1">Libelle </label>
                            <div>
                                <input id="libelle" name="libelle" require class="element text medium inputConnApp" type="text" maxlength="255" value=""/> 
                            </div> 
                        </li>	

                        <li id="li_2" >
                            <label class="description" for="element_2">IP
                            </label>
                            <div>
                                <input id="ip" name="ip" require class="element text medium inputConnApp" type="text" maxlength="255" value=""/> 
                            </div> 
                        </li>

                        <li id="li_3" >
                            <label class="description" for="element_3">Identifiant </label>
                            <div>
                                <input id="identifiant" require name="identifiant" class="element text medium inputConnApp" type="text" maxlength="255" value=""/> 
                            </div> 
                        </li>

                        <li id="li_4" >
                            <label class="description" for="element_4">Mot de passe </label>
                            <div>
                                <input id="motdepasse" require name="motdepasse" class="element text medium inputConnApp" type="password" maxlength="255" value=""/> 
                            </div> 
                        </li>	

                        <li id="li_5" >
                            <label class="description" for="element_5">Mot de passe 2 </label>
                            <div>
                                <input id="motdepasse2" require name="motdepasse2" class="element text medium inputConnApp" type="password" maxlength="255" value=""/> 
                            </div> 
                        </li>

                        <li class="buttons">
                        <input type="hidden" name="form_id" value="73894" />

                        <input id="saveForm" type="submit" value="Submit" class="submitConnApp" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <footer><?php include_once('Views/footer.php') ?></footer>
    </body>
</html>
