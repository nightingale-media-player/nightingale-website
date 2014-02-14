<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- meta info -->
        <title data-l10n-id="dashboard_title">Nightingale Dashboard</title>
        <meta name="description" content="Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.">
        <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="http://static.getnightingale.com/css-new/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="http://static.getnightingale.com/css-new/legacy-ie.css">
            <script src="http://static.getnightingale.com/javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- scripts -->
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/base.js"></script>
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/d3.v3.min.js"></script>
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/statGraphs.js"></script>
        
        <!-- l10n -->
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/l10n.js"></script>
        <link rel="prefetch" type="application/l10n" href="http://static.getnightingale.com/l10n/locales.ini" >
        
        <!-- status dashboard scripts -->
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/crowd-dashboard.js"></script>
        <script type="text/javascript">
            "use strict";

            var statusDashboard;
            
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
                statusDashboard.loadingString = 'Checking Statuses...';
                loadDataForDashboard("http://static.getnightingale.com/javascript/servers.json",statusDashboard);
                
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=osDistribution', function(error, data) {
                    if(!error) {
                        var svg = d3.select("#osPie");
                        
                        setupPie(svg);
                        drawPie(svg,data,'label');
                    }
                });
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=versionInfo', function(error, data) {
                    if(!error) {
                        var svg = d3.select("#installPie");
                        
                        setupPie(svg);
                        drawPie(svg,data.versionPie,'name');
                        d3.select("#totalCount").datum(data).text(countText);
                    }
                });
                
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=versionGraph', function(error, data){
                    if(!error) {
                        var svg = d3.select("#versionGraph");
                        
                        setupLineGraph(svg);
                        drawLineGraph(svg,sortVersionGraphData(data));
                    }
                });
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=installsGraph', function(error, data){
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
                    statusDashboard.locationConnector = ' '+document.webL10n.get('dashboard_status_locationConnector',null,'in')+' ';
                    refresh();
                }, false);
            };
            
            function refresh() {
                statusDashboard.checkServers();
                
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=osDistribution&lang='+document.webL10n.getLanguage(), function(error, data) {
                    if(!error)
                        drawPie(d3.select("#osPie"),data,'label');
                });
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=versionInfo&lang='+document.webL10n.getLanguage(), function(error, data) {
                    if(!error) {
                        drawPie(d3.select("#installPie"),data.versionPie,'name');
                        d3.select("#totalCount").datum(data).text(countText);
                    }
                });
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=versionGraph&lang='+document.webL10n.getLanguage(), function(error, data){
                    if(!error)
                        drawLineGraph(d3.select("#versionGraph"),sortVersionGraphData(data));
                });
                d3.json('http://dashboard.getnightingale.com/get_json.php?type=installsGraph&lang='+document.webL10n.getLanguage(), function(error, data){
                    if(!error)
                        drawLineGraph(d3.select("#installsGraph"),sortInstallsGraphData(data));
                });
            }
        </script>
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <header class="container">
                <nav role="navigation">
                    <button class="mobilenav" id="expandngalenav" data-l10n-id="menu">Menu</button>
                    <ul id="ngalenavlist">
                        <li><a href="http://getnightingale.com" data-l10n-id="home">Home</a></li>
                        <li><a href="http://blog.getnightingale.com" data-l10n-id="blog">Blog</a></li>
                        <li><a href="http://addons.getnightingale.com" data-l10n-id="add-ons">Add-ons</a></li>
                        <li><a href="http://forum.getnightingale.com" data-l10n-id="forum">Forum</a></li>
                        <li><a href="http://wiki.getnightingale.com" data-l10n-id="wiki">Wiki</a></li>
                        <!-- no. <li><a href="http://developers.getnightingale.com" data-l10n-id="developers">Developers</a></li>-->
                    </ul>
                </nav>
                <figure id="headerlogo" role="banner">
                    <div id="tabshadow" class="tab"></div>
                    <div id="birdtab" class="tab"></div>
                    <img src="http://static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo" data-hdpi>
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <article id="main" class="container" role="main">
                <section class="twocolumns">
                    <h1 data-l10n-id="dashboard_stats_title">Statistics</h1>
                    <h2 data-l10n-id="dashboard_stats_installs_title">Installations &amp; Upgrades</h2>
                    <svg id="installsGraph" class="linegraph"></svg>
                    <h2 data-l10n-id="dashboard_stats_version_title">Version</h2>
                    <svg id="versionGraph" class="linegraph"></svg>
                    <h2 data-l10n-id="dashboard_stats_current_title">Current Version</h2>
                    <svg id="osPie" class="piegraph"></svg>
                    <svg id="installPie" class="piegraph"></svg>
                    <p id="totalCount" data-l10n-id="dashboard_stats_current_loading">Loading Total Profiles Count...</p>
                </section>
                <section class="column alt-full omega">
                    <h1 data-l10n-id="dashboard_status_title">Services Status</h1>
                    <div id="crowd-dashboard-status-list" class="plainlist">
                    </div>
                </section>
                <section class="column omega">
                    <h1 data-l10n-id="dashboard_unitTests_title">Unit Tests</h1>
                    <a href="https://travis-ci.org/nightingale-media-player/nightingale-hacking" title="Travis CI Buildinfo" data-l10n-id="dashboard_unitTests_link">
                        <img src="https://travis-ci.org/nightingale-media-player/nightingale-hacking.png?branch=sb-trunk-oldxul">
                    </a>
                </section>
                <section class="column">
                    <h1 data-l10n-id="dashboard_other_title">Other Analytics</h1>
                    <ul>
                        <li><a href="https://www.facebook.com/getnightingale?sk=insights" data-l10n-id="dashboard_other_facebook">Facebook Insights</a></li>
                        <li><a href="https://github.com/nightingale-media-player/nightingale-hacking/graphs/traffic" data-l10n-id="dashboard_other_github">nightingale-hacking Repository Stats</a></li>
                        <li><a href="http://sourceforge.net/projects/ngale/files/stats/timeline" data-l10n-id="dashboard_other_sourceforge">Sourceforge Download Stats</a></li>
                        <li><a href="http://humanoids.be/thinkup" data-l10n-id="dashboard_other_thinkup">ThinkUp Social Anayltics</a></li>
                        <li><a href="http://stats.getnightingale.com" data-l10n-id="dashboard_other_piwik">Piwik Website Visitor Statistics</a></li>
                    </ul>
                </section>
            </article>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <footer class="container">
                <section id="footerinfo" role="contentinfo">
                    <div id="leftfooter">
                        <img id="footergale" alt="white outlined nightingale project logo" src="http://static.getnightingale.com/images/footergale.png" data-hdpi>
                        <select id="l10nselect">
                            <option selected value="en">English</option>
                        </select>
                    </div>
                    <p data-l10n-id="footer_info" data-l10n-args='{"license":"GNU General Public License v2 (GPL v2)"}'>Nightingale is free!<br>
                       It is an Open Source project released under the terms of the GNU General Public License v2 (GPL v2).<br>
                       For more details, please read the <a href="http://wiki.getnightingale.com/doku.php?id=licensing">license information</a>.
                   </p>
                   <p>
                       <b data-l10n-id="footer_social">Follow us!</b><br>
                       <a href="http://www.facebook.com/getnightingale" title="Nightingale on Facebook" class="socialicon" rel="me">f</a>&nbsp;
                       <a href="https://plus.google.com/+Getnightingale" title="Nightingale on Google+" class="socialicon" rel="me">g</a>&nbsp;
                       <a href="http://twitter.com/getnightingale" title="Nightingale on Twitter" class="socialicon" rel="me">t</a>
                   </p>
                </section>
                <nav class="footerlinks">
                    <b data-l10n-id="footer_support">Support</b>
                    <ul>
                        <li><a href="http://forum.getnightingale.com" title="Nightingale Forum" data-l10n-id="footer_forum">Community Forum</a></li>
                        <li><a href="http://blog.getnightingale.com" title="Development Blog" data-l10n-id="footer_blog">Official Blog</a></li>
                        <li><a href="http://addons.getnightingale.com" title="Add-ons for Nightingale" data-l10n-id="footer_add-ons">Add-ons</a></li>
                        <li><a href="http://wiki.getnightingale.com" title="Nightingale Wiki" data-l10n-id="footer_wiki">Wiki</a></li>
                        <li><a href="http://forum.getnightingale.com/forum-13.html" title="Help" id="forumhelplink" data-l10n-id="footer_helpForum">Help Forum</a></li>
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b data-l10n-id="footer_contribute">Contribute</b>
                    <ul>
                        <li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki" data-l10n-id="footer_developerCenter">Developer's Center</a></li>
                        <li><a href="http://wiki.getnightingale.com/doku.php?id=ngale-locales" title="Translate Nightingale" data-l10n-id="footer_translate">Translate Nightingale</a></li>
                        <li><a href="https://github.com/nightingale-media-player" title="Source Code on GitHub" data-l10n-id="footer_source">Source Code</a></li>
                        <li><a href="https://github.com/nightingale-media-player/nightingale-addons/issues/" title="Nightingale Issues on GitHub" data-l10n-id="footer_bugs">Report a Bug</a></li>
                        <!--<li><a href="http://getnightingale.com/donate" title="Donate to Nightingale" data-l10n-id="footer_donate">Donate</a></li>-->
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b data-l10n-id="footer_ressources">Ressources</b>
                    <ul>
                        <li><a href="http://getnightingale.com/all-downloads.php" title="Download Nightingale" data-l10n-id="footer_download">Download Nightingale</a></li>
                        <!--<li><a href="http://getnightingale.com/features.php" title="Nightingale Features" data-l10n-id="footer_features">Features</a></li>
                        <li><a href="http://getnightingale.com/nightlies.php" title="Nightingale Nightlies" data-l10n-id="footer_nightlies">Nightlies</a></li>-->
                    </ul>
                </nav>
            </footer>
        </div>
    </body>
</html>
