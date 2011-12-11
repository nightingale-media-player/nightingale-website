/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/

var menu = false;

jQuery(document).ready(function() {

	var s = jQuery('<div id="ngalebutton"><ul id="menu"><li><img src="data:image/png;base64,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" alt="Nightingale"> Nightingale</li></ul></div>');
	s.menuItem('//wiki.getnightingale.com','Wiki');
	s.menuItem('forum','Forum',true);
	s.menuItem('//addons.getnightingale.com','Addons');
	s.menuItem('blog','Blog',true);
	
	jQuery("#page").prepend(s);
	jQuery("#menu").css({'marginTop':jQuery("#menu li a").length*-61+"px"});
	
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
				if(!window.menu)
					jQuery("#menu").animate({'marginTop':'0px'},function(){window.menu=true;});
				else
					jQuery("#menu").animate({'marginTop':jQuery("#menu li a").length*-61+"px"},function(){window.menu=false;});
			}
		}
		else if(e.which==2&&jQuery(this).children("a").length != 0) {
				window.open(window.location.pathname+jQuery(this).children("a").attr('href'));
		}
		e.preventDefault();
		return false;
	});
});

jQuery.fn.menuItem = function(path,name,relative) {
	this.children("#menu").prepend('<li'+(window.location.pathname.search((relative?'/':'')+path)!=-1?' class="actual"':'')+'><a href="'+(window.location.pathname.search((relative?'/':'')+path)!=-1?'#':path)+'">'+name+'</a></li>')
};