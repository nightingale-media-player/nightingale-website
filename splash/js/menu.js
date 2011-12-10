/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/

var menu = false;

jQuery(document).ready(function() {

// anchor imitation&animation of li in #menu
	jQuery("#menu li").dblclick(function(e) {
		if(jQuery(this).children("a").length != 0)
			window.open(window.location.pathname+jQuery(this).children("a").attr('href'));
		e.preventDefault();
		return false;
	});
	
	jQuery("#menu li").mousedown(function(e) {
		if(e.which==1) {
			if(jQuery(this).children("a").length != 0)
				window.location.href = jQuery(this).children("a").attr('href');
			else {
				if(!menu)
					jQuery("#menu").animate({'marginTop':'0px'},function(){menu=true;});
				else
					jQuery("#menu").animate({'marginTop':'-183px'},function(){menu=false;});
			}
		}
		else if(e.which==2&&jQuery(this).children("a").length != 0) {
				window.open(window.location.pathname+jQuery(this).children("a").attr('href'));
		}
		e.preventDefault();
		return false;
	});
});