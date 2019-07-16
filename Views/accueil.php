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
        <link rel="icon" href="Assets/Images/favicon.png">
    </head>

    <body>
        <header class="menu"><?php include_once('Views/menu.php') ?></header>
        <div class="conteneur">
            <h1 class="text-center">Accueil</h1>
            <a href="index.php?section=newconfig">+</a>
            <table class="text-center">
                <tbody>
                    <tr>
                        <th><input type="checkbox" name="selectionToutAppareil"></th>
                        <th></th>
                        <th class="col">Nom de l'appareil</th>
                        <th class="col">IP</th>
                        <th class="col">État</th>
                        <th class="col">Action</th>
                    </tr>
                    <tr class="appareil">
                        <td><input type="checkbox" name="selectionAppareil"></td>
                        <td><span style="color: #00d000"><i class="fas fa-circle"></i></span></td>
                        <td><label>Nom de l'appareil</label></td>
                        <td><label>IP</label></td>
                        <td><label>Connecté</label></td>
                        <td>
                            <a class="buttonConn" href="/ports">Consulter les ports</a>
                            <a class="buttonConn" href="/ping"><i class="fas fa-chart-line"></i></a>
                            <a class="buttonConn" href="/suppr_appareil"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr class="appareil">
                        <td><input type="checkbox" name="selectionAppareil"></td>
                        <td><span style="color: red"><i class="fas fa-circle"></i></span></td>
                        <td><label>Nom de l'appareil</label></td>
                        <td><label>IP</label></td>
                        <td><label>Déconnecté</label></td>
                        <td>
                            <a class="buttonConn" href="/ports">Consulter les ports</a>
                            <a class="buttonConn" href="/ping"><i class="fas fa-chart-line"></i></a>
                            <a class="buttonConn" href="/suppr_appareil"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr class="appareil">
                        <td><input type="checkbox" name="selectionAppareil"></td>
                        <td><span style="color: orange"><i class="fas fa-circle"></i></span></td>
                        <td><label>Nom de l'appareil</label></td>
                        <td><label>IP</label></td>
                        <td><label>Désactivé</label></td>
                        <td>
                            <a class="buttonConn" href="/ports">Consulter les ports</a>
                            <a class="buttonConn" href="/ping"><i class="fas fa-chart-line"></i></a>
                            <a class="buttonConn" href="/suppr_appareil"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <footer><?php include_once('Views/footer.php') ?></footer>
    </body>
</html>
