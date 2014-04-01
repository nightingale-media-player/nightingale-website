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
   StatusCheck helper object
 */
StatusCheck.CORS_WORKAROUND = 0;
StatusCheck.JSONP = 1;
StatusCheck.XHR = 2;
StatusCheck.JSON = 3;


StatusCheck.prototype.url = "";
StatusCheck.prototype.statusAPI = {"propertyName":"status","nestedProperty":false,"downValue":"major"};
StatusCheck.prototype.timeout = 5000;
StatusCheck.prototype.type = StatusCheck.CORS_WORKAROUND;

function StatusCheck(url, type, options) {
    this.url = url;

    if(type != null && typeof type == "number") {
        this.type = type;
        if(options != null) {
            switch(type) {
                case StatusCheck.JSON:
                    this.timeout = options.timeout;
                case StatusCheck.JSONP:
                    this.statusAPI = options;
                    break;
                default:
                    this.timeout = options;
            }
        }
    }

    if(type == StatusCheck.JSONP || type == StatusCheck.JSON) {
        if(options == null) {
            this.statusAPI.url = 'https://status.' + this.url.match(/:\/\/([a-z0-9\.:].*)/)[1] + '/api/status.json';
        }

        if(!this.statusAPI.hasOwnProperty("downValue")) {
            this.statusAPI.downValue = "major";
        }
    
        if(!this.statusAPI.nestedProperty && this.statusAPI.propertyName.indexOf(".") != -1) {
            this.statusAPI.nestedProperty = true;
            this.statusAPI.propertyName = this.statusAPI.propertyName.split(".");
        }            
    }
}

StatusCheck.prototype.getStatus = function(callback, that) {
    switch(this.type) {
        case StatusCheck.JSONP:
            this.JSONPRequest(callback, that);
            break;
        case StatusCheck.XHR:
            this.XHRequest(callback, that);
            break;
        case StatusCheck.JSON:
            this.JSONRequest(callback, that);
            break;
        default:
            this.workaroundRequest(callback, that);
    }
};

StatusCheck.prototype.workaroundRequest = function(callback, that) {
    if(!Image) {
        throw new Error("No Image object in the global scope. Cannot perform CORS workaround status pings");
    }
    var img = new Image(),
        done = false;

    img.onload = function() {
        callback.call( that, this.url, true );
        done=true;
    };
    img.onerror = function(e) {
        //x-origin/no image
        callback.call( that, this.url, true );
        done=true;
    };

    setTimeout(function() {
        if(!done)
            callback.call( that, this.url, false );
    }, this.timeout);

    var rand = (this.url.indexOf('?')!=-1?'&':'?')+'timestamp='+Date.now();
    img.src = this.url+rand;
};

StatusCheck.prototype.JSONPRequest = function(callback, that) {
    if(!global.document) {
        throw new Error("No document element in the global scope");
    }
    
    // timestamp to avoid caching
    var rand = (this.statusAPI.url.indexOf('?')!=-1?'&':'?')+'timestamp='+Date.now(),
        funcName = 'processStatusAPI' + jsizeURL(this.url.match(/:\/\/([a-z0-9\.:].*)/)[1]+rand);
    
    var script = global.document.createElement("script");

    var thut = this;
    global[funcName] = function(response) {
        global.document.body.removeChild(script);

        thut.parseJSONResponse(response, callback, that);

        delete global[funcName];
    }
        
    script.src = this.statusAPI.url + rand + '&callback=' + funcName;
    global.document.body.appendChild(script);
};

StatusCheck.prototype.XHRequest = function(callback, that) {
    if(!XMLHttpRequest) {
        throw new Error("Can't make a request as the XHR object is not available");
    }
    
    var xhr = new XMLHttpRequest(),
        rand = (this.url.indexOf('?')!=-1?'&':'?')+'timestamp='+Date.now(),
        url = this.url;

    xhr.timeout = this.timeout;
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 )
            callback.call( that, url, xhr.status != 0 && xhr.status < 400 );
    };
    xhr.ontimeout = function() {
        callback.call(that, url, false);
    };
    xhr.open('GET', this.url + rand);
    xhr.send();
};

StatusCheck.prototype.JSONRequest = function(callback, that) {
    if(!XMLHttpRequest) {
        throw new Error("Can't make a request as the XHR object is not available");
    }
    
    var xhr = new XMLHttpRequest(),
        rand = (this.statusAPI.url.indexOf('?')!=-1?'&':'?')+'timestamp='+Date.now(),
        thut = this;

    xhr.timeout = this.timeout;
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status != 0 && xhr.status < 400 ) {
            if(xhr.responseType != "json") {
                if(!JSON) {
                    throw new Error("Can't parse JSON");
                }
                xhr.response = JSON.parse(xhr.response);
            }
            thut.parseJSONResponse(xhr.response, callback, that);
        }
    };
    xhr.ontimeout = function() {
        callback.call(that, thut.url, false);
    };
    xhr.open('GET', this.statusAPI.url + rand);
    xhr.send();
};

StatusCheck.prototype.parseJSONResponse = function(response, callback, that) {
    var responseVal, result;
    if(this.statusAPI.nestedProperty) {
        responseVal = response;
        this.statusAPI.propertyName.forEach(function(value) {
            responseVal = responseVal[value];
        });
    }
    else {
        responseVal = response[this.statusAPI.propertyName];
    }

    if(this.statusAPI.upValue != null) {
        if(typeof this.statusAPI.upValue == "string")
            result = this.statusAPI.upValue == responseVal;
        else
            result = this.statusAPI.upValue.some(function(item) {
                return item == responseVal;
            });
    }
    else {
        if(typeof this.statusAPI.downValue == "string")
            result = this.statusAPI.downValue != responseVal;
        else
            result = this.statusAPI.downValue.some(function(item) {
                return item != responseVal;
            });
    }

    callback.call( that, this.url, result );
};


