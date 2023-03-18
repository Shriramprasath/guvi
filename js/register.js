$(document).ready(function(){
    $('form').submit(function(event){
        event.preventDefault();
       
        var detail = $('form').serialize();
        alert(detail)
        $.ajax({
            type: 'POST',
            url: './php/register.php',
            data: detail,
            success: function(response){
                $('#message').html(response);
            }
        });
    });
});
