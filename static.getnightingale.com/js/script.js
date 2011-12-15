/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/
var visible;
var breaker = false;
var mouseover = false;

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

	/*$("#screen").click(function() {
		var overlay = $('<div style="height:100%;width:100%;position: fixed;top:0;left:0;background:rgba(0,0,0,0.8);">');
	}*/
	
	//downloadbutton stuffz

	$(".button").click(function(e) {
		e.preventDefault();
		return false;
	});
	
	// change to right os
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
	var a=0;
	do {
		a++;
	} while (download.systems[a].name != OS && a < download.systems.length && download.systems[a].architecture == arch);
	$('.button').attr('href',download.systems[a].link);
	$('.button .small').text(OS+" | "+arch);
	$('.button').click(function() {
		window.location = download.systems[a].link;
	});
}