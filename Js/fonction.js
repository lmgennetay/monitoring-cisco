function selectAllApp() {
    $('.selectionAppareil').each(function() {
        if($(this).prop('checked')) //si case courante coché
        {
            if($('#selectionToutAppareil').is(":not(:checked)")){ //si case principale cochée
                $(this).prop('checked', false);
            }
        }else{ //si case courante non cochée
            if($('#selectionToutAppareil').is(":checked")){ //si case principale cochée
                $(this).prop('checked', true);
            }
        }
    });
}

function searchCommand($text) {
    console.log("ici");
}

window.onbeforeunload = function (e) {
    // $('.fa-sync-alt').addClass('fa-pulse');
    $('.conteneurReload').html('<a href="index.php"><span class="buttonReload"><i class="fas fa-sync-alt fa-pulse"></i></span> En cours...</a>');
}

window.onload = function(e) {
    // $('.fa-sync-alt').removeClass('fa-pulse');
    $('.conteneurReload').html('<a href="index.php"><span class="buttonReload"><i class="fas fa-sync-alt"></i></span> Recharger</a>');
}
