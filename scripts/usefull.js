
function getRestaurants(value){
	var local_name = $("#search-bar #searchLocal").val();
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
			span.before('<p>');
			for(var i = 0; i < unparsed.length; i+=2){
				$url = "../pages/restaurant_page.php?id=" + unparsed[i+1];
				if((i+1) % 4 == 0 && i >= 3) span.before('<p>');
				span.before('<li><button type="submit" formaction="'+ $url + '">'
				+ unparsed[i] +'</li>');
				if((i+1) % 4 == 0 && i >= 3) span.before('</p>');
			}
			span.before('</p>');
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

function swap_ids(pic, b4, id_button){
	var temp = pic.id;
	var div_to_change = null
	if(id_button == "nextButton"){
		div_to_change = pic.nextSibling;
	}else if(id_button == "b4Button"){
		div_to_change = b4;
	}
	else return; //evitar erros estupidos
	if(div_to_change == null || div_to_change.tagName != "DIV") return;
	pic.id = div_to_change.id;
	div_to_change.id = temp;
	return;
}

function hideComments(id_button){
	var div = document.getElementById("rev" + id_button);
	var display = window.getComputedStyle(div).display;
	var query = $("#rev" + id_button);
	if(display == 'block'){
		query.removeClass("comments");
		query.addClass("hidden");
	}
	else{
		query.removeClass("hidden");
		query.addClass("comments");
	}
}

function getDesiredPicture(id_button){
	var div_pics = document.getElementById("images");
	var pic = div_pics.firstChild;
	var b4 = null;
	while(true){ //yolo
		if(pic == null)break;
		if(pic.tagName == "DIV"){
			var display = window.getComputedStyle(pic).display;
			if(display == 'block'){
				swap_ids(pic, b4, id_button);
				return;
			}
			else b4 = pic;
		}
		pic = pic.nextSibling;
	}
}

function loadDocument(){
	var sBar = $("#search-bar #searchRestaurant");
	sBar.keypress({x: sBar}, searchRestaurant);
}

$(document).ready(loadDocument);
