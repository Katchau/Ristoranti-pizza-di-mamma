
function getRestaurants(value){
	var url = "../actions/searchFuncs.php?nameR=" + value;
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
			for(var i = 0; i < unparsed.length; i+=2){
				$("li").remove();

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
}

$(document).ready(loadDocument);
