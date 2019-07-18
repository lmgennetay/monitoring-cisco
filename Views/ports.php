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
        <form action="index.php?section=newconfig&function=submit" method="post" id="commande" name="commande" class="commande">
        <header class="menu"><?php include_once('Views/menu.php') ?></header>
        <div class="conteneur">
            <h1 class="text-center blue">Ports - commandes</h1>
            <div class="separator"></div>
                <div>

                </div>
                <div>
                    <select onchange="textArea()" name="selected" id="selectCommands" style="height:700px;overflow:auto;width:500px;float:left;" multiple>
                        <?php
                            print_r($commandesList);
                            foreach($commandesList as $command)
                            {
                                ?>
                                <option class="commandlist" data-comment="<?php echo $command['commentaire']; ?>" id="<?php echo $command['commande']; ?>" value="<?php echo $command['id']; ?>"><?php echo $command['label']; ?></option>
                                <?php
                            } 
                        ?>
                    </select>
                    <br>
                    <input type="text" id="search" name="search" placeholder="Rechercher"  onkeyup="searchCommand(this.value)">
                </div>
                <div style="float:right;">
                    <label for="commandeLine">Commande à éxecuter</label>

                    <textarea id="commandeLine" name="commandeLine"
                              rows="5" cols="33">

                    </textarea>
                    <br>
                    <label for="commentaire">Commentaire</label>
                    <textarea disabled id="commentaire" name="story"
                              rows="5" cols="33">

                    </textarea>
                    <br>
                    <label for="result">Resultat commande</label>
                    <textarea disabled id="result" name="story"
                              rows="5" cols="33">
                            <?php if(isset($result)){ echo result;} ?>
                    </textarea>
                </div>
                <button type="submit" name="modifier" value="2">Soumettre</button>
            </div>
        <footer><?php include_once('Views/footer.php') ?></footer>
        </form>
    </body>
</html>

<script>
function searchCommand($text) {
    
     $('.commandlist').each(function() {
        var text = $text;
        if(text != "")
        {
            if($(this).text().includes(text) == true)
            {
               $(this).show();
            }else{
                $(this).hide();
            }
        }else{
            $(this).show();
        }
        
    });
     }

     function textArea() {
        var commentaire = $( "#selectCommands option:selected" ).attr('data-comment');
        console.log(commentaire);
        var value = $( "#selectCommands option:selected" ).attr('id');
        $("#commandeLine").val(value);
        $("#commentaire").val(commentaire);
     }


        $( "#commande" ).submit(function( event ) {
            if($("#commandeLine").val().includes("<") == true || $("#commandeLine").val().includes(">") == true)
            {
                alert("La commande contient des erreurs");
                return false;
            }
            return true;
        });

</script>