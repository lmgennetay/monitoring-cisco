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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="Js/fonction.js"></script>
        <link rel="icon" href="Assets/Images/favicon.png">
    </head>

    <body>
        <header class="menu"><?php include_once('Views/menu.php') ?></header>
        <div class="conteneur">
            <h1 class="text-center blue">Liste des ports - Appareil <span class="black"><?= $_SESSION["appareil"]['libelle'] ?></span></h1>
            <div class="separator"></div>
            <a href="index.php?section=newconfig&function=ports&id=<?php echo $_SESSION["appareil"]['id'] ?>" class="ajoutApp"><i class="fas fa-plus"></i> Lancer des commandes</a>
            <table class="text-center tablePorts">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectionToutAppareil" name="selectionToutAppareil" onclick="selectAllApp(this)"></th>
                        <th class="col">Ports</th>
                        <th class="col">Name</th>
                        <th class="col">Status</th>
                        <th class="col">Vlan</th>
                        <th class="col">Duplex</th>
                        <th class="col">Speed</th>
                        <th class="col">Type</th>
                        <th class="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($tab)) {
                        $i = 0;
                        foreach($tab as $ligne) {
                            if($i != 0) {
                        ?>
                            <tr class="appareil">
                                <td><input type="checkbox" class="selectionAppareil"></td>
                                <td><label><?php echo $ligne['0']; ?></label></td>
                                <td><label><?php echo $ligne['1']; ?></label></td>
                                <td><label><?php echo $ligne['2']; ?></label></td>
                                <td><label><?php echo $ligne['3']; ?></label></td>
                                <td><label><?php echo $ligne['4']; ?></label></td>
                                <td><label><?php echo $ligne['5']; ?></label></td>
                                <td><label><?php echo $ligne['6']; ?></label></td>
                                <td>
                                    <!-- <a class="buttonConn" href="index.php?section=newconfig&function=ports&id=<?php echo $appareil['id'] ?>">Commandes</a> -->
                                </td>
                            </tr>
                        <?php
                            }
                            $i++;
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="9">Aucun ports trouvées.</td>
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
