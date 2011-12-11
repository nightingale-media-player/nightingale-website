/* Author:  Martin Giger
   License: Some GNU GPL License :D
*/

var menu = false;
var hover = false;

jQuery.fn.menuItem = function(path,name,relative) {
	this.children("#menu").prepend('<li'+(window.location.pathname.search((relative?'/':'')+path)!=-1?' class="actual"':'')+'><a href="'+(window.location.pathname.search((relative?'/':'')+path)!=-1?'#':path)+'">'+name+'</a></li>');
};

jQuery(document).ready(function() {
	
	var img = 'data:image/png;base64,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';
	var arrow = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAPCAYAAADtc08vAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9sMCxMYGCnLMWoAAAAdaVRYdENvbW1lbnQAAAAAAENyZWF0ZWQgd2l0aCBHSU1QZC5lBwAAAKNJREFUKM/t0b0JwmAUheEgFloGMkJwhgzgArqGhW6ijWNkAq3dQR0hoJ1NCI+FVwgaf0oLD3zNPe+5XL6TYOWmNfrJB6EfLCwT9FDGYIP0TTjFNtgSvbsxxC6MPUYd4VF4gh08AhmOAZwwbnljnMM7IHt1Yo4qwBqzeHXMKuSfPqnAxbMuKJJvhCmaVrjB5BXcWSMWrQXzf40/XeObJZ01PuoKPqbeLj+W/IQAAAAASUVORK5CYII=';
	var s = jQuery('<div id="ngalebutton"><ul id="menu"><li><img src="'+img+'" alt="Nightingale"> <span id="mtext">Nightingale <img src="'+arrow+'" alt="Arrow down"></span></li></ul></div>');
	s.menuItem('//wiki.getnightingale.com','Wiki');
	s.menuItem('forum','Forum',true);
	s.menuItem('//addons.getnightingale.com','Addons');
	s.menuItem('blog','Blog',true);
	
	jQuery("#page").prepend(s);
	jQuery("#menu").css({'marginTop':jQuery("#menu li a").length*-46+"px"});
	
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
				if(!window.menu) {
					jQuery("#menu").animate({'marginTop':'0px'});
					jQuery("#menu #mtext").text("Menu");
					window.menu=true;
				}
				else {
					jQuery("#menu").animate({'marginTop':jQuery("#menu li a").length*-46+"px"},function(){window.menu=false;if(!hover){jQuery("#menu #mtext").html("Nightingale <img src='"+arrow+"' alt='Arrow down'>");}});
				}
			}
		}
		else if(e.which==2&&jQuery(this).children("a").length != 0) {
				window.open(window.location.pathname+jQuery(this).children("a").attr('href'));
		}
		e.preventDefault();
		return false;
	});
	
	jQuery("#menu").mouseenter(function() {
		if(!menu) {
			jQuery("#menu #mtext").text("Menu");
			hover=true;
		}
	});
	jQuery("#menu").mouseleave(function() {
		if(hover) {
			if(!menu)
				jQuery("#menu #mtext").html("Nightingale <img src='"+arrow+"' alt='Arrow down'>");
			hover=false;
		}
	});
});