$(function(){
    $('.showModalButton').click(function (){
        if ($('#modal').data('bs.modal').isShown) {
            $('#modal').find('#modalContent')
                .load($(this).attr('value'));
            //dynamiclly set the header for the modal
        } else {
            //if modal isn't open; open it and load content
            $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
            //dynamiclly set the header for the modal
        }
    });
});

$(function(){
    $('.pay-content').click(function (){
    if ($('#modalPay').data('bs.modal').isShown) {
        $('#modalPay').find('#modalContent')
            .load($(this).attr('value'));
        //dynamiclly set the header for the modal
        document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
    } else {
        //if modal isn't open; open it and load content
        $('#modalPay').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
        //dynamiclly set the header for the modal
        document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
    }
    });
});