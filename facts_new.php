<html>
	<head>
		<?php include("header.php"); ?>
		<script type="text/javascript" src="JS/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="JS/facts_new.js"></script>
		<link rel="stylesheet" href="CSS/facts_new.css">
		
		<!-- For the BH did you know bot. -->
		<script>
			!function(e,n,t,r){
				function o(){try{var e;if((e="string"==typeof this.response?JSON.parse(this.response):this.response).url){
					var t=n.getElementsByTagName("script")[0],r=n.createElement("script");r.async=!0,r.src=e.url,t.parentNode.insertBefore(r,t)}}catch(e){}}
				var s,p,a,i=[],c=[];e[t]={init:function(){s=arguments;var e={then:function(n){return c.push({type:"t",next:n}),e},catch:function(n){
					return c.push({type:"c",next:n}),e}};return e},on:function(){i.push(arguments)},render:function(){p=arguments},destroy:function(){a=arguments}},
					e.__onWebMessengerHostReady__=function(n){if(delete e.__onWebMessengerHostReady__,e[t]=n,s)for(var r=n.init.apply(n,s),o=0;o<c.length;o++){
						var u=c[o];r="t"===u.type?r.then(u.next):r.catch(u.next)}p&&n.render.apply(n,p),a&&n.destroy.apply(n,a);for(o=0;o<i.length;o++)n.on.apply(n,i[o])};
				var u=new XMLHttpRequest;u.addEventListener("load",o),u.open("GET","https://"+r+".webloader.smooch.io/",!0),u.responseType="json",u.send()
			}(window,document,"Smooch","5a8c10a73b45ca00223e8f71")
		</script>
	</head>
	<body>
		<div class="content">
			<div class="nav">
				<?php include("nav.php"); ?>
				<div id="return">
					<a href="./">
						<img src="images/return-icon.png"></img>Return to landing page...
					</a>
				</div>
			</div>
			<div class="container">
				<div class="body">
					<div class="fact-container">
						<div id="overlay">
							<div id="image_container">
								<div class="content_area">
									<div class="fact_image_container">
									
									</div>
									<div class="fact_desc_container">
									
									</div>
									<!-- Once a popup is clicked, the larger version of the image is displayed here for the user to view. -->
									<div class="close_button">
										<img src="images/close_button.png" onclick="off()" onmouseover="this.src='images/close_button_hover.png';" onmouseout="this.src='images/close_button.png';"></img>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<!-- This is where the main content of the page will go. -->
					<div class="bloodhound_main">
						<img src="images/bloodhound_main_2.png"></img>
					</div>
					<div class="telecommunications_tower">
						<img src="images/telecommunications_tower.png"></img>
					</div>
					<div class="clouds" id="cloud_1">
						<img src="images/cloud_new.png"></img>
					</div>
					<div class="clouds" id="cloud_2">
						<img src="images/cloud_new.png"></img>
					</div>
					<div class="clouds" id="cloud_3">
						<img src="images/cloud_new.png"></img>
					</div>
					<div class="rock">
						<img src="images/rock.png"></img>
					</div>
					<div class="pointer_locations">
						<div class="information_point" id="pointer_1">
							<img src="images/hand_pointer.png" onclick="on(1)"></img>
						</div>
						<div class="information_point" id="pointer_2">
							<img src="images/hand_pointer.png" onclick="on(2)"></img>
						</div>		
						<div class="information_point" id="pointer_3">
							<img src="images/hand_pointer.png" onclick="on(3)"></img>
						</div>	
						<div class="information_point" id="pointer_4">
							<img src="images/hand_pointer.png" onclick="on(4)"></img>
						</div>
						<div class="information_point" id="pointer_5">
							<img src="images/hand_pointer.png" onclick="on(5)"></img>
						</div>
						<div class="information_point" id="pointer_6">
							<img src="images/hand_pointer.png" onclick="on(6)"></img>
						</div>	
						<div class="information_point" id="pointer_7">
							<img src="images/hand_pointer.png" onclick="on(7)"></img>
						</div>
						<div class="information_point" id="pointer_8">
							<img src="images/hand_pointer.png" onclick="on(8)"></img>
						</div>	
						<div class="information_point" id="pointer_9">
							<img src="images/hand_pointer.png" onclick="on(9)"></img>
						</div>	
						<div class="information_point" id="pointer_10">
							<img src="images/hand_pointer.png" onclick="on(10)"></img>
						</div>							
						<div class="hidden" id="fact_1">
							Speed/ Acceleration sensors are used to monitor how fast BLOODHOUND is going at any given point during its run. 
							Acceleration sensors enable us to work out 0-60mph time, 0-100mph time and even 0-1000mph time!
							<br><br>
							Location or GPS sensors enable us to get another set of data points that can help us work out the vehicles acceleration.<br><br>
							Temperature sensors are critical as we will need to be able to monitor the temperature of the engine and breaks to make sure they continue to function properly.
							Fuel levels need to be monitored to ensure that BLOODHOUND has no leaks in its fuel tank.
							<br><br>Air pressure sensors are fitted to the car so Bloodhound can determine how much aerial friction the car under goes during its runs, this then enables the team to work out how much resistive force the car will be facing at higher speeds.
							<br><br>G-force sensors enable the team to monitor Andy Green’s health and vital signs; this is because being exposed to too many G’s of force can damage the human body if exposed for too long.

						</div>
						<div  class="hidden" id="fact_2">
							Data Visualisation is when we look at data in different charts & graphs in order to get insight into any themes or messages that the data may have.
							Oracle Data Visualisation quickly allows you to build a story with data to understand a bit more about it to help interpret and make decisions. 
							This is important for the BLOODHOUND Project as it enables the ability to visually see the captured data from the car and see if there is anything that can be done to improve future runs.
						</div>
						<div  class="hidden" id="fact_3">
							When BLOODHOUND SSC makes its world record attempt, the car will be running in the South African Desert. 
							Normally there is not much network connectivity in the desert, which would make it difficult to connect the Cloud. 
							In order to fix this, telephone masts have been built to enable mobile network coverage (3G? / 4G?). 
							This has also helped the local population as now they can get better access to the internet!
						</div>
						<div  class="hidden" id="fact_4">
							Databases are structured collections of Data, they store information that can be accessed, managed and updated. 
							The Oracle Database Cloud is a Cloud based version of this, and is what is being used to store the data that comes off the car so that it can be easily accessed and connected to tools that can analyse the data to give us insight.
							It is also really important for this project to capture and store this data so that it can be accessed by schools and other interested individuals. 
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="main_split_left">
						<div class="sub_left_splitter_l">
							<div class="bh-logo">
								<img src="images/favicon.png"></img>
							</div>
						</div>
						<div class="sub_left_splitter_r">
							<div class="footer-bold">
								Fast Facts
							</div>
							<div class="footer-sub">
								Connecting the Car to the Cloud
							</div>
						</div>
					</div>
					<div class="main_split_right">
						<div class="sub_right_splitter_l">
							Download this page as a poster or explore more facts with our 'Did you know?' Intelligent Bot!
							<img src="images/download_rotated.png" onmouseover="this.src='images/download_rotated_hover.png';" onmouseout="this.src='images/download_rotated.png';"></img>
						</div>
						<div class="sub_right_splitter_r">
							<div class="bot">
								<script>
									Smooch.init({ appId: '5ae1c43d5d901e00222d57cd',
												  customColors: {
													  brandColor: "fc8100",
													  conversationColor: "002060",
													  actionColor: "002060"
												}});
								</script>
							</div>
						</div>
					</div>
					<div class="main_splitter_middle">
						Interact with the car to see how it connects to the cloud by clicking on the <img src="images/hand_pointer.png"></img>icon.
					</div>
				</div>
			</div>
		</div>
	</body>
</html>