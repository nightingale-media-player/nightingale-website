function show(nodeId) {
    document.getElementById(nodeId).style.display = "block";
    document.getElementById(nodeId).style.visibility = "visible";
}

function hide(nodeId) {
    document.getElementById(nodeId).style.display = "";
    document.getElementById(nodeId).style.visibility = "";
}
function toggleNav() {
    if(document.getElementById("ngalenavlist").style.display === "block")
        hide("ngalenavlist");
    else
        show("ngalenavlist");
}

function addEventListenerLegacy(obj, evt, func) {
    if(document.addEventListener) {
        obj.addEventListener(evt, func, false);
    }
    else {
        obj.attachEvent(evt, func);
    }
}
function removeEventListenerLegacy(obj, evt, func) {
    if(document.removeEventListener) {
        obj.removeEventListener(evt, func, false);
    }
    else {
        obj.detachEvent(evt, func);
    }
}

function hideOverlay() {
    hide("overlay");
    hide("instructions");
    removeEventListenerLegacy(document.getElementById("overlay"),"click",hideOverlay);
    if(!('pointerEvents' in document.body.style))
        removeEventListenerLegacy(document.getElementById("instructions"),"click",hideOverlay);
}

window.onload = init;

function init() {  
    addEventListenerLegacy(document.getElementById("expandngalenav"),"click",toggleNav);
    
    //lazyload hiDPI images
    if(window.devicePixelRatio && window.devicePixelRatio > 1.3) {
        var imgs = document.getElementsByTagName("img");
        for(var i = 0; i < imgs.length; i++) {
            if( imgs[i].src && imgs[i].dataset.hasOwnProperty("hdpi") && !imgs[i].src.match(/-hidpi/i)) {
                imgs[i].src = imgs[i].src.replace(/(?!-hidpi)\.(png|jpg)$/i, function(str) {
                    return "-hidpi"+str;
                });
            }
        }
    }
}
