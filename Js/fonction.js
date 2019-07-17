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
