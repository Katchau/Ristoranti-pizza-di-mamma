/*
function loadDruggs(cocaine){
	for(var i = 0; i < products.length; i++)
		cocaine.append('<option value="'+products[i]+'">'+products[i] +'</option>');
}

function addDruggs(){
	var drugg = $("body .line").first().clone();
	$("body input[type = button]").before(drugg);
}
*/
function loadFrontPageRestaurants(table){
    $.ajax({
        type: "get",
        url: "/actions/return test"
    }).done(function() {
        window.alert("caragi");
    }).fail(function() {
        window.alert("rekt");
    });

}
function loadDocument(){
	var body = $("body #main #best_choices");
	var table = body.find("table");
	//loadFrontPageRestaurants(table);
/*	loadDruggs(selecti);
	$("body input[type = button]").click(addDruggs);*/
	//window.alert(table.html());
}

$(document).ready(loadDocument);