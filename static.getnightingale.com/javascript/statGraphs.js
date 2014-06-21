"use strict";

var statusDashboard, travisStatus;

window.onload = function() {
    function loadDataForDashboard(fileURL,dashboard) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 && xhr.status != 0 && xhr.status < 400 )
                dashboard.servers = JSON.parse(xhr.response);
            else
                dashboard.servers = [];
        };

        xhr.open('GET',fileURL);
        xhr.send();
    }

    statusDashboard = new Dashboard();
    statusDashboard.setListAttributes(null, 'Checking Statuses...', '//openstreetmap.org/?query=');
    loadDataForDashboard("//static.getnightingale.com/javascript/servers.json",statusDashboard);

    travisStatus = new Dashboard();
    travisStatus.loadingString = statusDashboard.loadingString;
    travisStatus.targetNodeId = "travis-build-status-list";
    loadDataForDashboard("//static.getnightingale.com/javascript/travis.json",travisStatus);

    d3.json('//dashboard.getnightingale.com/get_json.php?type=osDistribution', function(error, data) {
        if(!error) {
            var svg = d3.select("#osPie");

            setupPie(svg);
            drawPie(svg,data,'label');
        }
    });
    d3.json('//dashboard.getnightingale.com/get_json.php?type=versionInfo', function(error, data) {
        if(!error) {
            var svg = d3.select("#installPie");

            setupPie(svg);
            drawPie(svg,data.versionPie,'name');
            d3.select("#totalCount").datum(data).text(countText);
        }
    });

    d3.json('//dashboard.getnightingale.com/get_json.php?type=versionGraph', function(error, data){
        if(!error) {
            var svg = d3.select("#versionGraph");

            setupLineGraph(svg);
            drawLineGraph(svg,sortVersionGraphData(data));
        }
    });
    d3.json('//dashboard.getnightingale.com/get_json.php?type=installsGraph', function(error, data){
        if(!error) {
            var svg = d3.select("#installsGraph");

            setupLineGraph(svg);
            drawLineGraph(svg,sortInstallsGraphData(data));
        }
    });

    window.setInterval(refresh,'180000');

    // make sure the language gets adjusted everywhere when it changes
    addEventListenerLegacy(document, "localized", function() {
        statusDashboard.loadingString = document.webL10n.get('dashboard_status_loading',null,'Checking Statuses...');
        travisStatus.loadingString = statusDashboard.loadingString;
        statusDashboard.locationConnector = ' '+document.webL10n.get('dashboard_status_locationConnector',null,'in')+' ';
        refresh();
    }, false);
};

function refresh() {
    statusDashboard.checkServers();
    travisStatus.checkServers();

    d3.json('//dashboard.getnightingale.com/get_json.php?type=osDistribution&lang='+document.webL10n.getLanguage(), function(error, data) {
        if(!error)
            drawPie(d3.select("#osPie"),data,'label');
    });
    d3.json('//dashboard.getnightingale.com/get_json.php?type=versionInfo&lang='+document.webL10n.getLanguage(), function(error, data) {
        if(!error) {
            drawPie(d3.select("#installPie"),data.versionPie,'name');
            d3.select("#totalCount").datum(data).text(countText);
        }
    });
    d3.json('//dashboard.getnightingale.com/get_json.php?type=versionGraph&lang='+document.webL10n.getLanguage(), function(error, data){
        if(!error)
            drawLineGraph(d3.select("#versionGraph"),sortVersionGraphData(data));
    });
    d3.json('//dashboard.getnightingale.com/get_json.php?type=installsGraph&lang='+document.webL10n.getLanguage(), function(error, data){
        if(!error)
            drawLineGraph(d3.select("#installsGraph"),sortInstallsGraphData(data));
    });
}

// graph drawing functions for dashboard
// requires d3

//d3 pie
var radius = 120;

var pie = d3.layout.pie()
    .value(function(d,i) {
        return d.nb_visits; 
    })
    .sort(null);

var color = d3.scale.category20();

var arc = d3.svg.arc().outerRadius(120).innerRadius(0);

// d3 line chart
var margin = {top: 20, right: 50, bottom: 30, left: 50},
    width = 703 - margin.left - margin.right,
    height = 320 - margin.top - margin.bottom;

var parseDate = d3.time.format("%Y-%m-%d").parse;

