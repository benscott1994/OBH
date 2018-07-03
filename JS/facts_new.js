/*
Author: Chris Wing
Date: 21/05/18
Decription: This JS file enables the hover=over functionality for each data point.
*/
$(document).ready(function(){

/* 	("#pointer_1").on("hover", function(){ $("#fact_1").toggle(); });
	//
	$("#pointer_2").on("hover", function(){ $("#fact_2").toggle(); });
	//
	$("#pointer_3").on("hover", function(){ $("#fact_3").toggle(); });
	//
	$("#pointer_4").on("hover", function(){ $("#fact_4").toggle(); }); */
});

function loadImage(id){

	$(".fact_image_container").html("");
	$(".fact_desc_container").html("");
	
	var fact_card = $("#fact_" + id).html();
	
	$(".fact_image_container").append("<img src='images/fast_fact_frames/" + id + ".png'></img>");
	$(".fact_desc_container").append(fact_card);
	// $("#image_container").append("<img id='image_overlay' src='images/content_frames/frame_" + counter + ".png' onclick='off()'></img>");
}

function on(id) {
		
	document.getElementById("overlay").style.display = "block";
	
	loadImage(id);
}

function off() {
			
	document.getElementById("overlay").style.display = "none";
}