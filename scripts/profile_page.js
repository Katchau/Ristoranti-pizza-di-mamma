function overlayPage(){
  $("#changeUserPassword").click(showOverlayChangePassword);

  $('.overlayChangePassword').hide();

  $('.overlayChangePassword').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangePassword').hide();
          event.stopPropagation();
      }
  });
}

function showOverlayChangePassword(){
  $('.overlayChangePassword').show();
}

$(document).ready(overlayPage);
