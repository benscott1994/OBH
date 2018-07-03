$(document).ready(function(){
	
	// URI's of the downloadable data.
	var raw_data_uri = "Data/Download/2017_210.zip";
	var data_desc_doc_uri = "Data/Download/BLOODHOUND SSC Data Documentation_Newquay.zip";
	
	// The different run options the user can select.
	var data_options = {"opt-1": "Data/Download/2017_210.zip", 
						"opt-2": "Data/Download/2017_190.zip", 
						"opt-3": "Data/Download/2017_185.zip"};
	
	// The default selector index when selecting run data from the dropdown.
	var file_index = "opt-1";
	
	// Starts the file download.
	$("#download_file").on("click", function(){
		
		$("#iframe_download_manager").attr("src", data_options[file_index]);
		
		$("#close-popup").click();
	});
	
	// Opens the download popup.
	$("#download_img_1, #download_img_2").on("click", function(){
		
		$(".overlay").css("display", "block");
	});
	
	// Closes the download popup.
	$("#close-popup").on("click", function(){
		
		$(".overlay").css("display", "none");
	});
	
	// Enables the user to select run-specific data.
	$(".dropdown-content a").on("click", function(){
		
		var id = $(this).attr("id");
		
		// Updates the indexer.
		file_index = id;
		
		// Updates the title in the popup, reflects which file the user will be downloading.
		var new_val = $("#" + id).html();
		$("#run_title").html(new_val);
	});
});