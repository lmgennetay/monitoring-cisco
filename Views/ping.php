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
    <header class="menu"><?php include_once('Views/menu.php') ?></header>
    <div class="conteneur">
<div class="bloc bloc-tabs">
    <div class="bloc-content">

        <div id="pingChart" style="height:160px"></div>

        <table class="table table-responsive" id="ping">
            <tbody id="here">
                


            </tbody>
        </table>

    </div>
</div>


</div>
<script type="text/javascript">


    var datalist = new Array();
    reping(0, 0);

    function reping(counter, timelast)
    {
        window.setInterval(function(){
            $.ajax({url: "index.php?section=newconfig&function=pingInfo&ip=<?php echo $_SESSION['appareil']['ip'] ?>", success: function(result){
                $('#here').append("<tr><td>"+result+"</td></tr>");
            }});
        }, 1000);
        
        
    }

</script>
