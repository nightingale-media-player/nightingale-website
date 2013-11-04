<?php
    if(array_key_exists('version',$_GET))
    {
        $content = json_decode(file_get_contents($_GET['version'].'.json'));
    }
    else
    {
        echo "I'm not sure how you got here. But please go.";
        die;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="firstrunWelcomeTitle">Welcome to Nightingale!</title>
        <meta name="description" content="Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.">
        <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../static.getnightingale.com/css/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="css/legacy-ie.css">
            <script src="javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- l10n -->
        <script type="text/javascript" src="../static.getnightingale.com/javascript/l10n.js"></script>
        <script type="text/javascript" src="../static.getnightingale.com/javascript/base.js"></script>
        <link rel="prefetch" type="application/l10n" href="../static.getnightingale.com/l10n/locales.ini" >
        
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
                        <li><a href="http://developers.getnightingale.com" data-l10n-id="developers">Developers</a></li>
                    </ul>
                </nav>
                <figure id="headerlogo" role="banner">
                    <div id="tabshadow" class="tab"></div>
                    <div id="birdtab" class="tab"></div>
                    <img src="../static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo" data-hdpi>
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <article id="main" class="container" role="main">
                <h1 data-l10n-id="firstrunWelcomeTitle">Welcome to Nightingale!</h1>
                <p data-l10n-id="firstrunWelcomeMessage" data-l10n-args='{"url":"http://wiki.getnightingale.com/doku.php?id=releases_notes:<?php echo $_GET['version'];?>_release_notes"}'>You have just started the best music player for the first time. We are proud to bring you the unique combination of a web browser and a media player in one programm. Further Nightingale allows you to install Feathers, which let you tweak the appearance, while Add-ons expand the functionality of the programm. For information on whats new in this version, please read the <a href="http://wiki.getnightingale.com/doku.php?id=releases_notes:<?php echo $_GET['version'];?>_release_notes">Release Notes</a>.</p>
                <section class="column">
                    <h2 data-l10n-id="recommendedAddOnsTitle">Recommended Add-ons</h2>
                    <ul><?php
foreach($content->extensions as $extension) {
    echo '<li class="feature">
            <h3>'.$extension->name.' <a data-l10n-id="install" href="'.$extension->url.'" class="normalize">install</a></h3>
            <figure>
                <img src="'.$extension->image.'" alt="'.$extension->name.' Preview" data-hdpi>
                <figcaption>'.$extension->description.'</figcaption>
            </figure>
        </li>';
}
                        ?>
                    </ul>
                </section>
                <section class="column omega">
                <?php
                    if(!array_key_exists('openstage',$_GET))
                        echo '<h2>Coming Soon!</h2>';
                    else {
                        $tracks = '';
                        foreach($content->openstage->tracks as $track) {
                            $tracks .= '<li>'.$track.'</li>
                            ';
                        }
                        echo '
                    <!--Project Open Stage
                         For more information visit http://wiki.getnightingale.com/some.php?get=kitchen:open_stage -->

                    <h2 data-l10n-id="firstrunArtist">Featured Artist</h2>
                    <ul>
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
                            <h3 data-l10n-id="firstrunDiscoverArtists">Discover more Artists</h3>
                            <p>Artists of previous releases. Maybe a list of the last few or just a link to some sort of history page.</p>
                        </li>
                    </ul>';
                    }
                ?>
                </section>
                <section class="column">
                <?php
                    if(!array_key_exists('type',$_GET)||$_GET['type']!='upgrade')
                    {
                        // for the actual firstrun
                        echo '
                    <h2>Getting Started</h2> <!-- title tbc -->
                    <!-- for more help visit the forum -->
                    <ul>
                        <li class="feature">
                            <h3>Migrate your Songbird profile</h3>
                            <figure>
                                <img src="../static.getnightingale.com/images/songbirdtransition.png" alt="" data-hdpi>
                                <figcaption>Nightingale isn\'t too diffeent from Songbird yet. You can easily migrate your Music, Videos, Playlists and Extensions from Songbird as described in <a href="http://wiki.getnightingale.com/doku.php?id=migrate_from_songbird">this article</a>.</figcaption>
                            </figure>
                        </li>
                        <li class="feature">
                            <h3>Follow our Blog for Updates!</h3>
                            <figure>
                                <img src="http://lorempixel.com/401/401" alt="">
                                <figcaption>Always want to know the latest news of the project? Subscribe to our <a href="http://blog.getnightingale.com">blog</a> or follow us on <a href="http://twitter.com/getnightingale">Twitter</a>, <a href="http://plus.google.com/+Getnightingale">Google+</a> or <a href="http://facebook.com/getnightingale">Facebook</a>.</figcaption>
                            </figure>
                        </li>
                    </ul>';
                    }
                    else
                    {
                        $li = '';
                        foreach($content->changes as $change) {
                            $li .= '<li><a href="http://github.com/nightingale-media-player/nightingale-hacking/issues/'.$change->number.'">#'.$change->number.'</a> '.$change->title.'</li>
                            ';
                        }
                        echo '
                    <h2>What\'s New</h2>
                    <ul>
                        '.$li.'
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
                        <img id="footergale" alt="white outlined nightingale project logo" src="../static.getnightingale.com/images/footergale.png" data-hdpi>
                        <select id="l10nselect">
                            <option selected value="en">English</option>
                        </select>
                    </div>
                    <p data-l10n-id="footerInfo" data-l10n-args='{"license":"GNU General Public License v2 (GPL v2)"}'>Nightingale is free!<br>
                       It is an Open Source projcet release under the terms of the GNU General Public License v2 (GPL v2).<br>
                       For more details, please read the <a href="">license information</a>.
                   </p>
                   <p>
                       <b data-l10n-id="footerSocial">Follow us!</b><br>
                       <a href="http://www.facebook.com/getnightingale" title="Nightingale on Facebook" class="socialicon" rel="me">f</a>&nbsp;
                       <a href="https://plus.google.com/+Getnightingale" title="Nightingale on Google+" class="socialicon" rel="me">g</a>&nbsp;<a href="http://twitter.com/getnightingale" title="Nightingale on Twitter" class="socialicon" rel="me">t</a>
                   </p> 
                </section>
                <nav class="footerlinks">
                    <b data-l10n-id="footerSupport">Support</b>
                    <ul>
                        <li><a href="http://forum.getnightingale.com" title="Nightingale Forum" data-l10n-id="footerForum">Community Forum</a></li>
                        <li><a href="http://blog.getnightingale.com" title="Development Blog" data-l10n-id="footerBlog">Official Blog</a></li>
                        <li><a href="http://addons.getnightingale.com" title="Add-ons for Nightingale" data-l10n-id="footerAdd-ons">Add-ons</a></li>
                        <li><a href="http://wiki.getnightingale.com" title="Nightingale Wiki" data-l10n-id="footerWiki">Wiki</a></li>
                        <li><a href="http://forum.getnightingale.com/forum-13.html" title="Help" id="forumhelplink" data-l10n-id="footerHelpForum">Help Forum</a></li>
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b data-l10n-id="footerContribute">Contribute</b>
                    <ul>
                        <li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki" data-l10n-id="footerDeveloperCenter">Developer's Center</a></li>
                        <li><a href="http://wiki.getnightingale.com/doku.php?id=ngale-locales" title="Translate Nightingale" data-l10n-id="footerTranslate">Translate Nightingale</a></li>
                        <li><a href="https://github.com/nightingale-media-player" title="Source Code on GitHub" data-l10n-id="footerSource">Source Code</a></li>
                        <li><a href="https://github.com/nightingale-media-player/nightingale-addons/issues/" title="Nightingale Issues on GitHub" data-l10n-id="footerBugs">Report a Bug</a></li>
                        <!--<li><a href="http://getnightingale.com/donate" title="Donate to Nightingale" data-l10n-id="footerDonate">Donate</a></li>-->
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b data-l10n-id="footerRessources">Ressources</b>
                    <ul>
                        <li><a href="http://getnightingale.com/download.php" title="Download Nightingale" data-l10n-id="footerDownload">Download Nightingale</a></li>
                        <li><a href="http://getnightingale.com/features.php" title="Nightingale Features" data-l10n-id="footerFeatures">Features</a></li>
                        <li><a href="http://getnightingale.com/nightlies.php" title="Nightingale Nightlies" data-l10n-id="footerNightlies">Nightlies</a></li>
                    </ul>
                </nav>
            </footer>
        </div>
    </body>
</html>