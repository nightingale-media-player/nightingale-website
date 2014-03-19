/**
 *  Crowd Dashboard Javascript
 *  Created by Martin Giger in 2014
 *  Licensed under GPLv2
 *  Visit the GitHub project: http://freaktechnik.github.io/Crowd-Dashboard
 *  Version 1.3.0
 *  
 *  Credits for the status ping image hack idea to (even tough this might not be the original source): http://jsfiddle.net/Maslow/GSSCD/
 */

(function(global) {
"use strict";

/*
// Constructor
   constructs the dashboard, checks the servers if a server array is passed. The second argument allows the Dashboard to be output to a specific element.
*/
global.Dashboard = function(servers, passive, elementId) {
    if( servers ) {
        this.servers = servers;

        if(passive != null)
            this.passiveMode = passive;

        if( elementId ) {
            this.targetNodeId = elementId;
        }

        if(!this.isReady()) {
            this.checkServers();
        }
    }

    // Events setup
    this.eventListeners = {};

/*
// Properties with getters & setters
*/
    
    var that = this;

    // make this automated with the supported Events list
    Object.defineProperty(this, 'onready', {
        get: function() {
                return function(event) {
                    event = event && event.type == "ready" ? event : 
                        new CustomEvent('ready',{'cancelable':true,'detail':{'length':that.totalCount,'ready':that.readyCount}});
                    that.dispatchEvent(event);
                };
            },
        set: function(fn) {
                that.addEventListener('ready',fn);
            }
    });
    
    Object.defineProperty(this, 'onempty', {
        get: function() {
                return function(event) {
                    event = event && event.type == "empty" ? event : new Event('empty');
                    that.dispatchEvent(event);
                };
            },
        set: function(fn) {
                that.addEventListener('empty',fn);
            }
    });

    Object.defineProperty(this, 'onitemready', {
        get: function() {
                return function(event) {
                    if(event && event.type == "itemready")
                        that.dispatchEvent(event);
                };
            },
        set: function(fn) {
                that.addEventListener('itemready',fn);
            }
    });

    var pServers = new Array();
    Object.defineProperty(this, 'servers', {
        set: function(servers) {
                if( typeof servers == "object" && servers.length > 0 ) {
                    that.clearLists();

                    pServers = servers;
                    that.totalCount = 0;
                    pServers.forEach(function(serverList) {
                        this.totalCount += serverList.pages.length;
                    }, that);
                    
                    // check if the lists actually contained pages
                    if( that.totalCount > 0 ) {
                        that.checkServers();

                        if(!that.passiveMode)
                            that.printLists();
                    }
                    else
                    {
                        pServers.length = 0;
                        that.onempty();
                    }
                }
                else {
                    pServers.length = 0;
                    that.onempty();
                }

            },
        get: function() {
                return pServers;
            }
    });

    var elementId = "crowd-dashboard-status-list";
    Object.defineProperty(this, 'targetNodeId', {
        set: function(val) {
                if( typeof val == "string" ) {
                    elementId = val;
                }
            },
        get: function() {
                return elementId;
            }
    });
}

Dashboard.prototype.totalCount = 0;
Dashboard.prototype.readyCount = -1;
Dashboard.prototype.locationConnector = " in ";
Dashboard.prototype.locationURL = "http://maps.google.com/?q=";
Dashboard.prototype.loadingString = "Loading...";
Dashboard.prototype.supportedEvents = ['ready', 'empty', 'itemready'];
Dashboard.prototype.passiveMode = false;

/*
// Methods
*/

// checks the status of all servers.
Dashboard.prototype.checkServers = function() {
    this.readyCount = 0;

    this.servers.forEach(function(serverList) {
        serverList.pages.forEach(function(pageObj) {            
            this.checkServer(pageObj);
        }, this);
    }, this);
};

// eventually use url as ID here too?
Dashboard.prototype.checkServer = function(pageObj) {
    if(pageObj.hasOwnProperty("hasStatusAPI") && pageObj.hasStatusAPI)
        getStatusAPI(pageObj.url, this.addServerToList, pageObj.statusAPI);
    else
        getStatus(pageObj.url, this.addServerToList, pageObj.timeout);

    var that = this;
    function getStatus(url, callback, timeout) {
        timeout = timeout | 5000;
        var img = new Image(),
            done = false;

        img.onload = function() {
            callback.call( that, url, true );
            done=true;
        };
        img.onerror = function(e) {
            //x-origin/no image
            callback.call( that, url, true );
            done=true;
        };

        setTimeout(function() {
            if(!done)
                callback.call( that, url, false );
        }, timeout);

        var rand = (url.indexOf('?')!=-1?'&':'?')+'timestamp='+Date.now();
        img.src = url+rand;
    }
    
    function getStatusAPI(url, callback, statusAPI) {
        var urlObj = {"host":url.match(/:\/\/([a-z0-9\.:].*)/)[1]},
    
        statusAPI = statusAPI || {};

        // set default values
        statusAPI.url = statusAPI.url || 'https://status.' + urlObj.host + '/api/status.json';
        statusAPI.propertyName = statusAPI.propertyName || "status";
        statusAPI.nestedProperty = false
        statusAPI.downValue = statusAPI.downValue || "major";
        
        if(statusAPI.propertyName.indexOf(".") != -1) {
            statusAPI.nestedProperty = true;
            statusAPI.propertyName = statusAPI.propertyName.split(".");
        }
        
        // timestamp to avoid caching
        var rand = (statusAPI.url.indexOf('?')!=-1?'&':'?')+'timestamp='+Date.now(),
            funcName = 'processStatusAPI' + jsizeURL(urlObj.host+rand);
        
        statusAPI.url += rand + '&callback=' + funcName;
        
        var script = document.createElement("script");

        window[funcName] = function(response) {
            document.body.removeChild(script);

            var responseVal, result;
            if(statusAPI.nestedProperty) {
                responseVal = response;
                statusAPI.propertyName.forEach(function(value) {
                    responseVal = responseVal[value];
                });
            }
            else {
                responseVal = response[statusAPI.propertyName];
            }

            result = statusAPI.upValue != null ? responseVal == statusAPI.upValue : responseVal != statusAPI.downValue;
            callback.call( that, url, result );
            delete window[funcName];
        }
            
        script.src = statusAPI.url;
        document.body.appendChild(script);
    }
};

// adds a server to the internal status list and updates markup of the server's list item
Dashboard.prototype.addServerToList = function( url, online ) {
    // make this more efficient. This is currently fully iterating through two dimensions of an array.
    
    var server = this.getServerByURL(url);
    if(server) {
        server.online = online;
        if(this.readyCount == -1)
            this.readyCount = 0;
        this.readyCount++;

        var itemReadyEvent = new CustomEvent('itemready', {'cancelable':true,'detail':server});
        this.onitemready(itemReadyEvent);
        if(!itemReadyEvent.defaultPrevented && !this.passiveMode) {
            this.setListItemStatus(server);
        }

        if(this.isReady()) {
            var e = new CustomEvent('ready',{'cancelable':true,'detail':{'length':this.totalCount}});
            this.onready(e);
        }
    }
};

// make this more efficient than O(n*n)
Dashboard.prototype.getServerByURL = function(url) {
    var servObj= false;

    this.servers.forEach(function(serverList) {
        serverList.pages.forEach(function(server) {
            if(server.url == url) {
                servObj = server;
            }            
        }, this);
    }, this);

    return servObj;
};

// checks if all servers have been checked
Dashboard.prototype.isReady = function() {
    return this.totalCount == this.readyCount;
};

// clears the whole object
Dashboard.prototype.clear = function() {
    this.servers.length = 0;
    this.totalCount = 0;
    this.readyCount = -1;

    // not too nice way to do it, but it does the job
    if(!this.passiveMode)
        document.getElementById(this.targetNodeId).innerHTML = '';

    this.onempty();
    this.eventListeners = {};
};

Dashboard.prototype.clearLists = function() {
    // not too nice way to do it, but it does the job
    if(!this.passiveMode)
        document.getElementById(this.targetNodeId).innerHTML = this.loadingString;
};

// outputs the markup list
Dashboard.prototype.printLists = function() {
    var root = document.getElementById(this.targetNodeId);
    var heading, list, item, link;

    // clear root node
    root.innerHTML = '';

    this.servers.forEach(function(serverList) {
        heading = document.createElement('h2');
        heading.classList.add('dashboard-title');
        heading.appendChild(document.createTextNode(serverList.name));

        list = document.createElement('ul');
        list.classList.add('dashboard-list');

        if(serverList.withLocations)
            list.classList.add('dashboard-with-locations');

        serverList.pages.forEach(function(page,i) {
            item = document.createElement('li');

            link = document.createElement('a');
            link.href = page.url;
            link.appendChild(document.createTextNode(page.name));
            item.appendChild(link);

            if(serverList.withLocations) {
                item.appendChild(document.createTextNode(this.locationConnector));
                link = document.createElement('a');
                link.classList.add('dashboard-location');
                link.href = this.locationURL + page.location;
                link.appendChild(document.createTextNode(page.location));
                item.appendChild(link);
            }

            item.id = 'dashboard-item-'+jsizeURL(page.url);

            list.appendChild(item);
        }, this);
        root.appendChild(heading);
        root.appendChild(list);
    }, this);
};

// Updates a server's list item status (online/offline)
Dashboard.prototype.setListItemStatus = function(server) {
    var listItem = document.getElementById('dashboard-item-'+jsizeURL(server.url));

    if(server.online && !listItem.classList.contains('online')) {
        listItem.classList.add('online');
        listItem.classList.remove('offline');
    }
    else if(!server.online && !listItem.classList.contains('offline')) {
        listItem.classList.add('offline');
        listItem.classList.remove('online');
    }
};

/**
 *  Simple event listener/sender pattern
 *  this does not support propagation control (bubbling/preventingDefault etc.)
 */

Dashboard.prototype.eventListeners = {};

Dashboard.prototype.addEventListener = function(type, fn) {
    // construct the array for this eventtype, if it's not yet existing.
    if( !this.eventListeners[type] )
        this.eventListeners[type] = new Array();

    this.eventListeners[type].push(fn);
};

Dashboard.prototype.removeEventListener = function(type, fn) {
    for(var listener in this.eventListeners[type]) {
        if( this.eventListeners[type][listener] == fn )
            this.eventListeners[type].splice(listener,1);
    }
    
    // delete the eventtype property if there are no more listeners.
    if( this.eventListeners[type].length == 0 ) {
        delete this.eventListeners[type];
    }
};

Dashboard.prototype.dispatchEvent = function(d_eventObject) {
    if( this.eventListeners[d_eventObject.type] && this.eventListeners[d_eventObject.type].length > 0 ) {
        this.eventListeners[d_eventObject.type].forEach(function(listener) {
            listener(d_eventObject);
        });
    }
};

function jsizeURL(url) {
    return window.btoa(encodeURI(url)).replace(/[\/=]+/g,'');
}

}(this));
