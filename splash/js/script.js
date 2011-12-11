/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/

var visible;
var breaker = false;
var mouseover = false;

$(document).ready(function() {
	//hyphenation
	Hyphenator.run();
	
	// disable selection
	
	$(".button").disableTextSelect();
	$("#screen").disableTextSelect();
	$("#ngalebutton").disableTextSelect();
	$("#menu").disableTextSelect();
	$("#buttons").disableTextSelect();
	
	// hover social buttons effect
	
	$("#buttons img").mouseover(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'_bg.png');
	});
	
	$("#buttons img").mouseout(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'.png');
	});
	
	//screen rolldown
	
	$("#screen").mouseover(function() {
		if(!breaker&&!window.menu) {
			breaker= true;
			$("#hoverme").hide();
			$(this).animate({'height':$("#screen img").outerHeight()+'px'},200,function() {
				breaker=false;
				if(!mouseover) {
					$(this).animate({'height':'150px'},200,function() {
						breaker=false;
						$("#hoverme").show();
					});
				}
			});
		}
		mouseover=true;
	});
	
	$("#screen").mouseout(function() {
		if(!breaker) {
			breaker= true;
			$(this).animate({'height':'150px'},200,function() {breaker=false;$("#hoverme").show();});
		}
		mouseover=false;
	});
	
	//downloadbutton stuffz

	$(".button").click(function(e) {
		e.preventDefault();
		return false;
	});
	
	$(".button").hover(function() {
		$(this).fadeTo(300,1);
	},function() {
		$(this).fadeTo(300,0.9);
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
	if(navigator.plattform.indexOf("64")!=-1)
		arch=64;
	return arch;
}


//show all OS buttons
function allOS() {
	if(!visible) {
		$("#linux_32").fadeIn();
		$("#linux_64").fadeIn();
		$("#mac").fadeIn();
		$("#windows").fadeIn();
		$("#others").text("hide other OS");
		visible=true;
	}
	else
		hideOS();
}


//hide unwanted OS buttons
function hideOS(t) {
	switch(getOS()) {
	case "Windows":
		$("#linux_32").fadeOut(t);
		$("#linux_64").fadeOut(t);
		$("#mac").fadeOut(t);
		break;
	case "Linux":
		$("#windows").fadeOut(t);
		$("#mac").fadeOut(t);
		if(getArchitecture()==32) {
			$("#linux_64").fadeOut(t);
		}
		else {
			$("#linux_32").fadeOut(t);
		}
		break;
	case "MacOS":
		$("#linux_32").fadeOut(t);
		$("#linux_64").fadeOut(t);
		$("#windows").fadeOut(t);
		break;
	}
	$("#others").text("other OS");
	visible=false;
}





















