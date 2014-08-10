<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- meta info -->
        <title data-l10n-id="dashboard_title">Nightingale Dashboard</title>
        <?php include "../static.getnightingale.com/php/head.php"; ?>
        <!-- scripts -->
        <script type="application/javascript" src="<?php echo $protocol; ?>static.getnightingale.com/javascript/d3.v3.min.js"></script>
        <script type="application/javascript" src="<?php echo $protocol; ?>static.getnightingale.com/javascript/statGraphs.js"></script>
        
        <!-- status dashboard scripts -->
        <script type="application/javascript" src="<?php echo $protocol; ?>static.getnightingale.com/javascript/crowd-dashboard.js"></script>
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <section class="twocolumns">
                    <h1 data-l10n-id="dashboard_stats_title">Statistics</h1>
                    <h2 data-l10n-id="dashboard_stats_installs_title">Installations &amp; Upgrades</h2>
                    <svg id="installsGraph" class="linegraph"></svg>
                    <h2 data-l10n-id="dashboard_stats_version_title">Version</h2>
                    <svg id="versionGraph" class="linegraph"></svg>
                    <section class="bottom">
                        <h2 data-l10n-id="dashboard_stats_current_title">Current Version</h2>
                        <div class="clearfix">
                            <figure class="column">
                                <svg id="osPie" class="piegraph"></svg>
                            </figure>
                            <figure class="column">
                                <svg id="installPie" class="piegraph"></svg>
                            </figure>
                        </div>
                        <p id="totalCount" data-l10n-id="dashboard_stats_current_loading">Loading Total Profiles Count...</p>
                    </section>
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
