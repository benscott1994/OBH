$(document).ready(function(){

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

	// If internet explorer.
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){
	
		// Here we want to replace the html code of the .holder class.

		var newContenth1 = "<div class='title'>BLOODHOUND Data</div><a href='data.php'><div class='middle'><div class='text'>Go to Oracle's data page where you can view and download data collected from various test runs!</div></div></a>";
		var newContenth2 = "";
		var newContenth3 = "<div class='title'>Fast Facts - Connecting the Car</div><a href='facts.php'><div class='middle'><div class='text'>Learn some astounding facts about The BLOODHOUND Project!</div></div></a>";
		
		$("#h1.holder").html(newContenth1);
		$("#h2.holder").html(newContenth3);
		$("#h3.holder").html(newContenth3);
   }
});