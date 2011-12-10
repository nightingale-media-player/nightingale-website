/* Author: Martin Giger
   Some GNU GPL License :D
*/

var visible;
var breaker = false;

$(document).ready(function() {
	$("#buttons img").mouseover(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'_bg.png');
	});
	
	$("#buttons img").mouseout(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'.png');
	});
	
	$("#screen").mouseover(function() {
		if(!breaker) {
			breaker= true;
			$(this).animate({'height':$("#screen img").outerHeight()+'px'},200,function() {breaker=false;});
		}
	});
	
	$("#screen").mouseout(function() {
		if(!breaker) {
			breaker= true;
			$(this).animate({'height':'150px'},200,function() {breaker=false;});
		}
	});
	
	hideOS(0);
});

function getOS() {
	var OSName="Unknown OS";
	if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
	if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
	if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";
	
	return OSName;
}

function allOS() {
	if(!visible) {
		$("#linux").fadeIn();
		$("#mac").fadeIn();
		$("#windows").fadeIn();
		$("#others").text("hide other OS");
		visible=true;
	}
	else
		hideOS();
}

function hideOS(t) {
	switch(getOS()) {
	case "Windows":
		$("#linux").fadeOut(t);
		$("#mac").fadeOut(t);
		break;
	case "Linux":
		$("#windows").fadeOut(t);
		$("#mac").fadeOut(t);
		break;
	case "MacOS":
		$("#linux").fadeOut(t);
		$("#windows").fadeOut(t);
		break;
	}
	$("#others").text("other OS");
	visible=false;
}





















