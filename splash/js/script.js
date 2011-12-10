/* Author: Martin Giger
   Some GNU GPL License :D
*/

var visible;
var breaker = false;
var menu = false;

$(document).ready(function() {
	Hyphenator.run();
	
	$("#buttons img").mouseover(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'_bg.png');
	});
	
	$("#buttons img").mouseout(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'.png');
	});
	
	$("#screen").mouseover(function() {
		if(!breaker&&!menu) {
			breaker= true;
			$("#hoverme").hide();
			$(this).animate({'height':$("#screen img").outerHeight()+'px'},200,function() {breaker=false;});
		}
	});
	
	$("#screen").mouseout(function() {
		if(!breaker) {
			breaker= true;
			$(this).animate({'height':'150px'},200,function() {breaker=false;$("#hoverme").show();});
		}
	});
	
	$("#menu li").dblclick(function(e) {
		if($(this).children("a").length != 0)
			window.open(window.location.pathname+$(this).children("a").attr('href'));
		e.preventDefault();
		return false;
	});
	
	$("#menu li").mousedown(function(e) {
		if(e.which==1) {
			if($(this).children("a").length != 0)
				window.location.href = $(this).children("a").attr('href');
			else {
				if(!menu)
					$("#menu").animate({'marginTop':'0px'},function(){menu=true;});
				else
					$("#menu").animate({'marginTop':'-183px'},function(){menu=false;});
			}
		}
		else if(e.which==2&&$(this).children("a").length != 0) {
				window.open(window.location.pathname+$(this).children("a").attr('href'));
		}
		e.preventDefault();
		return false;
	});
	
	$(".button").click(function(e) {
		e.preventDefault();
		return false;
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





















