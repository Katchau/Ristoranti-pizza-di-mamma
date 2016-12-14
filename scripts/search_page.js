
var type = "";

function getImage(span4, id_r, address, schedule, score){
	$.ajax({
		type: "get",
		url: "../actions/echo_picture.php?id=" + id_r
	}).done(function(data2){
		var pic = JSON.parse(data2);
		var image_path= "../database/images/" + id_r + "/";
		span4.append('<img src="' + image_path + pic +'" alt="restaurant_pics">');
		span4.append('<p> Morada: ' + address + '</p>');
		span4.append('<p> Horario: ' + schedule + '</p>');
		span4.append('<p> Nº de Estrelas ' + score +  '</p>');
	}).fail(function(){
		console.log("No such file echo_picture.php");
	});
	return;
}
function checkValue(value){
	var name = "#side_bar #checkbox_filter #rating ";
	if(!($(name + "#b5").is(":checked")) && !($(name + "#b4").is(":checked")) && !($(name + "#b3").is(":checked"))
		&& !($(name + "#b2").is(":checked")) && !($(name + "#b1").is(":checked"))) return true; //todo alterar este comboio para uma coisa mais piquena
	if(($(name + "#b5").is(":checked")) && value <= 5 && value > 4) return true;
	if(($(name + "#b4").is(":checked")) && value <= 4 && value > 3) return true;
	if(($(name + "#b3").is(":checked")) && value <= 3 && value > 2) return true;
	if(($(name + "#b2").is(":checked")) && value <= 2 && value > 1) return true;
	if(($(name + "#b1").is(":checked")) && value <= 1 && value >= 0) return true;
}

function getRestaurants(value){
	var local_name = $("#top-bar #top-bar-elements #search #searchLocal").val();
	var url = "../actions/echo_restaurants.php?nameR=" + value + "&" + "place=" + local_name;
	$.ajax({
        type: "get",
        url: url
    }).done(function(data) {
		var unparsed = JSON.parse(data);
		var span = $("body #down-part #restaurants");
		if(typeof unparsed === "string") return;
		for(var i = 0; i < unparsed.length; i+=6){
			if(checkValue(unparsed[i+2]) && (type == "" || type == checkValue(unparsed[i+5]))){
				$url = "../actions/restaurant_page.php?id=" + unparsed[i+1];
			
				span.append('<div class="restaurants" id =' + unparsed[i+1] + ' >');
				span.append('</div>');
				var span2 = $("#down-part #restaurants #" + unparsed[i+1] );
				span2.append('<form method="get" >');
				span2.append('</form>');
				var span3 = $("#down-part #restaurants #" + unparsed[i+1] + " form");
				span3.append('<button type="submit" value="' + unparsed[i+1] +'" name="id" formaction="'+ $url + '">')
				span3.append('</button>');
				
				var span4 = $("#down-part #restaurants #" + unparsed[i+1] + " form button");
				span4.append('<h1>' + unparsed[i] + '</h1>');
				var id_r = unparsed[i + 1];
			
				getImage(span4, id_r, unparsed[i + 3], unparsed[i + 4], unparsed[i + 2]);
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
	if(pressedKey == null) pressedKey = "";
	var nextValue = currValue + "" + pressedKey;
	if(nextValue == null) nextValue = "";
	$("#down-part #restaurants div").remove();
	getRestaurants(nextValue);
}

function changeType(botao){
	type = (botao == type) ? "" : botao;
}

function loadDocument(){
	var sBar = $("#top-bar #top-bar-elements #search #searchRestaurant");
	sBar.keypress({x: sBar}, searchRestaurant);
	$("#side_bar #checkbox_filter #rating input").click({x: sBar}, searchRestaurant);
	$("#side_bar #types button").click({x: sBar}, searchRestaurant);
}

$(document).ready(loadDocument);
