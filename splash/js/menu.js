/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/

var menu = false;

$(document).ready(function() {

// anchor imitation&animation of li in #menu
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
});