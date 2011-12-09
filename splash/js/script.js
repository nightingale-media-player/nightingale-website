/* Author: Martin Giger
   Some GNU GPL License :D
*/

$(document).ready(function() {
	$("#buttons img").mouseover(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'_bg.png');
	});
	
	$("#buttons img").mouseout(function() {
		$(this).attr('src','img/'+$(this).attr('alt')+'.png');
	});
});





