function countText(d) {
    return document.webL10n.get(
        'dashboard_stats_current_count',
        {"version":d.version,"totalProfiles":d.totalProfiles},
        'Total Profiles on {{version}}: {{totalProfiles}}'
     );
}

function setupPie(svg) {
    svg.append("g")
        .attr("transform", "translate(" + radius + "," + radius + ")");
}

function drawPie(svg, data, labelAttr) {                
    var g = svg.select("g").selectAll(".arc")
        .data(pie(data))
        .enter().append("g")
            .attr("class","arc");
    
    
    g.append("path")
        .attr("fill", function(d,i) { return color(i);})
        .attr("d", arc);
    
    g.append("text")
        .style("text-anchor", "middle")
        .attr("transform", function(d) {return "translate(" +arc.centroid(d) +")";})
        .text(function(d) { return d.data[labelAttr] + " ("+Math.round(50*Math.abs(d.endAngle-d.startAngle)/Math.PI)+"%)";});
}

function setupLineGraph(svg) {                    
    svg.append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")");
        
    svg.append("g")
        .attr("class", "y axis")
        .attr("transform","translate("+(width)+",0)")
        .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", -6)
            .style("text-anchor", "end")
            .text("Visits");
}

function drawLineGraph(svg, data) {
    var {datasets, dates, graphData} = data;
    
    var x = d3.time.scale()
        .range([0, width]);

    var y = d3.scale.linear()
        .range([height, 0]);
    
    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom")
        .ticks(d3.time.week);
    
    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("right");
    
    var line = d3.svg.line()
        .interpolate("basis")
        .x(function(d) { return x(d.date); })
        .y(function(d) { return y(d.visits); });
    
    x.domain(d3.extent(dates,function(d) { return d;}));
    y.domain([0, d3.max(graphData, function(d) { return d3.max(d.values, function(v){ return v.visits; }); })]);
    
    var col = d3.scale.category10();
    col.domain(datasets);
    
    svg.select(".x.axis").call(xAxis);
    svg.select(".y.axis").call(yAxis);
    
    var lines = svg.selectAll(".dataset")
        .data(graphData)
        .enter().append("g")
            .attr("class","dataset");
    
    lines.append("path")
        .attr("class", "line")
        .attr("d", function(d) { return line(d.values);})
        .style("stroke", function(d) { return col(d.dataset);});
    
    // legend
    var legend = svg.selectAll(".legendEntries")
        .data(datasets)
        .enter().append("g")
            .attr("class","legendEntries");
    

    legend.append("svg:rect")
        .attr("fill",function(d) {return col(d);})
        .attr("x", 0)
        .attr("y",function(d,i) { return margin.top + (i-1) * 17 + 5;} )
        .attr("height",12)
        .attr("width",12);
    legend.append("svg:text")
        .attr("x", 15)
        .attr("y", function(d,i) {return margin.top + i * 17;})
        .text(function(d) {return d;});
}

function sortVersionGraphData(data) {
    var versions = [], dates = [], sortedData = [];
    for(var date in data) {
        dates.push(parseDate(date));
        sortedData.push({date:dates[dates.length-1]});
        data[date].forEach(function(deta) {
            if(versions.indexOf(deta.label) == -1)
                versions.push(deta.label);
            
            sortedData[sortedData.length-1][deta.label] = deta.nb_visits;
        });
    }
    
    var graphData = versions.map(function(version) {
       return {
           dataset: version,
           values: sortedData.map(function(d) {
               return {date: d.date, visits: d[version]!=null?d[version]:0};
           })
       };
    });
    
    return {datasets:versions, dates:dates, graphData:graphData};
}
    
function sortInstallsGraphData(data) {
    var datasets = ["installs","updates","downloads"], dates = [], graphData = [];
    
    dates = d3.keys(data.installs).map(function(date) {return parseDate(date);});
    
    var entries = {};
    entries.installs = d3.entries(data.installs);
    entries.updates  = d3.entries(data.updates);
    entries.downloads= d3.entries(data.downloads);
    
    graphData = datasets.map(function(set) {
       return {
           dataset: set,
           values: entries[set].map(function(d) {
               return {date: parseDate(d.key), visits: d.value};
           })
       };
    });
    
    return {datasets:datasets, dates:dates, graphData:graphData};
}
