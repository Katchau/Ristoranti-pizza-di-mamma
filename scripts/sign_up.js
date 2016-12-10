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
        output.html('Password tem de ter pelos menos 8 caracteres.'+password.length);
        return false;
    }

    var passwordRepeat = $('#passwordConfirm-logon').val();

    if (password !== passwordRepeat) {
        output.html('Password de confirmação diferente da password indicada.');
        return false;
    }

    return true;

}