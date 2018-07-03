<?php

// The actual run id.
$run_id = null;
// The year the run was live.
$year = null;

// The default page to display if any URI errors occur.
$default = "videos.php?id=2017_210";

// Lists all the avaliable options for the run selector drop-down.
$run_options = array("2017_210" => "Newquay 2017 - VIP (210mph)", 
					 "2017_190" => "Newquay 2017 - Public (190mph)",
					 "2017_185" => "Newquay 2017 - School (185mph)"
					);

// Checks to see if page is being accesses without a getter ID, if it is then we manually override it.			
if(isset($_GET['id'])){
	
	$run_id = $_GET['id'];
	
	// This is just how we extract the year from the ID.
	$raw = explode("_", $run_id);
	
	// The year the run was live.
	$year = $raw[0];
	
	// Builds the uri to the video folder location.
	$folder_uri = "../Videos/".$year."/".$run_id;
	
	// Before we finish we MUST check the existance of the folder, user could be getting clever and mess about with the page url.
	if(!file_exists($folder_uri) || $run_id == ""){
		
		header("Location: ".$default);
	}
}
else{
	
	header("Location: ".$default);
}
?>
<html>
	<head>
		<?php include("includes.php"); ?>
		<link rel="stylesheet" href="CSS/videos.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
		
			// Allows the use of the dropdown menu for touch screen devices.
			$(document).ready(function(){
				
				var status = $("#btnControl").val();
				
				$("#btnControl").on("click", function(v){
					
					if(this.checked){ $(".dropdown-content").css("display", "block");}
					else{ $(".dropdown-content").css("display", "none");}
				});
			});
		</script>
	</head>
	<body>
	<!---<div class="iframe_container">
		<iframe src="../videos_new.php"></iframe>
	</div>--->
		<div class="container">
			<?php include("nav.php"); ?>
			<div class="run_selector">
				<div class="left_selector_panel">
					<div class="icon-left">
						<a href="./">
							<img src="../images/return-icon.png" onmouseover="this.src='../Images/return-icon_hover.png';" onmouseout="this.src='../Images/return-icon.png';"/>
						</a>
					</div>
					<div class="icon-right">
						<img src="../images/calendar.png" />
					</div>
				</div>
				<div class="right_selector_panel">
					<div class="date">
						<div class="floating">
						<input type="checkbox" id="btnControl" />
							<label class="datebtn" for="btnControl">
								<?php
									/*
										The following two php sections allows us to dynamically 
										generate the run title and drop-down contents.
									*/
									echo $run_options[$run_id];
									unset($run_options[$run_id]);
								?>
							</label>
						</div>
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
			<div class="main_feed video">
				<video playsinline poster="../images/video_thumbnails/thumb_3.png" id="v1" style="max-height: 100%; max-width: 100%" src="<?php echo $folder_uri;?>/video_encode_3.mp4" type="video/mp4"></video>
			</div>
			<div class="alt_feed_container">
				<div class="alt_feed_1 video">
					<video playsinline  poster="../images/video_thumbnails/thumb_1.png" id="v3" style="max-height: 100%; max-width: 100%" src="<?php echo $folder_uri;?>/video_encode_1.mp4" type="video/mp4"></video>
				</div>
				<div class="alt_feed_2 video">
					<video playsinline poster="../images/video_thumbnails/thumb_2.png" id="v2" style="max-height: 100%; max-width: 100%" src="<?php echo $folder_uri;?>/video_encode_2.mp4" type="video/mp4"></video>
				</div>
			</div>
			<div class="controls">
				<div class="controls-left left w50">
					<div class="pause-play left">
						<img src="../images/play-button.png"><img>
					</div>
					<div class="restart right">
						<img src="../images/restart.png"><img>
					</div>
				</div>
				<div class="controls-right right w50">
				
				</div>
			</div>
		</div>
	</body>
	<script>
		
		// Actively playing?
		var isPlaying = null;
	
		// Grabs the video-feed elements within the page.
		var v1 = document.getElementById('v1');
		var v2 = document.getElementById('v2');
		var v3 = document.getElementById('v3');
		
		// Play video function
		function playVid(){      
				
			$(".pause-play").html("<img src='../images/pause-button.png'></img>");
			
			document.getElementById("v1").play();
			document.getElementById("v2").play();
			document.getElementById("v3").play();
		} 

		// Pause video function
		function pauseVid() {     
			if (!v1.paused && !onpause) {
				
				$(".pause-play").html("<img src='../images/play-button.png'></img>");
				
				document.getElementById("v1").pause();
				document.getElementById("v2").pause();
				document.getElementById("v3").pause();
			}
		}
		
		// Handles click events of play/ pause button.
		$(".pause-play").on("click", function(event){
			
			if(isPlaying == null){
				
				document.getElementById("v1").play();
				document.getElementById("v2").play();
				document.getElementById("v3").play();
				
				isPlaying = true;
				$(this).html("<img src='../images/pause-button.png'></img>");
			}
			else if(!isPlaying){ 
											
				playVid(); 
				isPlaying = true;
				
				$(this).html("<img src='../images/pause-button.png'></img>");
			}
			else if(isPlaying){
								
				pauseVid();
				isPlaying = false;
				
				$(this).html("<img src='../images/play-button.png'></img>");
			}
		});
	
	
	</script>
</html>