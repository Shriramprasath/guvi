var check = localStorage.getItem('data');
if(check != null){
   window.location.href = "profile.php";
}
$(document).ready(function(){
    $("#login").click(function(){
        var username = $("input[name='name']").val();
        var password = $("input[name='pas']").val();
        $.ajax({
            url: "./php/login.php",
            type: "POST",
            data: {name: username, pas: password},
            
            success: function(data){
                if(data.trim() === "Login successful"){
                    window.location = "../php/profile.php";
                }else{
                    
                    $("#message").html(data);
                }
            }
        });
    });
});
