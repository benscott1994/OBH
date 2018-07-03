<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11"/>
		<!-- self -->
		<?php include("header.php"); ?>
		<link rel="stylesheet" href="CSS/data.css"/>
		<link rel="stylesheet" href="CSS/data_selection_widget.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="JS/data_selection_widget.js"></script>
		<!-- Allows for mobile detection -->
		<script type="text/javascript" src="JS/mobdet.js">
			detectMobile("mobile/data.php");
		</script>
	</head>
	<body>
		<div class="overlay">
			<div class="downloadable-content">
				<div class="selector-container">
					<div class="run-title">
						<div id="run_title">Please select a date:</div>
					</div>
					<div class="dropdown-content">
						<a id="opt-1" href="javascript:;">Newquay 2017 - VIP (210mph)</a>
						<a id="opt-2" href="javascript:;">Newquay 2017 - Public (190mph)</a>
						<a id="opt-3" href="javascript:;">Newquay 2017 - School (185mph)</a>
					</div>
				</div>
				<div class="button-container">
					<div class="download-container">
						<img id="download_file" src="images/download.png" onmouseover="this.src='images/download_hover.png';" onmouseout="this.src='images/download.png';"></img>
					</div>	
					<div class="close-container">
						<img id="close-popup"src="images/close_button.png" onmouseover="this.src='images/close_button_hover.png';" onmouseout="this.src='images/close_button.png';" onclick="off()"></img>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="nav">
				<?php include("nav.php"); ?>
				<div id="return">
					<a href="./">
						<img src="images/return-icon.png"></img>Return to landing page...
					</a>
				</div>
			</div>
			<div class="graphFrame">
				<iframe width="100%" height="100%" src="http://130.61.25.101:9704/va/ui/project.jsp?pageid=visualAnalyzer&reportmode=presentation&reportpath=%2Fshared%2FBloodhound%2FPublic%2FBLOODHOUND%20Dashboard%20-%20Website&amp;anonymous=true"></iframe>
			</div>
			<div class="dataFrame">
				<table class="table-container">
					<tr>
						<td class="top">
							<table class="description">
								<tr>
									<td>
										Welcome to the Data Visualisation page! To the left there are a series of visuals 
										using data from the Newquay test runs completed in October 2017. You can select runs
										on the top left hand table and the data will update in each visual. Double click a 
										visual to expand its graph to interact with it and find out more.
										<br><br>
										<div class="quote">"Failure is the key to success; each mistake teaches us 
										something."</div> - Morihel Ueshiba, Athlete
										<br></br>
										You may notice that in some of the visulisations there are gaps. 
										This is due to the sensors not firing the data packets.
										<br><br>
										<div class="download_title">Download the Data</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="bottom">
							<!-- The iframe that contains the downloadable files. (Completely hidden and never gets shown)-->
							<iframe id="iframe_download_manager" style="display:none;"></iframe>
							<div class="download_left">
								<div class="download_left_top">
									<img id="download_img_1" src="images/download.png" onmouseover="this.src='images/download_hover.png';" onmouseout="this.src='images/download.png';"></img><br>Raw Data<br>
								</div>
								<div class="download_left_bottom">
									<img id="desc_img_1" src="images/description.png" onmouseover="this.src='images/description_hover.png';" onmouseout="this.src='images/description.png';"></img><br>Sensor Description
								</div>
							</div>
							<div class="download_right">
								<div class="download_right_top">
									<img id="download_img_2" src="images/download.png" onmouseover="this.src='images/download_hover.png';" onmouseout="this.src='images/download.png';"></img><br>Summarised Data
								</div>
								<div class="download_right_bottom">
									<img id="desc_img_2" src="images/description.png" onmouseover="this.src='images/description_hover.png';" onmouseout="this.src='images/description.png';"></img><br>Data Guide
								</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>