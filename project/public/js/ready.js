$(function() {
   

    initDialogWindow();
    
    
    $('#modal-dialog').on('shown.bs.modal', function (e) {
      
    });

    $('.sumToText').each(function(){
        $(this).text($(this).text().replace(/\B(?=(\d{3})+(?!\d))/g, "`"));
    });

    $(".alert").delay(5000).fadeTo("slow", 0).slideUp(500, function(){
        $(this).remove();
    });


});




function initDialogWindow()
{
    $(".DialogUser").on( "click", function() {
        DialogUser($( this ).attr('href'));
        return false;
    });


    $(".DialogUserMin").on( "click", function() {
        DialogUserMin($( this ).attr('href'));
        return false;
    });




    $(".DialogUserSMin").on( "click", function() {
        DialogUserSMin($( this ).attr('href'));
        return false;
    });
}






function parseJson(){
    
    
}