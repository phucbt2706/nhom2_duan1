$(document).ready(function(){
    //Change quantity
    $(".site-btn-order").click(function(e){
        e.preventDefault();
        var user_id = $(".user_id").val();
        var total = $(".total").val();
        var note = $(".note").val();
        $.ajax({
            url: '?pages=order',
            method: 'POST',
            data: {
                user_id:user_id, 
                total:total,
                note:note
            },
            success: function (data) {
                alert("Order has been created!");
                window.location.reload();
                window.location.href = '?pages=shop';
            },
            error: function (xhr, ajaxOptions, thrownError) {
               console.log(xhr.status);
               console.log(thrownError);
            }
        });
    });
  
});