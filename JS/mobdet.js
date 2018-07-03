function detectMobile(redirect_){
	
	if (/Mobi/.test(navigator.userAgent)) {
		
		// User agent is viewing on mobile device.
		$(location).attr('href', redirect_)
	}
}