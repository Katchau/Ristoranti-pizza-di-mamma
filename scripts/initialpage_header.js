function overlayPage(){

    $("#register").click(showOverlayLogon);

    $('.overlayLogon').click(function (event) {
        if (event.target === event.delegateTarget) {
            $('.overlayLogon').hide();
            event.stopPropagation();
        }
    });

    $("#init_session").click(showOverlayLogin);

    $('.overlayLogin').click(function (event) {
        if (event.target === event.delegateTarget) {
            $('.overlayLogin').hide();
            event.stopPropagation();
        }
    });

}

function showOverlayLogon(){
    $(".overlayLogon").show();
}

function showOverlayLogin(){
    $(".overlayLogin").show();
}

$(document).ready(overlayPage);