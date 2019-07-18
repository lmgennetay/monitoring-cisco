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
            <h1 class="text-center blue">Accueil</h1>
            <div class="separator"></div>
            <div class="search-container">
                <form action="index.php?section=newconfig&function=recherche" method="post" class="rechercheForm">
                    <input type="text" placeholder="Rechercher un nom d'appareil ou un IP..." name="searchApp" class="rechercheBar">
                    <button type="submit" class="submitRecherche"><i class="fa fa-search"></i></button>
                </form>
                <?php if(isset($rechercheEnCours) && $rechercheEnCours != "") { echo '<div class="rechercheEnCours">"' . $rechercheEnCours . '" <a href="index.php" onclick="exitSearch()" class="exitRecherche"><i class="fas fa-times-circle"></i></div>'; } ?>
            </div>
            <a href="index.php?section=newconfig&function=formadd" class="ajoutApp">+ Ajouter un appareil</a>
            <table class="text-center">
                <tbody>
                    <tr>
                        <th><input type="checkbox" id="selectionToutAppareil" name="selectionToutAppareil" onclick="selectAllApp(this)"></th>
                        <th></th>
                        <th class="col">Nom de l'appareil</th>
                        <th class="col">IP</th>
                        <th class="col">État</th>
                        <th class="col">Action</th>
                    </tr>
                    <?php
                    foreach($listeAppareils as $appareil)
                    {
                    ?>
                        <tr class="appareil">
                            <td><input type="checkbox" class="selectionAppareil"></td>
                            <?php
                                if($appareil['pingStatus'] == "Up"){
                                    ?>
                                    <td><span class="pastille-green"><i class="fas fa-circle"></i></span></td>
                                    <?php
                                }elseif($appareil['pingStatus'] == "Down"){
                                    ?>
                                    <td><span class="pastille-red"><i class="fas fa-circle"></i></span></td>
                                    <?php
                                }


                            ?>
                            <td><label><?php echo $appareil['libelle']; ?></label></td>
                            <td><label><?php echo $appareil['ip']; ?></label></td>
                            <td><label><?php echo $appareil['pingStatus']; ?></label></td>
                            <td>
                                <a class="buttonConn" href="index.php?section=connection&function=formConn">Consulter les ports</a>
                                <a class="buttonConn" href="/ping"><i class="fas fa-chart-line"></i></a>
                                <a class="buttonConn" href="index.php?section=supprapp&function=supprapp&id=<?= $appareil['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <footer><?php include_once('Views/footer.php') ?></footer>
    </body>
</html>
