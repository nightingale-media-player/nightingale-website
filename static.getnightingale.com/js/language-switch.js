window.onload = function() {
	var lang = navigator.language.substr(0,2);
	var link = document.getElementById("forumhelplink");

	switch(lang) {
		case "de":	link.href = "http://forum.getnightingale.com/forum-16.html";
					link.innerHTML = "Hilfe";
					link.title = "Hilfe";
		break;
		case "fr":	link.href = "http://forum.getnightingale.com/forum-17.html";
					link.innerHTML = "Aide";
					link.title = "Aide";
		break;
		case "it":	link.href = "http://forum.getnightingale.com/forum-18.html";
					link.innerHTML = "Aiuto";
					link.title = "Aiuto";
		break;
		default: link.href = "http://forum.getnightingale.com/forum-13.html";
	}	
	placeFooter
}

window.onresize = placeFooter();

function placeFooter() {
	var footer = document.getElementById("ngalemainfooter");
	if(window.innerHeight>footer.offsetTop+footer.scrollHeight) {
		footer.style.position = "absolute";
		footer.style.bottom = "0px";
		footer.style.left = "0px";
	}
	else {
		footer.style.position = "static";
	}
}