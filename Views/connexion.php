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
        <div class="conteneur-conn">
            <h1 class="text-center blue">Connexion à l'appareil *****</h1>
            <div class="separator"></div>
            <div class="connexionDiv">
                <form method="post" class="formConn">
                    <label for="id">Identifiant</label>
                    <input type="text" name="id" placeholder="Identifiant CISCO" class="inputConnApp">
                    <label for="id">Mot de passe</label>
                    <input type="password" name="mdp" placeholder="Mot de passe CISCO" class="inputConnApp">
                    <label for="id">Mot de passe n°2</label>
                    <input type="password" name="mdp2" placeholder="Mot de passe CISCO n°2" class="inputConnApp">
                    <input type="submit" name="submit" value="Se connecter" class="submitConnApp">
                </form>
            </div>
        </div>
        <footer><?php include_once('Views/footer.php') ?></footer>
    </body>
</html>
