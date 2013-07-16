<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="featuresTitle">Nightingale Features</title>
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
                    <img src="../static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo">
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <article id="main" class="container" role="main">
                <h1 data-l10n-id="featuresTitle">Nightingale Features</h1>
                <p>Nightingale is powered by <a href="">XULRunner</a> from Mozilla. XULRunner is a [insert adjectiv] toolkit from Mozilla. Other applications like Thunderbird or Instantbird are also based on XULRunner. the media core of Nightingale uses GStreamer. It allows Nightingale to have a large feature set of playback customization as well as a large selection of supported file formats.</p>
                <section class="fullwidth">
                    <h2>Playback</h2>
                    <section class="twocolumns">
                        <h3>Audio Formats</h3>
                        <p>Thanks to GStreamer Nighitngale can play various different file formats. Including MP3, WAV, AAC, FLAC and many more. Thanks to the GStreamer integration, it's super easy to add GStreamer modules to expand the list even more.</p>
                    </section>
                    <section class="column omega">
                        <h3>Native GStreamer</h3>
                        <p>On Linux systems Nightingale uses the GStreamer of the system. This slims down our package size and enhances compatibility with different operating systems.</p>
                    </section>
                    <section class="column">
                        <h3>Video Playback</h3>
                        <p>Apart from playing audio, Nightingale also masters the playback of common video formats. This makes Nightingale the hub for all your local media files.
                    </section>
                    <section class="twocolumns omega">
                        <h3>Playlists</h3>
                        <img src="../static.getnightingale.com/images/playlists.png" class="columnimage">
                        <p class="column">As every media player, Nightingale has playlists. However there are special playlists in Nightingale: Smart Playlists. They allow you to filter your Library based on any available tag with complex rulesets.
                    </section>
                    <section class="twocolumns">
                        <h3>Equalizer</h3>
                        <img src="../static.getnightingale.com/images/equalizer.png" class="columnimage">
                        <p class="column">Adjust the frequency range of your music with the built-in 10-band equalizer.</p>
                    </section>
                    <section class="column">
                        <h3>Radiostreams</h3>
                        <p>For the internet radio fans: Nightingale can play m3u, pls and other streams. Just click on the link to the file and Nightingale will start playing the Stream.</p>
                    </section>
                    <!-- equalizer, (radio)streams-->
                </section>
                <section class="fullwidth">
                    <h2>Integrated Browser</h2>
                    <section class="column">
                        <h3>Link Grabber</h3>
                        <p>The intgerated browser of Nightingale detects links to media files and lists the files in a pane in the bottom of the window. You can then listen to the file or download it directly into your library.</p>
                    </section>
                    <section class="twocolumns omega">
                        <h3>Tabbed Browsing</h3>
                        <img src="../static.getnightingale.com/images/tabstrip.png">
                        <p>By default you can only see one tab, the Library tab. However you can open an unlimited amount of other tabs to browse the web. Thanks to Gecko being integrated into XULRunner Nightingale has builtin a full featured browser.</p>
                    </section>
                </section>
                <section class="fullwidth">
                    <h2>Synchronization</h2>
                    <p>You can synchronize any volume with Nightingale.</p>
                </section>
                <section class="fullwidth">
                    <h2>Customization</h2>
                    <section class="twocolumns">
                        <h3>Feathers</h3>
                        <p>You don't like the default look of Nightingale? No problem! The builtin Theme system allows you to quickly completely change the layout. Themes are called Feathers - well - because Nightingale is a bird.</p>
                    </section>
                    <section class="column omega">
                        <h3>Add-ons</h3>
                        <p>Similiar to Firefox, Nightingale also supports Add-ons. Extensions add new features to Nightingale or enhance existing ones. There is a big community creating extensions for Nightingale.</p>
                    </section>
                    
                    <section class="column">
                        <h3>SoundCloud Integration</h3>
                        <p>You can optionally install an extension to neatly integrate SoundCloud into Nightingale.</p>
                        <a href="INSTALL">Install SoundCloud</a>
                    </section>
                    <section class="column">
                        <h3>Last.fm Scrobbling</h3>
                        <p>You can optionally install an extension to neatly integrate SoundCloud into Nightingale.</p>
                        <a href="INSTALL">Install Last.fm</a>
                    </section>
                    <section class="column">
                        <h3>ShoutCast Integration</h3>
                        <p>You can optionally install an extension to neatly integrate SoundCloud into Nightingale.</p>
                        <a href="INSTALL">Install ShoutCast</a>
                    </section>
                </section>
            </article>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <footer class="container">
                <section id="footerinfo" role="contentinfo">
                    <div id="leftfooter">
                        <img id="footergale" alt="white outlined nightingale project logo" src="../static.getnightingale.com/images/footergale.png">
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
                       <a href="http://www.facebook.com/pages/Nightingale/210174055669535" title="Nightingale on Facebook" class="socialicon">f</a>&nbsp;<a href="https://plus.google.com/103377471329459083108/posts" title="Nightingale on Google+" class="socialicon">g</a>&nbsp;<a href="http://twitter.com/getnightingale" title="Nightingale on Twitter" class="socialicon">t</a>
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