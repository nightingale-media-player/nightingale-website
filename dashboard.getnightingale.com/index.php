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
        <link rel="stylesheet" type="text/css" href="//static.getnightingale.com/css/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="//static.getnightingale.com/css/legacy-ie.css">
            <script src="//static.getnightingale.com/javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- scripts -->
        <script type="application/javascript" src="//static.getnightingale.com/javascript/base.js"></script>
        <script type="application/javascript" src="//static.getnightingale.com/javascript/d3.v3.min.js"></script>
        <script type="application/javascript" src="//static.getnightingale.com/javascript/statGraphs.js"></script>
        
        <!-- l10n -->
        <script type="application/javascript" src="//static.getnightingale.com/javascript/l10n.js"></script>
        <link rel="prefetch" type="application/l10n" href="//static.getnightingale.com/l10n/locales.ini" >
        
        <!-- status dashboard scripts -->
        <script type="application/javascript" src="//static.getnightingale.com/javascript/crowd-dashboard.js"></script>
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <header class="container">
                <nav role="navigation">
                    <button class="mobilenav" id="expandngalenav" data-l10n-id="menu">Menu</button>
                    <ul id="ngalenavlist">
                        <li><a href="//getnightingale.com" data-l10n-id="home">Home</a></li>
                        <li><a href="//blog.getnightingale.com" data-l10n-id="blog">Blog</a></li>
                        <li><a href="//addons.getnightingale.com" data-l10n-id="add-ons">Add-ons</a></li>
                        <li><a href="//forum.getnightingale.com" data-l10n-id="forum">Forum</a></li>
                        <li><a href="//wiki.getnightingale.com" data-l10n-id="wiki">Wiki</a></li>
                        <li><a href="//developer.getnightingale.com" data-l10n-id="developers">Developers</a></li>
                    </ul>
                </nav>
                <figure id="headerlogo" role="banner">
                    <div id="tabshadow" class="tab"></div>
                    <div id="birdtab" class="tab"></div>
                    <img src="//static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo" data-hdpi>
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <section class="twocolumns"
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
                    <div id="travis-build-status-list" class="plainlist">
                    </div>
                </section>
                <section class="column">
                    <h1 data-l10n-id="dashboard_other_title">Other Analytics</h1>
                    <ul>
                        <li><a href="https://www.facebook.com/getnightingale?sk=insights" data-l10n-id="dashboard_other_facebook">Facebook Insights</a></li>
                        <li><a href="https://github.com/nightingale-media-player/nightingale-hacking/graphs/traffic" data-l10n-id="dashboard_other_github">nightingale-hacking Repository Stats</a></li>
                        <li><a href="//sourceforge.net/projects/ngale/files/stats/timeline" data-l10n-id="dashboard_other_sourceforge">Sourceforge Download Stats</a></li>
                        <li><a href="//humanoids.be/thinkup" data-l10n-id="dashboard_other_thinkup">ThinkUp Social Anayltics</a></li>
                        <li><a href="//stats.getnightingale.com" data-l10n-id="dashboard_other_piwik">Piwik Website Visitor Statistics</a></li>
                    </ul>
                </section>
            </main>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <?php include "../static.getnightingale.com/php/footer.php"; ?>
        </div>
    </body>
</html>
