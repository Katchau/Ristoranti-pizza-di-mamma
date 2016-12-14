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

    $("#create-restaurant").click(showOverlayCreatRestaurant);

    $('.overlayCreateRestaurant').hide();

    $('.overlayCreateRestaurant').click(function (event) {
        if (event.target === event.delegateTarget) {
            $('.overlayCreateRestaurant').hide();
            event.stopPropagation();
        }
    });

}

function showOverlayEditProfile(){
  $('.overlayEditProfile').show();
}

function showOverlayChangeName(){
  $('.overlayEditProfile').hide();
  $('.overlayChangeName').show();
}

function showOverlayChangeEmail(){
  $('.overlayEditProfile').hide();
  $('.overlayChangeEmail').show();
}

function showOverlayChangeBirthday(){
  $('.overlayEditProfile').hide();
  $('.overlayChangeBirthday').show();
}

function showOverlayChangeProfilePic(){
  $('.overlayChangeProfilePic').show();
}

function showOverlayChangePassword(){
  $('.overlayEditProfile').hide();
  $('.overlayChangePassword').show();
}

function showOverlayCreatRestaurant() {
    $('.overlayCreateRestaurant').show();
}

$(document).ready(overlayPage);
