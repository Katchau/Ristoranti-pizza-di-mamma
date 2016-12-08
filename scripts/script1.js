
function getRestaurants(value){
	var local_name = $("#local_rest").val();
	var url = "../actions/searchFuncs.php?nameR=" + value + "&" + "place=" + local_name;
	$.ajax({
        type: "get",
        url: url
    }).done(function(data) {
		var unparsed = JSON.parse(data);
		var span = $("#txtHint");
		if(typeof unparsed === "string") {
				$("li").remove();
				span.before('<p><li>'+ unparsed +'</li></p>');
		}
		else{
			$("li").remove();
			for(var i = 0; i < unparsed.length; i+=2){
				$url = "../actions/restaurant_page.php";
				span.before('<p><li><button type="submit" value="' + unparsed[i+1] + '" name="id" formaction="'+ $url + '">'
				+ unparsed[i] +'</li></p>');
			}
		}

    }).fail(function() {
        window.alert("Couldn't reach Server :(");
    });
}

function searchRestaurant(evento){
	var search = evento.data.x;
	var currValue = search.val();
	var pressedKey = evento.key;
	var nextValue = currValue + "" + pressedKey;
	getRestaurants(nextValue);
}


function loadDocument(){
	var sBar = $("#searchbar");
	sBar.keypress({x: sBar}, searchRestaurant);
	var review_button = $("body #rest button");
}

$(document).ready(loadDocument);
