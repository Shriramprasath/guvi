$(document).ready(function() {

    const name = localStorage.getItem('datas');
   
    $.ajax({
        method: 'GET',
        url: './php/profile.php',
        dataType:'json',
        data:{
            name:name
        },
        success: function(res) {
            var html = '';
            $.each(res, function(key, value) {
              html += '<div class="data">';
              html += '<p>USERNAME: ' + value.name + '</p>';
              html += '<p>PASSWORD: ' + value.pas + '</p>';
              html += '<p>COLLEGE: ' + value.clg + '</p>';
               html += '<p>EMAIL: ' + value.em + '</p>';
              html += '<p>Dob: ' + value.dob + '</p>';
              html += '<p>PHONE NUMBER: ' + value.ph + '</p>';
              html += '</div>';
            });
            $('#display').html(html);

        },
        error: function(res)
        {
                alert("Something went wrong in front end");
        }
    });
});

const logout = () =>{
    localStorage.removeItem('datas');
    window.location.replace('http://localhost:8080/guvi/login.html');
}


