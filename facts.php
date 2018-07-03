<html>
	<head>
		<?php include("header.php"); ?>
		<script type="text/javascript" src="JS/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="JS/facts.js"></script>
		<link rel="stylesheet" href="CSS/facts.css"> 
	
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
		<div id="content">
			<div class="nav">
				<?php include("nav.php"); ?>
				<div id="return">
					<a href="./">
						<img src="images/return-icon.png"></img>Return to landing page...
					</a>
				</div>
			</div>
			<div id="container">
				<div class="body">
					<div class="facts-container">
						<div class="fact-card" id="node-1">
							<img src="images/sensor_graphic.png"></img>
							<input type="hidden" id="node-1-hidden-1" value="There are <div class='highlight'>600</div> sensors on the car<br><img src='images/sensor_graphic.png'></img>"/>
							<input type="hidden" id="node-1-hidden-2" value="<div class='highlight'>Sensors</div> are used to collect data about different parts of the car. This includes ground speed, acceleration, break temperatures and g-force."/>
						</div>
						<div class="fact-card" id="node-2">
							<img src="images/data_background.png"></img>
							<input type="hidden" id="node-2-hidden-1" value="Sensors generate <div class='highlight'>1 million lines of data per second</div><br><br><img src='images/data_background.png'></img>" />
							<input type="hidden" id="node-2-hidden-2" value="1 million lines of data being " />
						</div>
						<div class="fact-card" id="node-3">
							<img src="images/rpi.png"></img>
							<input type="hidden" id="node-3-hidden" value="Data is collected by <div class='highlight'>4 Raspberry Pi's</div><br><img src='images/rpi.png'></img>" />
						</div>
						<div class="fact-card" id="node-4">
							<img src="images/udp_graphic.png"></img>
							<input type="hidden" id="node-4-hidden" value="Real time computers are sending sensor data to the cloud using <div class='highlight'>User Datagram Protocol</div> packets<br><br><img src='images/udp_graphic.png'></img>" />
						</div>
						<div class="fact-card" id="node-5">
							<img src="images/rtg_graphic.png"></img>
							<input type="hidden" id="node-5-hidden" value="There are <div class='highlight'>7 real time gateways</div> (connecting 2 different networks)<br><img src='images/rtg_graphic.png'></img>" />
						</div>
						<div class="fact-card" id="node-6">
							<img src="images/video_gallery.png"></img>
							<input type="hidden" id="node-6-hidden" value="There are <div class='highlight'>4 GoPros</div> so you can see the car in real time (when live)<br><br><img src='images/video_gallery.png'></img>" />
						</div>
						<div class="fact-card" id="node-7">
							<img src="images/oracle_cloud.png"></img>
							<input type="hidden" id="node-7-hidden" value="Data from the sensors is sent to the <div class='highlight'>Oracle Cloud</div><br><br><img src='images/oracle_cloud.png'></img>" />
						</div>
						<div class="fact-card" id="node-8">
							<img src="images/db_graphic.png"></img>
							<input type="hidden" id="node-8-hidden" value="Data is stored in a <div class='highlight'>Database Cloud</div><br><br><img src='images/db_graphic.png'></img>" />
						</div>
						<div class="fact-card" id="node-9">
							<img src="images/data.png"></img>
							<input type="hidden" id="node-9-hidden" value="The database then connects to a <div class='highlight'>Data Visualisation tool to create visualisations of runs</div><br><br><img src='images/data.png'></img>" />
						</div>
						<div class="fact-card" id="node-10">
							<img src="images/dashboard.png"></img>
							<input type="hidden" id="node-10-hidden" value="A <div class='highlight'>real time dashboard</div> allows you to see speed and fuel levels when the car is running<br><br><img src='images/dashboard.png'></img>" />
						</div>
						<div class="fact-expanded" id="ex-1"></div>
						<div class="fact-expanded" id="ex-2"></div>
					</div>
					<div class="bloodhound-container">
						<img src="images/mini-bloodhound.png"></img>
					</div>
					<div class="fact-track">
						<img src="images/new_fast_facts.png"></img>
					</div>
				</div>
				<div class="footer">
					<div class="footer-left">
						<div class="footer-logo">
							<img src="images/favicon.png"></img>
						</div>
						<div class="footer-title">
							<div class="footer-bold">
								Amazing Facts
							</div>
							<div class="footer-sub">
								Connecting the Car to the Cloud
							</div>
						</div>
					</div>
					<div class="footer-right">
						<div class="footer-main-right">
							<div class="more-title">
								Download this page as a poster or explore more facts with our 'Did you know?' Intelligent Bot!
							</div>
							<div class="more-right">
								<br>
								<div id="bot">
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
							<div class="more-left">
								<br>
								<div id="download">
									<img src="images/download_rotated.png" onmouseover="this.src='images/download_rotated_hover.png';" onmouseout="this.src='images/download_rotated.png';"></img>
								</div>
							</div>
						</div>
						<div class="footer-main-left">
							<div class="controller-text">
								To progress the Bloodhound car and show more facts, please click the arrow:
							</div>
							<div class="controller-left">
								<br>
								<div id="progress">
									<img src="images/return-icon.png" onmouseover="this.src='images/return-icon_hover.png';" onmouseout="this.src='images/return-icon.png';"></img>
								</div>
							</div>
							<div class="controller-right">
								<br>
								<div id="restart">
									<img src="images/restart.png" onmouseover="this.src='images/restart_hover.png';" onmouseout="this.src='images/restart.png';"></img>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>