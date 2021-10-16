//Событие авторизации

$('.login-btn').click(function (event) {
    event.preventDefault();
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();
    $.ajax({
        url: 'inc/signin.php',
        method: 'POST',
        dataType: 'json',
        data:{
            login: login,
            password: password
        },
        success: function (data) {
            if (data.status){
                location.reload();
            }
            else {
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});