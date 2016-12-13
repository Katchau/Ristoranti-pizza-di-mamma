function overlayPage(){
  $("#edit").click(showOverlayEditProfile);

  $('.overlayEditProfile').hide();

  $('.overlayEditProfile').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayEditProfile').hide();
          event.stopPropagation();
      }
  });

  $("#changeUserName").click(showOverlayChangeName);

  $('.overlayChangeName').hide();

  $('.overlayChangeName').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeName').hide();
          event.stopPropagation();
      }
  });

  $("#changeUserEmail").click(showOverlayChangeEmail);

  $('.overlayChangeEmail').hide();

  $('.overlayChangeEmail').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeEmail').hide();
          event.stopPropagation();
      }
  });

  $("#changeUserBirthday").click(showOverlayChangeBirthday);

  $('.overlayChangeBirthday').hide();

  $('.overlayChangeBirthday').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeBirthday').hide();
          event.stopPropagation();
      }
  });

  $("#changeUserPassword").click(showOverlayChangePassword);

  $('.overlayChangePassword').hide();

  $('.overlayChangePassword').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangePassword').hide();
          event.stopPropagation();
      }
  });

  $("#changeProfilePic").click(showOverlayChangeProfilePic);

  $('.overlayChangeProfilePic').hide();

  $('.overlayChangeProfilePic').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeProfilePic').hide();
          event.stopPropagation();
      }
  });
}

function showOverlayEditProfile(){
  $('.overlayEditProfile').show();
}

function showOverlayChangeName(){
  $('.overlayChangeName').show();
}

function showOverlayChangeEmail(){
  $('.overlayChangeEmail').show();
}

function showOverlayChangeBirthday(){
  $('.overlayChangeBirthday').show();
}

function showOverlayChangeProfilePic(){
  $('.overlayChangeProfilePic').show();
}

function showOverlayChangePassword(){
  $('.overlayChangePassword').show();
}

$(document).ready(overlayPage);
