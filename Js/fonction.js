function selectAllApp() {
    if($('.selectionAppareil').is(":checked")) {
        $('.selectionAppareil').attr('checked', false);
    } else {
        $('.selectionAppareil').attr('checked', true);
    }
}