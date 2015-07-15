/* Author:  Martin Giger
   License: Some GNU GPL License :D
   
   If you want to update the download button to a new version, pleace replace the links in the version.php file.
*/

//var mouseover = false; unusedè uncomment if you use the social buttons hover thingie


// download button link list is loaded as JS File (version.php).


$(document).ready(function() {	
	// disable selection
	
	$(".button").disableTextSelect();
	$("#screen").disableTextSelect();
	
	// hover social buttons effect
	/*
	$("#buttons img").mouseover(function() {
		$(this).attr('src','//static.getnightingale.com/img/'+$(this).attr('alt')+'_bg.png');
	});
	
	$("#buttons img").mouseout(function() {
		$(this).attr('src','//static.getnightingale.com/img/'+$(this).attr('alt')+'.png');
	});
	*/
	//screenshot box

	$("#screen").click(function(e) {
		//Overlay elemnt code
		var overlay = $('<div id="overlay" style="z-index:1000;height:100%;width:100%;position:fixed;top:0;left:0;background:rgba(0,0,0,0.8);cursor:pointer;display:none;"><img style="margin: 10px auto;display:block;" src="'+$("#screen a").attr('href')+'"></div>');
		
		
		//initialize overlade and fade it in
		$('body').prepend(overlay);
		$('#overlay').fadeIn();
		
		//closing overlay trigger
		$('#overlay').click('fast',function() {
			$('#overlay').fadeOut('fast',function() {
				$('#overlay').remove();
			});
		});
		
		e.preventDefault();
		return false;
	});
	
	// change button to right os
	optimizeOS(getOS(),getArchitecture());
});

// detect OS

function getOS() {
	var OSName="Unknown OS";
	var ua = navigator.userAgent;
	
	if (ua.indexOf("Win") != -1) {
		OSName="Windows"; 
	}
	else if (ua.indexOf("Ubuntu") != -1) {
		OSName="Ubuntu";
	}
	else if (ua.indexOf("Linux") != -1) {
		OSName="Linux";
	}
	else if(ua.indexOf("Mac") != -1) {
		OSName="Mac OSX";
	}
	
	return OSName;
}

// Detect 64bit OSes

function getArchitecture() {
	var arch = 32;
	var OS = getOS();
	
	if(navigator.userAgent.indexOf("64")!=-1 && OS != "Windows" && OS != "Mac OSX")
		arch = 64;
	return arch;
}

function optimizeOS(OS,arch) {
	for (i = 0; i < download.systems.length; i++) {
		if (download.systems[i].name == OS && download.systems[i].architecture == arch) {
			$('.button').attr('href',download.systems[i].link);
			$('.button .small .os').text(OS+" | "+arch+"-Bit");
			$("#screen a").attr('href',download.systems[i].fullsize);
			$("#screen a img").attr('src',download.systems[i].screenshot);
			return true;
		}
	}
	$('#other').hide(); // hide the "we tried to detect" thing
}