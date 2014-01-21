<?php
    $version;
    $isNightingale = preg_match('/(Songbird|Nightingale)\/([0-9\.ab]+)/', $_SERVER['HTTP_USER_AGENT'], $matches);
    $version = $matches[2];
    if($isNightingale)
    {
        if(file_exists('version-info/'.$version.'.json'))
            $content = json_decode(file_get_contents('version-info/'.$version.'.json'));
        else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://getnightingale.com/version.php?as=num');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $currentVersion = curl_exec($ch);
            curl_close($ch);
            $content = json_decode(file_get_contents('version-info/'.$currentVersion.'.json'));   
        }
    }
    else
    {
        header( 'Location: http://getnightingale.com' );
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="firstrun_title">Welcome to Nightingale!</title>
        <meta name="description" content="Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.">
        <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="http://static.getnightingale.com/css-new/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="http://static.getnightingale.com/css-new/legacy-ie.css">
            <script src="http://static.getnightingale.com/javascript/html5shiv.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/base.js"></script>
        
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
                        <!-- nonono. <li><a href="http://developers.getnightingale.com" data-l10n-id="developers">Developers</a></li> -->
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
                <h1 data-l10n-id="firstrun_title">Welcome to Nightingale!</h1>
                <p data-l10n-id="firstrun_description">You have just started the best music player for the first time. We are proud to bring you the unique combination of a web browser and a media player in one program. Further Nightingale allows you to install Feathers, which let you tweak the appearance, while Add-ons expand the functionality of the programm. Close this tab to access your library.</p>
                <section class="column">
                    <h2 data-l10n-id="firstrun_recommendedAdd-ons">Recommended Add-ons</h2>
                    <ul class="plainlist"><?php
foreach($content->extensions as $extension) {
    $extensionBaseId = 'firstrun_recommendedAdd-ons_'.$extension->name.'_';
    echo '<li class="feature">
            <h3 data-l10n-id="'.$extensionBaseId.'title">'.$extension->name.'</h3><a data-l10n-id="firstrun_recommendedAdd-ons_install" href="'.$extension->url.'">install</a>
            <figure>
                <img src="'.$extension->image.'" alt="'.$extension->name.' Preview" data-hdpi data-l10n-id="firstrun_recommendedAdd-ons_image" data-l10n-args="{\"name\":\"'.$extension->name.'\"">
                <figcaption data-l10n-id="'.$extensionBaseId.'description">'.$extension->description.'</figcaption>
            </figure>
        </li>';
}
                        ?>
                    </ul>
                </section>
                <section class="column">
                <?php
                    if(!array_key_exists('type',$_GET)||$_GET['type']!='upgrade')
                    {
                        // for the actual firstrun
                        echo '
                    <h2 data-l10n-id="firstrun_gettingStarted">Getting Started</h2>
                    <!-- for more help visit the forum -->
                    <ul class="plainlist">
                        <li class="feature">
                            <h3 data-l10n-id="firstrun_gettingStarted_migration_title">Migrate your old library</h3>
                            <figure>
                                <img src="http://static.getnightingale.com/images/songbirdtransition.png" alt="Songbird to Nightingale" data-hdpi data-l10n-id="firstrun_gettingStarted_migration_image">
                                <figcaption data-l10n-id="firstrun_gettingStarted_migration_description">Nightingale supports migration from lots of players, including Songbird and iTunes. For step by step guides, check out <a href="http://wiki.getnightingale.com/doku.php?id=migration" title="Migration">this article</a>.</figcaption>
                            </figure>
                        </li>
                        <li class="feature">
                            <h3 data-l10n-id="firstrun_gettingStarted_updates_title">Follow our Blog for Updates!</h3>
                            <figure>
                                <img src="http://static.getnightingale.com/images/social.png" alt="Twitter, Facebook and Google+ Logos" data-l10n-id="firstrun_gettingStarted_updates_image">
                                <figcaption data-l10n-id="firstrun_gettingStarted_updates_description">Always want to know the latest news of the project? Subscribe to our <a href="http://blog.getnightingale.com">blog</a> or follow us on <a href="http://twitter.com/getnightingale">Twitter</a>, <a href="http://plus.google.com/+Getnightingale">Google+</a> or <a href="http://facebook.com/getnightingale">Facebook</a>.</figcaption>
                            </figure>
                        </li>
                        <li class="feature">
                            <h3 data-l10n-id="firstrun_gettingStarted_sync_title">Sync your Music Player</h3>
                            <figure>
                                <img src="http://static.getnightingale.com/images/sync.png" alt="Nightingale Folder Sync" data-l10n-id="firstrun_gettingStarted_sync_image">
                                <figcaption data-l10n-id="firstrun_gettingStarted_sync_description">Keep your computer\'s library in sync with you Music Player, be it a mobile phone or an mp3 player. The interface is confusing to you? Nightingale doesn\'t detect your device? Visit <a href="chrome://foldersync/content/manual/en/index.htm"> this page</a> for help.</figcaption>
                            </figure>
                        </li>
                    </ul>';
                    }
                    else
                    {
                        $li = '';
                        foreach($content->changes as $change) {
                            if(isset($change->number)) {
                                $gh = '<a href="http://github.com/nightingale-media-player/nightingale-hacking/issues/'.$change->number.'">#'.$change->number.'</a> ';
                            }
                            else {
                                $gh = '';
                            }
                            $li .= '<li>'.$gh.$change->title.'</li>
                            ';
                        }
                        echo '
                    <h2 data-l10n-id="firstrun_whatsNew">What\'s New</h2>
                    <ul class="plainlist">
                        '.$li.'
                        <li data-l10n-id="firstrun_releaseNotes"  data-l10n-args=\'{"url":"http://wiki.getnightingale.com/doku.php?id=releases_notes:'.$version.'_release_notes"}\'>For the full changelog visit the <a href="http://wiki.getnightingale.com/doku.php?id=releases_notes:'.$version.'_release_notes">Release Notes</a>.</li>
                    </ul>';
                    }
                ?>
                </section>
                <section class="column omega">
                <?php
                    if(!array_key_exists('openstage',$_GET))
                        echo '<h2 data-l10n-id="firstrun_os_soon">Coming Soon!</h2>';
                    else {
                        $tracks = '';
                        foreach($content->openstage->tracks as $track) {
                            $tracks .= '<li>'.$track.'</li>
                            ';
                        }
                        echo '
                    <!--Project Open Stage
                         For more information visit http://wiki.getnightingale.com/some.php?get=kitchen:open_stage -->

                    <h2 data-l10n-id="firstrun_os_artist">Featured Artist</h2>
                    <ul class="plainlist">
                        <li class="feature">
                            <h3>'.$content->openstage->artist.'</h3>
                            <figure>
                                <img src="'.$content->openstage->picture.'" alt="'.$content->openstage->artist.'">
                                <figcaption>'.$content->openstage->bio.'</figcaption>
                            </figure>
                        </li><li class="feature">
                            <h3>'.$content->openstage->album.'</h3>
                            <figure>
                                <img src="'.$content->openstage->cover.'" alt="'.$content->openstage->album.' Cover" class="cover">
                                <figcaption><ol>
                                    '.$tracks.'</ol></figcaption>
                            </figure>
                        </li><li class="feature">
                            <h3 data-l10n-id="firstrun_os_discoverArtists">Discover more Artists</h3>
                            <p>Artists of previous releases. Maybe a list of the last few or just a link to some sort of history page.</p>
                        </li>
                    </ul>';
                    }
                ?>
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
                       It is an Open Source projcet release under the terms of the GNU General Public License v2 (GPL v2).<br>
                       For more details, please read the <a href="">license information</a>.
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
        <!-- Piwik -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(["setCustomVariable",1,"Type","<?php echo $_GET['type'];?>","visit"]);
          _paq.push(["setCustomVariable",2,"Version","<?php echo $version;?>","visit"]);
          _paq.push(["trackPageView"]);
          _paq.push(["enableLinkTracking"]);
        
          (function() {
            var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.getnightingale.com/";
            _paq.push(["setTrackerUrl", u+"piwik.php"]);
            _paq.push(["setSiteId", "1"]);
            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
            g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Piwik Code -->
            </body>
</html>
