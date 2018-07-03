<html>
	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			// URI's of the downloadable data.
			var raw_data_uri = "Data/Download/2017_210.zip";
			var data_desc_doc_uri = "Data/Download/BLOODHOUND SSC Data Documentation_Newquay.zip";
			
			function download_raw(){
				
				document.getElementById('iframe_download').src = raw_data_uri;
			}
			
			function download_agg(){
				
				alert("Bloodhound aggregate data will now download");
			}

			function download_desc(){
				
				document.getElementById('iframe_download').src = data_desc_doc_uri;
			}
			
			function on(counter) {
			
				$(".overlay").css("display", "block");				
			}

			function off() {
						
				$(".overlay").css("display", "none");
			}
			
			function change_option(id){
				
				var new_val = $("#opt-" + id).html();
				
				$("#run_title").html(new_val);
			}
		</script>
		<style>
			.overlay{
				
				height: 97%;
				width: 99%;
				margin: auto;
				background-color: rgba(0.5, 0.5, 0.5, 0.5);
				position: absolute;
				display: none;
				z-index: 2;
				color: White;
			}
			
			.downloadable-content{
				
				width: 30%;
				height: 10%;
				background-color: #002060;
				position: absolute;
				margin: auto;
				top: 0; left: 0; bottom: 0; right: 0;
			}
			
			.selector-container{
				
				position: relative;
				float: left;
				height: 100%;
			}
			
			.button-container{
				
				position: relative;
				float: right;
				height: 100%;
				width: 40%;
			}
			
			.button-container img{
				
				max-height: 90%;
				max-width: 90%;
			}
			
			.button-container img:hover{
				
				cursor: pointer
			}
			
			.download-container{
				
				position: relative;
				width: 50%;
				height: 100%;
				float: left;
			}
			
			.close-container{
				
				position: relative;
				width: 50%;
				height: 100%;
				float: right;
			}
			
			.close-container img{
				
				position: absolute;
				top: 0;
				right: 0;
			}

			.run-title{
				
				font-size: 1.5vw;
			}
			
			.dropdown-content {
				display: none;
				position: absolute;
				top: 50%;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
				font-size: 1vw;
				color: White;
			}

			.dropdown-content a {
				color: #002060;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-decoration: none;
				color: black;
			}

			.dropdown-content a:hover {background-color: #f1f1f1}

			.selector-container{
				
				position: relative;
				float: left;
				width: 50%;
				height: 100%;
			}
					
			.selector-container:hover .dropdown-content {
				display: block;
			}
			
		</style>
	</head>
	<body>
		<!-- The iframe that contains the downloadable files. -->
		<iframe id="iframe_download" style="display:none;"></iframe>
			<div class="overlay">
				<div class="downloadable-content">
					<div class="selector-container">
						<div class="run-title">
							<div id="run_title">Please select a date:</div>
						</div>
						<div class="dropdown-content">
							<a id="opt-1" href="javascript:;" onclick="change_option(1)">Newquay 2017 - VIP (210mph)</a>
							<a id="opt-2" href="javascript:;" onclick="change_option(2)">Newquay 2017 - Public (190mph)</a>
							<a id="opt-3" href="javascript:;" onclick="change_option(3)">Newquay 2017 - School (185mph)</a>
						</div>
					</div>
					<div class="button-container">
						<div class="download-container">
							<img id="download_img" src="images/download.png" onmouseover="this.src='images/download_hover.png';" onmouseout="this.src='images/download.png';"></img>
						</div>	
						<div class="close-container">
							<img src="images/close_button.png" onmouseover="this.src='images/close_button_hover.png';" onmouseout="this.src='images/close_button.png';" onclick="off()"></img>
						</div>
					</div>
				</div>
			</div>
		<div class="open">
			<input type="submit" name="click" value="Click" onclick="on()">
		</div>
	</body>
</html>