/*
// Constructor
   constructs the dashboard, checks the servers if a server array is passed. The second argument allows the Dashboard to be output to a specific element.
*/
global.Dashboard = function(servers, passive, elementId) {
    // Events setup
    this.eventListeners = new Object();

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

    var pServers = servers || new Array();
    Object.defineProperty(this, 'servers', {
        set: function(servers) {
                if( typeof servers == "object" && servers.length > 0 ) {
                    that.clearLists();

                    pServers = servers;
                    that.totalCount = 0;
                    pServers.forEach(function(serverList) {
                        that.totalCount += serverList.pages.length;
                    }, that);
                    
                    // check if the lists actually contained pages
                    if( that.totalCount > 0 ) {
                        that.checkServers();

                        if(!that.passiveMode)
                            that.printLists();
                    }
                    else
                        that.clear();
                }
                else
                    that.clear();
            },
        get: function() {
                return pServers;
            }
    });

    var pElementId = elementId || "crowd-dashboard-status-list";
    Object.defineProperty(this, 'targetNodeId', {
        set: function(val) {
                if( typeof val == "string" ) {
                    pElementId = val;
                    if(!that.passiveMode)
                        that.printLists();
                }
            },
        get: function() {
                return pElementId;
            }
    });

    var locationConnector = " in ";
    Object.defineProperty(this, 'locationConnector', {
        set: function(val) {
                if( typeof val == "string" ) {
                    locationConnector = val;
                    if(!that.passiveMode && that.servers.length > 0)
                        that.printLists();
                }
            },
        get: function() {
                return locationConnector;
            }
    });

    var locationURL = "http://maps.google.com/?q=";
    Object.defineProperty(this, 'locationURL', {
        set: function(val) {
                if( typeof val == "string" ) {
                    locationURL = val;
                    if(!that.passiveMode && that.servers.length > 0)
                        that.printLists();
                }
            },
        get: function() {
                return locationURL;
            }
    });

    var loadingString = "Loading...";
    Object.defineProperty(this, 'loadingString', {
        set: function(val) {
                if( typeof val == "string" ) {
                    loadingString = val;
                    if(!that.passiveMode && that.servers.length == 0)
                        that.clearLists();
                }
            },
        get: function() {
                return loadingString;
            }
    });

    var passiveMode = passive || global.document == null;
    Object.defineProperty(this, 'passiveMode', {
        set: function(val) {
                if( typeof val == "boolean" && passiveMode != val ) {
                    if(!val && !global.document) {
                        throw new Error("No document element in the global scope");
                    }  

                    passiveMode = val;

                    if(!passiveMode && that.servers.length > 0)
                        that.printLists();
                }
            },
        get: function() {
                return passiveMode;
            }
    });

    if(!passiveMode && document.readyState != "loading")
        this.clearLists();
}

Dashboard.prototype.totalCount = 0;
Dashboard.prototype.readyCount = -1;
Dashboard.prototype.supportedEvents = ['ready', 'empty', 'itemready'];

/*
// Methods
*/

Dashboard.prototype.setListAttributes = function(id, connector, url) {
    // the whole point of this method is to change multiple properties of the
    // list without updating the DOM multiple times.
    var prevVal = this.passiveMode;
    this.passiveMode = false;

    if(id != null)
        this.targetNodeId = id;

    if(connector != null)
        this.locationConnector = connector;

    if(url != null)
        this.locationURL = url;

    this.passiveMode = prevVal;
};

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
    pageObj.ready = false;

    pageObj.type = pageObj.type || "workaround";
    var options = pageObj.type == "workaround" || pageObj.type == "request" ? pageObj.timeout : pageObj.statusAPI;
    var statusObj = new StatusCheck( pageObj.url, this.getStatusCheckType(pageObj.type), options);

    statusObj.getStatus(this.addServerToList, this);
};


Dashboard.prototype.getStatusCheckType = function(string) {
    switch(string) {
        case "JSONP":
            return StatusCheck.JSONP;
        case "request":
            return StatusCheck.XHR;
        case "JSON":
            return StatusCheck.JSON;
        default:
            return StatusCheck.CORS_WORKAROUND;
    }
};

// adds a server to the internal status list and updates markup of the server's list item
Dashboard.prototype.addServerToList = function( url, online ) {
    // make this more efficient. This is currently fully iterating through two dimensions of an array.
    
    var server = this.getServerByURL(url);
    if(server) {
        server.online = online;
        server.ready = true;
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
    if( this.servers.length == 0 ) {
        this.clearLists();
    }
    else {
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

                if(page.ready)
                    item.classList.add(page.online?"online":"offline");

                item.id = 'dashboard-item-'+jsizeURL(page.url);

                list.appendChild(item);
            }, this);
            root.appendChild(heading);
            root.appendChild(list);
        }, this);
    }
};

// Updates a server's list item status (online/offline)
Dashboard.prototype.setListItemStatus = function(server) {
    if( this.servers.length > 0 && !this.passiveMode ) {
        var listItem = document.getElementById('dashboard-item-'+jsizeURL(server.url));
        
        if(!listItem)
            this.printLists();

        if(server.online && !listItem.classList.contains('online')) {
            listItem.classList.add('online');
            listItem.classList.remove('offline');
        }
        else if(!server.online && !listItem.classList.contains('offline')) {
            listItem.classList.add('offline');
            listItem.classList.remove('online');
        }
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
    return global.btoa(encodeURI(url)).replace(/[\/=]+/g,'');
}

}(this));
