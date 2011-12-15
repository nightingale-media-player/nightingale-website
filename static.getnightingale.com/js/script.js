/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/
var visible;
var breaker = false;
var mouseover = false;


// download button link list
var download = {
	'systems': [
		{
			'name': 'Linux',
			'architecture': 32,
			'link': 'https://github.com/downloads/nightingale-media-player/nightingale-hacking/nightingale-1.8.1-ed3358a-linux-i686.tar.gz'
		},
		{
			'name': 'Linux',
			'architecture': 64,
			'link': 'https://github.com/downloads/nightingale-media-player/nightingale-hacking/nightingale-1.8.1-ed3358a-linux-x86_64.tar.bz2'
		},
		{
			'name': 'Windows',
			'architecture': 32,
			'link': 'https://github.com/downloads/nightingale-media-player/nightingale-hacking/Nightingale_1.8.1-1863_windows-i686.exe'
		}
	]
};

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
	//screen box

	$("#screen").click(function(e) {
		//Overlay elemnt code
		var overlay = $('<div id="overlay" style="height:100%;width:100%;position: fixed;top:0;left:0;background:rgba(0,0,0,0.8);cursor:pointer;display:none;"><img style="margin: 10px auto;display:block;" src="'+$("#screen a").attr('href')+'"></div>');
		
		
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
	if (ua.indexOf("Linux") != -1) {
		OSName="Linux";
	}
	
	return OSName;
}

// Detect 64bit OSes

function getArchitecture() {
	var arch = 32;
	
	if(navigator.userAgent.indexOf("64")!=-1 && getOS() != "Windows")
		arch = 64;
	return arch;
}

function optimizeOS(OS,arch) {
	for (i = 0; i < download.systems.length; ++i) {
		if (download.systems[i].name == OS && download.systems[i].architecture == arch) {
	
			$('.button').attr('href',download.systems[i].link);
			$('.button .small').text(OS+" | "+arch+"-Bit");
			break;
		}
	}
}