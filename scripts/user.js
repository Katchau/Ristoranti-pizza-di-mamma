function verifyRedifinePass() {
  var password=$('#overlay-changePassword #password').val();
  var new_password=$('#overlay-changePassword #new_password').val();
  var new_password_confirm=$('#overlay-changePassword #new_password_confirm').val();
  var output = $('#output-changePassword');

  $.ajax({
      type: "post",
      url: "../actions/change_password.php",
      data: { password : password, new_password : new_password, new_password_confirm : new_password_confirm}
  }).done(function(data) {

      var value=JSON.parse(data);

      if(value==0)
      {
          $('#overlay-changePassword form').removeAttr('onsubmit');
          $('#overlay-changePassword form').submit();
      }

      if(value==1) {
        output.html('Password muito pequena. Escolha uma nova, por favor.');
      }

      if(value==2) {
        output.html('Um erro ocurreu ao tentar alterar a sua password.');
      }

      if(value==3) {
        output.html('Nova Password não coincide com a confirmação.');
      }

      if(value==4) {
        output.html('Password atual está incorreta.');
      }
  });

  return false;
}

function verifyRedifineMail() {
  var novo_email=$('#overlay-changeEmail #novo_email').val();
  var output = $('#output-changeEmail');

  $.ajax({
      type: "post",
      url: "../actions/change_email.php",
      data: { novo_email : novo_email}
  }).done(function(data) {

      var value=JSON.parse(data);

      if(value==0)
      {
          $('#overlay-changeEmail form').removeAttr('onsubmit');
          $('#overlay-changeEmail form').submit();
      }

      if(value==1) {
        output.html('Um erro ocurreu ao tentar alterar o seu email.');
      }
  });

  return false;
}
