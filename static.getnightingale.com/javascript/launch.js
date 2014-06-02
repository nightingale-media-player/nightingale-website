function nightingaleOpen(stay) {
    var gotourl = window.location.search.match(/^\?[a-z=&]*url=([^&]+)&?.*$/)[1];
    if(gotourl) {
        setTimeout(function() {
            window.location.href = 'ngale:open?url='+gotourl;
            if (!stay) {
                if (window.history.length < 2))
                    setTimeout(window.close, 100);
                else
                    setTimeout(window.history.back, 100);
            }
            return true;
        }, 1);
    }
    else {
        setTimeout(window.close, 100);
    }
}

window.onload = function() { nightingaleOpen(false); };
