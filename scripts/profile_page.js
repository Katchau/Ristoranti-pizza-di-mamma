function overlayPage(){
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

function showOverlayChangeProfilePic(){
  $('.overlayChangeProfilePic').show();
}


function showOverlayChangePassword(){
  $('.overlayChangePassword').show();
}

$(document).ready(overlayPage);
