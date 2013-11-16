/**
 *  Crowd Dashboard Javascript
 *  Created by Martin giger in 2013
 *  Licensed under GPLv2
 *  
 *  Credits for the status ping image hack idea to (even tough this might not be ther original source): http://jsfiddle.net/Maslow/GSSCD/
 */

"use strict";

Dashboard.prototype.servers = [];
Dashboard.prototype.elementId = "crowd-dashboard-status-list";
Dashboard.prototype.count = 0;
Dashboard.prototype.ready = -1;
Dashboard.prototype.onready = null;

function Dashboard(servers, elementId) {
    this.servers = new Array();

    if( servers ) {
        this.setServers( servers );
        if( elementId ) {
            this.setTarget( elementId );
        }

        if(!this.isReady()) {
            this.checkServers();
        }
    }
}

Dashboard.prototype.setServers = function(servers) {
    if( typeof servers == "object" && servers.length > 0 ) {
        this.servers = servers;
        for( var serverList in this.servers ) {
            this.count += this.servers[serverList].pages.length;
        }

        this.checkServers();
    }
    else if( typeof this.onready == "function" && this.onready != null )
        this.onready();

};

Dashboard.prototype.setTarget = function(elementId) {
    if( typeof elementId == "string" ) {
        this.elementId = elementId;
    }
};

Dashboard.prototype.checkServers = function() {
    // not too nice way to do it, but it does the job
    document.getElementById(this.elementId).innerHTML = 'Loading...';
    this.ready = 0;

    var that = this;
    function getStatus(url, callback) {
        var img = new Image();
        var done = false;

        img.onload = function() {
            callback( url, true, that );
            done=true;
        };
        img.onerror = function(e) {
            //x-origin/no image
            callback( url, true, that );
            done=true;
        };

        setTimeout(function() {
            if(!done)
                callback( url, false, that );
        }, 5000);

        var rand = (url.contains('?')?'&':'?')+'timestamp='+Date.now();
        img.src = url+rand;
    }
    
    function getStatusAPI(url, callback) {
        var urlObj = URL(url) || window.URL(url) || window.webkitURL(url),
            rand = '?timestamp='+Date.now(),
            funcName = 'processStatusAPI' + window.btoa(encodeURI(urlObj.hostname+rand)).replace(/[\/=]./,'');
            
        window[funcName] = function(response) {
            callback( url, response.status == "good", that );
        }
            
        var script = document.createElement("script");
        script.src = 'https://status.' + urlObj.host + '/api/status.json' + rand + '&callback=' + funcName;
        document.body.appendChild(script);
    }

    for( var serverList in this.servers ) {
        for( var page in this.servers[serverList].pages) {
            if(!this.servers[serverList].pages[page].hasOwnProperty("hasStatusAPI") || !this.servers[serverList].pages[page].hasStatusAPI)
                getStatus(this.servers[serverList].pages[page].url, this.addServerToList);
            else
                getStatusAPI(this.servers[serverList].pages[page].url, this.addServerToList);
        }
    }
};

Dashboard.prototype.addServerToList = function( url, online, that ) {
    var page;
    for( var serverList in that.servers ) {
        for( var pageIndex in that.servers[serverList].pages) {
            page = that.servers[serverList].pages[pageIndex];
            if(page.url == url) {
                page.online = online;
                that.ready++;
                break;
            }
        }
    }

    if(that.isReady()) {
        document.getElementById(that.elementId).innerHTML = '';
        that.createLists();
        if( typeof that.onready == "function" && that.onready != null )
            that.onready();
    }
};

Dashboard.prototype.isReady = function() {
    return this.count == this.ready;
};

Dashboard.prototype.clear = function() {
    this.servers = {};
    this.count = 0;
    this.ready = -1;
    // not too nice way to do it, but it does the job
    document.getElementById(this.elementId).innerHTML = '';
};

Dashboard.prototype.createLists = function() {
    var root = document.getElementById(this.elementId);
    var heading, list, item, link;
    for(var serverList in this.servers) {
        heading = document.createElement('h2');
        heading.appendChild(document.createTextNode(this.servers[serverList].name));
        list = document.createElement('ul');
        for(var page in this.servers[serverList].pages) {
            item = document.createElement('li');
            link = document.createElement('a');
            link.href = this.servers[serverList].pages[page].url;
            link.appendChild(document.createTextNode(this.servers[serverList].pages[page].name));
            item.appendChild(link);
            if(this.servers[serverList].withLocations) {
                item.appendChild(document.createTextNode(" in "));
                link = document.createElement('a');
                link.classList.add('dashboard-location');
                link.href = 'http://maps.google.com/?q='+this.servers[serverList].pages[page].location;
                link.appendChild(document.createTextNode(this.servers[serverList].pages[page].location));
                item.appendChild(link);
            }
            item.classList.add(this.servers[serverList].pages[page].online?'online':'offline');
            list.appendChild(item);
        }
        root.appendChild(heading);
        root.appendChild(list);
    }
};
