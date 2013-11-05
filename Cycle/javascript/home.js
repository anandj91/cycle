/**
 * 
 */

$( 
	function () {
		$("#search").click(getResult);
	}
);

function getResult() {
	
	// concatenate all checked values by ','
	var cycle = $( ":checked" ).map( 	function() {
	    									return $(this).val();
	  									}).get().join();
	
	// sending post request to search method 
	$.post("search", { cycle: cycle }, test);
}

// method to be called after successful post request
function test(data, status) {
//	alert((data.cycle)+' '+(data.paathram)+' '+(data.mesha)+' '+(data.first_paathram)+' '+(data.first_mesha));
//	alert(data);
//	$("#main").html(data);
	$("#main").text((data.cycle)+' '+(data.paathram)+' '+(data.mesha)+' '+(data.first_paathram)+' '+(data.first_mesha));
}