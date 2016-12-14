function overlayPage(){
  $("#edit").click(showOverlayEditRestaurant);

  $('.overlayEditRestaurant').hide();

  $('.overlayEditRestaurant').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayEditRestaurant').hide();
          event.stopPropagation();
      }
  });

  $("#delete").click(showOverlayDeleteRestaurant);

  $('.overlayDeleteRestaurant').hide();

  $('.overlayDeleteRestaurant').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayDeleteRestaurant').hide();
          event.stopPropagation();
      }
  });

  $("#changeRestaurantName").click(showOverlayChangeName);

  $('.overlayChangeName').hide();

  $('.overlayChangeName').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeName').hide();
          event.stopPropagation();
      }
  });

  $("#changeRestaurantDescription").click(showOverlayChangeDescription);

  $('.overlayChangeDescription').hide();

  $('.overlayChangeDescription').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeDescription').hide();
          event.stopPropagation();
      }
  });

  $("#changeRestaurantAdress").click(showOverlayChangeAdress);

  $('.overlayChangeAdress').hide();

  $('.overlayChangeAdress').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeAdress').hide();
          event.stopPropagation();
      }
  });

  $("#changeRestaurantNumber").click(showOverlayChangeNumber);

  $('.overlayChangeNumber').hide();

  $('.overlayChangeNumber').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeNumber').hide();
          event.stopPropagation();
      }
  });

  $("#changeRestaurantSchedule").click(showOverlayChangeSchedule);

  $('.overlayChangeSchedule').hide();

  $('.overlayChangeSchedule').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeSchedule').hide();
          event.stopPropagation();
      }
  });

  $("#changeRestaurantType").click(showOverlayChangeType);

  $('.overlayChangeType').hide();

  $('.overlayChangeType').click(function (event) {
      if (event.target === event.delegateTarget) {
          $('.overlayChangeType').hide();
          event.stopPropagation();
      }
  });

}

function showOverlayChangeName(){
    $('.overlayEditRestaurant').hide();
    $('.overlayChangeName').show();
}

function showOverlayChangeDescription(){
    $('.overlayEditRestaurant').hide();
    $('.overlayChangeDescription').show();
}

function showOverlayChangeAdress(){
    $('.overlayEditRestaurant').hide();
    $('.overlayChangeAdress').show();
}

function showOverlayChangeNumber(){
    $('.overlayEditRestaurant').hide();
    $('.overlayChangeNumber').show();
}

function showOverlayChangeType(){
    $('.overlayEditRestaurant').hide();
    $('.overlayChangeType').show();
}

function showOverlayChangeSchedule(){
    $('.overlayEditRestaurant').hide();
    $('.overlayChangeSchedule').show();
}

function showOverlayDeleteRestaurant(){
    $('.overlayDeleteRestaurant').show();
}

function showOverlayEditRestaurant() {
    $('.overlayEditRestaurant').show();
}

$(document).ready(overlayPage);
