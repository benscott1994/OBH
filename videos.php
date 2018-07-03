<?php

// The actual run id.
$run_id = null;
// The year the run was live.
$year = null;

// Lists all the avaliable options for the run selector drop-down.
$run_options = array("2017_210" => "Newquay 2017 - VIP (210mph)", 
					 "2017_190" => "Newquay 2017 - Public (190mph)",
					 "2017_185" => "Newquay 2017 - School (185mph)");

if(isset($_GET['id'])){
	
	$run_id = $_GET['id'];
	
	// This is just how we extract the year from the ID.
	$raw = explode("_", $run_id);
	
	// The year the run was live.
	$year = $raw[0];
	
	// Builds the uri to the video folder location.
	$folder_uri = "Videos/".$year."/".$run_id;
	
	// Before we finish we MUST check the existance of the folder, user could be getting clever and mess about with the page url.
	if(!file_exists($folder_uri) || $run_id == ""){
		
		header("Location: videos.php?id=2017_210");
	}

}
else{
	
	header("Location: videos.php?id=2017_210");
}
?>
<html>
	<head>
		<link rel="stylesheet" href="CSS/videos.css"/>
		<link rel="stylesheet" href="CSS/popup.css"/>
		<link rel="stylesheet" href="CSS/video-facts.css"/>
		
		<link href="CSS/simple-slider.css" rel="stylesheet" type="text/css" />
		<link href="CSS/simple-slider-volume.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="JS/jquery-1.7.2.min.js"></script>
		
		<script src="JS/video_logic.js"></script>
		<script src="JS/simple-slider.js"></script>

		<link href="CSS/simple-slider.css" rel="stylesheet" type="text/css" />
		<link href="CSS/simple-slider-volume.css" rel="stylesheet" type="text/css" /> 
	</head>
	<body>
		<div class="container">
			<div class="select_run">
				<div class="image_container">
					
					<div class="return">
						<a href="./">
							<img src="images/return-icon.png" onmouseover="this.src='images/return-icon_hover.png';" onmouseout="this.src='images/return-icon.png';"></img>
						</a>
					</div>
					<img src="images/calendar.png"></img>		
				</div>
				<div class="date_container">
					<div class="date">
						<?php
							/*
								The following two php sections allows us to dynamically 
								generate the run title and drop-down contents.
							*/
							echo $run_options[$run_id];
							unset($run_options[$run_id]);
						?>
					</div>
					<div class="dropdown-content">
						<?php
						
							foreach($run_options as $key => $value){
								
								echo "<a href='videos.php?id=".$key."'>&nbsp;".$value."</a>";
							}
						?>
					</div>
				</div>
			</div>
			<div class="main_section">
				<div class="main_feed">
						<!-- start of channel 1 -->
						<video id="v1" style="max-height: 100%; max-width: 100%" src="<?php echo $folder_uri;?>/video_encode_3.mp4" type="video/mp4"></video>
						<input type="hidden" id="v1-desc" value="Fin Cam" />
				</div>
				<div class="fact-container">
					<div id="overlay">
						<div id="image_container">
							<!-- Once a popup is clicked, the larger version of the image is displayed here for the user to view. -->
						</div>
					</div>
					<div class="fact-popups">
						<!-- Contains the mini-popups.  -->
					</div>
				</div>
				<div class="vert_seperator"></div>
				<div class="alt_feed_container">
					<div class="section">
						<a href="javascript:;" id="sec_1">
							<div class="sub_feed_container" id="div_1">
								<video id="v2" style="max-height: 100%; max-width: 100%" src="<?php echo $folder_uri;?>/video_encode_2.mp4" type="video/mp4"></video>
							</div>
							<div class="switch">
								<img src="images/switch_icon.png"></img>
							</div>
						</a>
					</div>
					<div class="section">
						<a href="javascript:;" id="sec_2">
							<div class="sub_feed_container" id="div_2">
								<video id="v3" style="max-height: 100%; max-width: 100%" src="<?php echo $folder_uri;?>/video_encode_1.mp4" type="video/mp4"></video>
							</div>
							<div class="switch">
								<img src="images/switch_icon.png"></img>
							</div>
						</a>
					</div>
					<div class="section-gps-tracker">
						<a href="javascript:;" id="sec_3">
							<div class="sub_feed_container" id="div_3">
								<div id="mapHolder" style="max-height:100%; max-width: 100%;">
								<div id="map" style="height: 100%; width: 100%;"></div>
								</div>    
								<script>
								  var map = null;
								  var marker = null;
								  function initMap() {
									map = new google.maps.Map(document.getElementById('map'), {
									  center: {lat: 50.4414, lng: -5.0}, mapTypeId: 'satellite',
									  zoom: 15
									});
								  }
								  function addMarker(lat, lng)
								  {
									var myLatLng = {lat: lat, lng: lng};
									if (map)
									{
										//console.log("Adding marker " + myLatLng);
										if (marker)
											marker.setPosition(myLatLng);
										else
											marker = new google.maps.Marker({
											  position: myLatLng,
											  map: map,
											  icon: "marker.png"
											});	  
									}
								  }
								  
								</script>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkrDMs-KjOzeW7hpDsJANXMPCbg5v8hwA&callback=initMap" async defer></script>
							</div>
						</a>
					</div>
				</div>
				<div class="speed_indicator">
					0 mph
				</div>
				<div class="time_indicator">
					00:00
				</div>
			</div>
			<div class="horiz_seperator">
				<!-- Seperates the main content divs on page -->
			</div>
			<br>
			<div class="sub_section">
				<div class="logo_section">
					<div class="logos">
						<div class="top">
							<div class="bh_logo">
								<img src="images/favicon.png"></img>
							</div>
						</div>
						<br>
						<div class="bottom">
							<div class="oracle_logo">
								<img src="images/oracle.png"></img>
							</div>
						</div>
					</div>
					<div class="controls">
						<div class="pause-play">
							<img src="images/play-button.png"><img>
						</div>
						&nbsp;
						<div class="restart">
							<img src="images/restart.png"><img>
						</div>
						&nbsp;
						<div class="volume">
							<div class="popup" onclick="togglePopup(1)">
								<img src="images/volume.png"><img>
								<span class="popuptext" id="myPopup_1">
									<span>
										<input type="text" data-slider="true" data-slider-theme="volume" value="50" data-slider-range="0, 100">
										<input type="hidden" class="output">
									</span>
								</span>
								<script>
									$("[data-slider]")
									.each(function () {
										var input = $(this);
										$("<span>")
										.addClass("output")
										.insertAfter($(this));
									})
									.bind("slider:ready slider:changed", function (event, data) {
										$(this)
										.nextAll(".output:first")
										.html(data.value.toFixed(0));
									});
								</script>
							</div>
							<script>															
								// When the user clicks on the volume icon, it opens the widget.
								function togglePopup(id) {

									var popup = document.getElementById("myPopup_" + id);
									popup.classList.toggle("show");
								}								
							</script>	
						</div>
						<br>
						<div class="toggle-facts">
							Show facts? <input type="checkbox" id="showFacts"/>
						</div>
						<br>
						<div class="toggle-autoplay">
							Auto-play when switching? <input type="checkbox" id="toggleAutoplay"/>
						</div>
					</div>
				</div>
				<div class="graph_section">
					<?php include("graph.php"); ?>
				</div>
				<div class="progress_bar_section">
					<?php include("progress_bar.php"); ?>
				</div>
			</div>
		</div>
	</body>
</html>