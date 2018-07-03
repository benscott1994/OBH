$(document).ready(function(){

	var leftPositions = [6, 14, 25, 35, 45, 55, 64, 72, 83];
	var index = 0;
	
	
	// Just place holder code for the time being, once the BOT is added and the poster is made we will replace this code.
	$("#download, #bot").on("click", function(){
		
		alert("Once we have a poster you will be able to download it here!");
	});
	
	$("#progress").on("click", function(){
		
		// Moves the mini-bloodhound.
		$(".bloodhound-container img").css("left", leftPositions[index] + "%");
		
		// Makes each new fact node visible.
		$("#node-" + (index + 2)).fadeIn(2000, function() { /* Empty function */});
		
		// Incremenets the indexer.
		index++;
	});
	
	// Restarts the fact flow.
	$("#restart").on("click", function(){
		
		// Hides all the fact nodes.
		for(var i = 2; i < 11; i++){
			
			$("#node-" + i).css("display", "none");
		}
		
		// Resets the cars position on the screen.
		$(".bloodhound-container img").css("left", "0%");
		
		// Resets the indexer.
		index = 0;
		
		// Sets the innerHTML of the two fact ports to be empty.
		$("#ex-1.fact-expanded").html("");
		$("#ex-2.fact-expanded").html("");
	});
	
	/* Section one */
	$("#node-1.fact-card").on("click", function(){
		
		$("#ex-1.fact-expanded").html($("#node-1-hidden-1").val());
		$("#ex-2.fact-expanded").html($("#node-1-hidden-2").val());
	});
	
	$("#node-2.fact-card").on("click", function(){
		
		$("#ex-1.fact-expanded").html($("#node-2-hidden-1").val());
		$("#ex-2.fact-expanded").html($("#node-2-hidden-2").val());
	});
	
	$("#node-3.fact-card").on("click", function(){
		
		$("#ex-1.fact-expanded").html($("#node-3-hidden").val());
		$("#ex-2.fact-expanded").html("");
	});
	
	$("#node-4.fact-card").on("click", function(){
		
		$("#ex-1.fact-expanded").html($("#node-4-hidden").val());
		$("#ex-2.fact-expanded").html("");
	});
	
	$("#node-5.fact-card").on("click", function(){
		
		$("#ex-1.fact-expanded").html($("#node-5-hidden").val());
		$("#ex-2.fact-expanded").html("");
	});
	
	/* Section two  */
	
	$("#node-6.fact-card").on("click", function(){
		
		$("#ex-2.fact-expanded").html($("#node-6-hidden").val());
		$("#ex-1.fact-expanded").html("");
	});
	
	$("#node-7.fact-card").on("click", function(){
		
		$("#ex-2.fact-expanded").html($("#node-7-hidden").val());
		$("#ex-1.fact-expanded").html("");
	});
	
	$("#node-8.fact-card").on("click", function(){
		
		$("#ex-2.fact-expanded").html($("#node-8-hidden").val());
		$("#ex-1.fact-expanded").html("");
	});
	
	$("#node-9.fact-card").on("click", function(){
		
		$("#ex-2.fact-expanded").html($("#node-9-hidden").val());
		$("#ex-1.fact-expanded").html("");
	});
	
	$("#node-10.fact-card").on("click", function(){
		
		$("#ex-2.fact-expanded").html($("#node-10-hidden").val());
		$("#ex-1.fact-expanded").html("");
	});
});