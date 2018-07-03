/*
	Author: Chris Wing
	Date: 28/02/2018
	Desc: To sync camera feeds from Bloodhound runs.
	Notes:
		- For some reason calling the video elements via jQuery (v1.play() / v1.pause()) does not work.
		  A work around is using the explicit call document.getElementById("v1").play() / .pause(). 
*/

$(document).ready(function(){
	
	/* ? General globals start ? */

	// The generic data indexer.
	var index = 0;
			
	// Array containing run specific graph data.
	var csvData = [];
	
	/* ? General globals end ? */
	
	/* ? Timeline code start ? */ 
	
	var feedDuration = 50;
	var currentProgress = 0;
	var increment = (100 / feedDuration) / 20;	
	var widthCounter = 0;
	
	// Progress bar marker.
	var bar = $(".bar");
	var bar_marker = $(".bar-marker");
	
	// This function enables the progress bar at the bottom to update ('move').
	function makeProgress(){
		
		var currentWidth = bar.width();
		
		if(widthCounter < 100){
			
			widthCounter += increment;
			
			bar.css("width", widthCounter + "%");
			
			if(widthCounter < 88){
				
				bar_marker.css("margin-left", widthCounter + "%");
			}	
		}
	}
	
	/* ?  Timeline code end ? */
		
	/* ? Graph data load code start ? */
	
	// Three variables where the graph data is stored.
	var timeData = [];
	var speedData = [];
	var graphSpeedData = [];
	
	// AJAX call to load the run data from the .CSV file.
	$.ajax({
			type: "GET",
			url: "Data/Run_1/car_data.csv",
			dataType: "text",
			success: function(data) {processData(data);},
			async: false
	});

	// Reads CSV file and extracts data.
	function processData(allText) {
		var allTextLines = allText.split(/\r\n|\n/);
		var headers = allTextLines[0].split(',');
		var csvData = [];
		
		for (var i = 1; i < allTextLines.length; i++) {
			var data = allTextLines[i].split(',');
			if (data.length == headers.length) {

				var tarr = [];
				for (var j = 0; j < headers.length; j++) {
					
					tarr.push(data[j]);
				}								
				csvData.push(tarr);
			}
		}
		
		var rawData = arrangeData(csvData);
		
		// Populates the speed/time arrays with run data.
		timeData = rawData[0];
		speedData = rawData[1];
	}

	// Arranges data in a way our graph system can understand.
	function arrangeData(data){
		
		var length = data.length;
		var c1 = [];
		var c2 = [];	
		
		for(var i = 0; i < length; i++){
				
			var tmp = String(data[i]);
			var splitter = tmp.split(",");	
			
			c1.push(splitter[0]);
			c2.push(splitter[1]);	
		}
		return [c1, c2];
	}
		
	/* ?  Graph data load code start ? */
	/* ------------------------------- */
	/* ?  Video sync code start      ? */
	
	// Grabs the video-feed elements within the page.
	var v1 = document.getElementById('v1');
	var v2 = document.getElementById('v2');
	var v3 = document.getElementById('v3');
		
	// So I dont go deaf whilst testing... sorry what?
	v1.volume = 0;
	v2.volume = v1.volume;
	v3.volume = v1.volume;
			
	// Previous volume value.
	var previousValue = 0;
	
	// Handles volume change.
	window.setInterval(function(){

		if($(".output").html() != previousValue){
			
			// console.log($(".output").html());
			previousValue = parseInt($(".output").html()) / 100;
			
			v1.volume = previousValue;
			
			// Now need to handle when feeds change...
		}
	
	}, 500);	
										
	var v1Current = null;
	var v2Current = null;
	var v3Current = null;
	
	// The duration of the initial feed's video.
	var nasterDuration = 0;
	
	v1.addEventListener('loadedmetadata', function () {
		
		masterDuration = v1.duration;
		console.log(masterDuration);
	});
	
	// Actively playing?
	var isPlaying = null;
	
	// Initializing values
	var onplaying = true;
	var onpause = false;

	// On video playing toggle values
	v1.onplaying = function(){
		onplaying = true;
		onpause = false;
	};

	// On video pause toggle values
	v1.onpause = function(){
		onplaying = false;
		onpause = true;
	};

	// Play video function
	function playVid(){      
			
		$(".pause-play").html("<img src='images/pause-button.png'></img>");
		
		document.getElementById("v1").play();
		document.getElementById("v2").play();
		document.getElementById("v3").play();
	} 

	// Pause video function
	function pauseVid() {     
		if (!v1.paused && !onpause) {
			
			$(".pause-play").html("<img src='images/play-button.png'></img>");
			
			document.getElementById("v1").pause();
			document.getElementById("v2").pause();
			document.getElementById("v3").pause();
		}
	}	
	
	var progress = true;
	var fact_card = true;
	
	var counter = 1;
	
	// Handles click events of play/ pause button.
	$(".pause-play").on("click", function(event){
		
		if(isPlaying == null){
			
			// Used to plot graph data in real time, fully synced.
			plotter = setInterval(plotData, 900)
	
			// Starts the progress bar.
			progress = window.setInterval(makeProgress, 50); 
			
			if($("#showFacts").is(":checked")){
				
				addNewContentFrame();
				console.log(parseInt(masterDuration / 12) * 1000);
				fact_card = setInterval(addNewContentFrame, 3600);
			}
			
			document.getElementById("v1").play();
			document.getElementById("v2").play();
			document.getElementById("v3").play();
			
			isPlaying = true;
			$(this).html("<img src='images/pause-button.png'></img>");
		}
		else if(!isPlaying){ 
		
			// Used to plot graph data in real time, fully synced.
			plotter = setInterval(plotData, 900)
			
			// Starts the progress bar.
			progress = window.setInterval(makeProgress, 50); 
			
			if($("#showFacts").is(":checked")){
				
				addNewContentFrame();
				fact_card = setInterval(addNewContentFrame, 3600);
			}
			
			playVid(); 
			isPlaying = true;
			
			$(this).html("<img src='images/pause-button.png'></img>");
		}
		else if(isPlaying){
			
			// Stops the graph plotting data.
			clearInterval(plotter);
			
			// Stops the progress bar.
			clearInterval(progress);
			
			clearInterval(fact_card);
			
			pauseVid();
			isPlaying = false;
			
			$(this).html("<img src='images/play-button.png'></img>");
		}
	});
	
	// Handles click events of the restart button.
	$(".restart").on("click", function(event){
		
		// Resets the graph.
		replotGraph();
		
		// Resets the progress bar.
		$(".bar").css("width", "0%");
		$(".bar-marker").css("margin-left", "0%");
		widthCounter = 0;
		
		document.getElementById("v1").pause();
		document.getElementById("v2").pause();
		document.getElementById("v3").pause();
		
		v1.currentTime = 0;
		v2.currentTime = 0;
		v3.currentTime = 0;
			
		// Currently the graph/ feeds are playing, so on restart we want to auto-play.
		if(isPlaying){
					
			document.getElementById("v1").play();
			document.getElementById("v2").play();
			document.getElementById("v3").play();
			
			$(".pause-play").html("<img src='images/pause-button.png'></img>");
			isPlaying = true;
			counter = 1;
		}
		// Here we are restarting from pause, so we restart and keep the graph/ feeds paused.
		else{
			
			$(".pause-play").html("<img src='images/play-button.png'></img>");
			isPlaying = false;
			counter = 1;
		}
	});
	
	// Updates the current time-component of v1 feed.
	$("#v1").on("timeupdate", function(event){
		
		
		v1Current = this.currentTime;
		$(".time_indicator").text(Math.round(v1Current) + " (s)");
		
		// Video is over!
		if(v1Current == masterDuration - 1){
			
			$(".pause-play").html("<img src='images/play-button.png'></img>");
		}
	});
	
	$("#sec_1").on("click", function(event){
			
		// Pauses all videos in the frame.
		pauseVid();	
		
		// Captures the time stamp of all feeds as they will be reset on .load() call.
		var tmpV1 = v1Current;
		var tmpV2 = v2Current;
		var tmpV3 = v3Current;
		
		// Captures the main feed and the 'this' feed which triggered the event.
		var feed_this = $(this).find("#div_1 video")[0];
		var feed_main = $(".main_feed video")[0];
		var tmp_src_this = feed_this.src;
		var tmp_src_main = feed_main.src;
		//
		var desc_this = $(this).find(".video_desc").html();
		var desc_main = $("#v1-desc").val();
		var tmp_desc_this = desc_this;
		
		
		feed_this.src = tmp_src_main;
		feed_main.src = tmp_src_this;
		
		$("#v2-desc-container").text(desc_main);
		$("#v1-desc").val(tmp_desc_this);
			
		feed_this.load();
		feed_main.load();
		
		v1.currentTime = tmpV1;
		v2.currentTime = tmpV2;
		v3.currentTime = tmpV3;
		
		// If we want to override play option when switching feeds.
		if($("#toggleAutoplay").is(':checked')){
			
			document.getElementById("v1").play();
			document.getElementById("v2").play();
			document.getElementById("v3").play();
			
			// Enables the graph to stay in sync.
			// !isPlaying = vids are running.
			if(!isPlaying){
				
				$(".pause-play").click();
				$(".pause-play").html("<img src='images/pause-button.png'></img>");
			}
			// The videos are currently paused.
			else{
				
				// Don't do anything?
				$(".pause-play").html("<img src='images/pause-button.png'></img>");
			}	
		}
		// Not checked, therefore pause on switch.
		else{
			
			// Vids not playing.
			if(isPlaying){
				
				$(".pause-play").click();
				$(".pause-play").html("<img src='images/play-button.png'></img>");
			}
		}
	});
	
	$("#sec_2").on("click", function(event){
			
		// Pauses all videos in the frame.
		pauseVid();
				
		// Captures the time stamp of all feeds as they will be reset on .load() call.
		var tmpV1 = v1Current;
		var tmpV2 = v2Current;
		var tmpV3 = v3Current;
		
		// Captures the main feed and the 'this' feed which triggered the event.
		var feed_this = $(this).find("#div_2 video")[0];
		var feed_main = $(".main_feed video")[0];
		var tmp_src_this = feed_this.src;
		var tmp_src_main = feed_main.src;
		//
		var desc_this = $(this).find(".video_desc").html();
		var desc_main = $("#v1-desc").val();
		var tmp_desc_this = desc_this;
		
		feed_this.src = tmp_src_main;
		feed_main.src = tmp_src_this;
		
		$("#v3-desc-container").text(desc_main);
		$("#v1-desc").val(tmp_desc_this);
		
		feed_this.load();
		feed_main.load();
		
		v1.currentTime = tmpV1;
		v2.currentTime = tmpV2;
		v3.currentTime = tmpV3;
		
		// If we want to override play option when switching feeds.
		if($("#toggleAutoplay").is(':checked')){
			
			document.getElementById("v1").play();
			document.getElementById("v2").play();
			document.getElementById("v3").play();
			
			// Enables the graph to stay in sync.
			if(!isPlaying){
				
				$(".pause-play").click();
				$(".pause-play").html("<img src='images/pause-button.png'></img>");
			}
			else{
				// Don't do anything?
				$(".pause-play").html("<img src='images/pause-button.png'></img>");
			}	
		}
		// Not checked, therefore pause on switch.
		else{
			
			// Vids not playing.
			if(isPlaying){
				
				$(".pause-play").click();
				$(".pause-play").html("<img src='images/play-button.png'></img>");
			}
		}
	});
	
	/* ?  Video sync code end   ? */
 	/* -------------------------- */
	/* ?  Graph plot code start ? */
	
	// Every second this is called and adds a new data point to the graph. Updated in real time.
	function plotData(){
		
		if(index < speedData.length){
			
			var newSpeedPoint = speedData[index];
			
			graphSpeedData[index] = newSpeedPoint;
			
			// Updates the HUD.
			$(".speed_indicator").html(Math.round(newSpeedPoint, 0) + " mph");
			
			// Updates the index.
			index++;
			
			chart = new Chartist.Line('.ct-chart', {
				labels: timeData, // Time data loaded in from the current CSV file.
				series: [graphSpeedData] // Speed data loaded in from the current CSV file.
			}, {
			  low: 0
			});
		}
	}
	
	// Called only when the graph is reset. Resets the data inside the graph as well as HUD.
	function replotGraph(){
		
		graphSpeedData = [];
		index = 0;
		
		// Updates the HUD.
		$(".speed_indicator").html("0 mph");
			
		chart = new Chartist.Line('.ct-chart', {
			labels: timeData, // Time data loaded in from the current CSV file.
			series: [graphSpeedData] // Speed data loaded in from the current CSV file.
		}, {
		  low: 0
		});	
	}
	
	var chart = new Chartist.Line('.ct-chart', {
	  labels: timeData, // Time data loaded in from the current CSV file.
	  series: [graphSpeedData] // Speed data loaded in from the current CSV file.
	}, {
	  low: 0
	});

	// Let's put a sequence number aside so we can use it in the event callbacks
	var seq = 0,
	  delays = 100,
	  durations = 1000;

	// Once the chart is fully created we reset the sequence
	chart.on('created', function() {
	  seq = 0;
	});

	
	// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
	chart.on('draw', function(data) {

		if(data.type === 'line'){
			// If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
			data.element.animate({
			  opacity: {
				// The delay when we like to start the animation
				begin: seq * delays + 1000,
				// Duration of the animation
				dur: durations,
				// The value where the animation should start
				from: 0,
				// The value where it should end
				to: 1
			  }
			});
		}	
		else if(data.type === 'point') {
			seq++;
			// console.log("Current data point: " + seq);
			
			data.element.animate({
			  opacity: {
				begin: seq * delays,
				dur: 10000,
				from: 0,
				to: 1,
				easing: 'easeOutQuart'
			  }
			});
		} 
	});
	/* ?  Graph plot code end ? */ 
	
	/* ?  Fact card display code start ? */ 
	
	function addNewContentFrame(){
		
		if(counter == 12){ clearInterval(fact_card); }
		$(".fact-popups").append("<div id='content_frame_" + counter + "' class='content'><a href='#' class='image_capture' id='content_frames/frame_" + counter  + ".png' onclick='on(" + counter + ")'><img src='images/content_frames/frame_" + counter  + ".png'></img></a></div>");
	
		$("#content_frame_" + counter).fadeOut(7000);
		counter += 1;
	}	
	
});

	function loadImage(counter){
	
		$("#image_container").html("");
		$("#image_container").append("<img id='image_overlay' src='images/content_frames/frame_" + counter + ".png' onclick='off()'></img>");
	}
	
	function on(counter) {
			
		document.getElementById("overlay").style.display = "block";
		
		loadImage(counter);
		
		// Pauses the video feeds + graphs I think?
		$(".pause-play").click();
	}

	function off() {
				
		document.getElementById("overlay").style.display = "none";
		
		// Resumes the video feeds + graphs I think?
		$(".pause-play").click();
	}
	
	/* ?  Fact card display code end ? */