function verifySignUp() {

    var output = $('#output-logon');
    var firstName = $('#firstName').val();
    var lastName= $('#lastName').val();

    if (firstName.length==0 || lastName.length==0) {
        output.html('Primeiro e último nome necessários.');
        return false;
    }

    var password = $('#password-logon').val();

    if (password.length < 8) {
        output.html('Password tem de ter pelos menos 8 caracteres.');
        return false;
    }

    var passwordRepeat = $('#passwordConfirm-logon').val();

    if (password !== passwordRepeat) {
        output.html('Password de confirmação diferente da password indicada.');
        return false;
    }

    return true;

}

function verifySignIn() {

    var email=$('#overlay-login #email').val();
    var password=$('#overlay-login #password').val();
    var validLogin=false;
    var output = $('#output-login');

    $.ajax({
        type: "post",
        url: "../actions/sign_in.php",
        data: { Email : email, Password : password }
    }).done(function(data) {

        var value=JSON.parse(data);

        if(value==1) {
            $('#overlay-login form').removeAttr('onsubmit');
            $('#overlay-login form').submit();
        }

        if(value==0)
        {
            output.html('Email ou password errado.');
            validLogin=false;
        }

    });

    return false;

}