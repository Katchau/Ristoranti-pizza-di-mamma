function verifySignUp() {

    var FirstName = $('#overlay-logon #firstName').val();
    var LastName= $('#overlay-logon #lastName').val();
    var Birthday= $('#overlay-logon #birthday').val();
    var Password=$('#overlay-logon #password-logon').val();
    var PasswordConfirm=$('#overlay-logon #passwordConfirm-logon').val();
    var Email=$('#overlay-logon #email-logon').val();
    var output = $('#overlay-logon #output-logon');

    window.alert(FirstName+LastName+Birthday+Password+PasswordConfirm+Email);

    if (FirstName.length==0 || LastName.length==0) {
        output.html('Primeiro e último nome necessários.');
        return false;
    }

    if (Password.length < 8) {
        output.html('Password tem de ter pelos menos 8 caracteres.');
        return false;
    }

    if (Password !== PasswordConfirm) {
        output.html('Password de confirmação diferente da password indicada.');
        return false;
    }

    $.ajax({
        type: "post",
        url: "../actions/sign_up.php",
        data: { firstName : FirstName, lastName : LastName , birthday : Birthday , password : Password , passwordConfirm : PasswordConfirm , email : Email }
    }).done(function(data) {

        var value=JSON.parse(data);

        if(value==1) {
            $('#overlay-logon form').removeAttr('onsubmit');
            $('#overlay-logon form').submit();
        }

        if(value==0)
        {
            output.html('Email existente. Por favor indique um email novo.');
        }

    });

    return false;

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