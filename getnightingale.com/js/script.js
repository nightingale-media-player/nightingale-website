/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/

var visible;
var breaker = false;
var mouseover = false;

$(document).ready(function() {	
	// disable selection
	
	$(".button").disableTextSelect();
	$("#screen").disableTextSelect();
	
	// hover social buttons effect
	
	$("#buttons img").mouseover(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'_bg.png');
	});
	
	$("#buttons img").mouseout(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'.png');
	});
	
	//screen box

	//do some fancybox like effect
	
	//downloadbutton stuffz

	$(".button").click(function(e) {
		e.preventDefault();
		return false;
	});
	
	//hide unused buttons
	hideOS(0);
});

// detect OS

function getOS() {
	var OSName="Unknown OS";
	var pc = navigator.platform
	if (pc.indexOf("Win")!=-1) OSName="Windows";
	if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
	if (pc.indexOf("Linux")!=-1) OSName="Linux";
	
	return OSName;
}

// Detect 64bit OSes

function getArchitecture() {
	var arch = 32;
	if(navigator.platform.indexOf("64")!=-1)
		arch = 64;
	return arch;
}


//show all OS buttons


//hide unwanted OS buttons
function hideOS(t) {
	switch(getOS()) {
	case "Windows":
		$("#linuxt").fadeOut(t);
		$("#linuxs").fadeOut(t);
		$("#mac").fadeOut(t);
		break;
	case "Linux":
		$("#windows").fadeOut(t);
		$("#mac").fadeOut(t);
		if(getArchitecture()!=32)
			$("#linuxt").fadeOut(t);
		else
			$("#linuxs").fadeOut(t);
		break;
	case "MacOS":
		$("#linuxt").fadeOut(t);
		$("#linuxs").fadeOut(t);
		$("#windows").fadeOut(t);
		break;
	}
	$("#others").text("other OS");
	visible=false;
}





















