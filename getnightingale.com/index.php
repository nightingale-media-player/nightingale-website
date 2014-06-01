<?php    
    include('version.php');
    
    function getOS() {
        $os = 'unknown';
        if(preg_match('/windows/i', $_SERVER['HTTP_USER_AGENT']))
            $os = 'windows';
        elseif(preg_match('/macintosh|mac os x/i', $_SERVER['HTTP_USER_AGENT']))
            $os = 'mac';
        elseif(preg_match('/ubuntu/i', $_SERVER['HTTP_USER_AGENT']))
            $os = 'ubuntu';
        elseif(preg_match('/debian/i', $_SERVER['HTTP_USER_AGENT']))
            $os = 'debian';
        elseif(preg_match('/archlinux/i', $_SERVER['HTTP_USER_AGENT']))
            $os = 'arch';
        elseif(preg_match('/linux/i', $_SERVER['HTTP_USER_AGENT']))
            $os = 'linux'.getArch();
            
        return $os;
    }
    
    $osstring = getOS();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title>Nightingale - The tune of life, the tune of yours</title>
        <meta name="description" content="Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.">
        <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link type="text/css" rel="stylesheet" href="../static.getnightingale.com/css/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="../static.getnightingale.com/css/legacy-ie.css">
            <script src="../static.getnightingale.com/javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- l10n -->
        <script type="text/javascript" src="//static.getnightingale.com/javascript/l10n.js"></script>
        <script type="text/javascript" src="//static.getnightingale.com/javascript/base.js"></script>
        <link rel="prefetch" type="application/l10n" href="//static.getnightingale.com/l10n/locales.ini">
        
    </head> 
    <body>
        <div id="instructions">
            <section>
                <ol type="1">
                    <li data-l10n-id="ubuntu_firstStep">Open a terminal window</li>
                    <li><span data-l10n-id="ubuntu_secondStep_pre">Type</span> <code>sudo add-apt-repository ppa:nightingaleteam/nightingale-release</code> <span data-l10n-id="ubuntu_secondStep_post"></span></li>
                    <li><span data-l10n-id="ubuntu_thirdStep_pre">Then</span> <code>sudo apt-get update</code> <span data-l10n-id="ubuntu_thirdStep_post"></span></span></li>
                    <li><span data-l10n-id="ubuntu_fourthStep_pre">And finally</span> <code id="ubuntuInstallCode" data-l10n-id="ubuntu_fourthStep_code" data-l10n-args='{"name":"nightingale"}'>sudo apt-get install nightingale</code> <span data-l10n-id="ubuntu_fourthStep_post"></span></li>
                </ol>
            </section>
        </div>
        <div id="overlay">
        </div>
        <div id="ngalemainheadwrapper" class="wrapper">
            <header class="container">
                <nav role="navigation">
                    <button class="mobilenav" id="expandngalenav" data-l10n-id="menu">Menu</button>
                    <ul id="ngalenavlist">
                        <li class="current"><a href="//getnightingale.com" data-l10n-id="home">Home</a></li>
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
                    <img src="../static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo" data-hdpi>
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <div id="contentleft" class="twocolumns">
                    <div id="screenshots">
                        <iframe width="702" height="395" src="//www.youtube.com/embed/9Na3CqM6bRg" frameborder="0" allowfullscreen></iframe>
                        <!--<img src="http://lorempixel.com/702/300" class="twocolumnimage">-->
                        <div class="relativecenterwrapper">
                            <div class="realtivecenter">
                                <button id="downloadbutton" class="download" <?php  echo ($download[$osstring]['popup'] ? 'data-popup data-popup-name="'.$download[$osstring]['popupPackageName'].'"':
                                                                                    'data-url="'.$download[$osstring]['url'].'"'); ?>>
                                    <img src="<?php echo $download[$osstring]['img']; ?>"
                                         alt="<?php echo $download[$osstring]['osname']; ?> Icon"
                                         data-l10n-id="main_downloadButton_image"
                                         data-l10n-args='{"osName":"<?php echo $download[$osstring]['osname']; ?>"}'
                                         data-hdpi>
                                    <div><b data-l10n-id="main_downloadButton_label">Download Nightingale</b><br>
                                        <small><?php 
                                            if($osstring!='unknown') {
                                                echo $download[$osstring]['arch'].'-bit | '.$download[$osstring]['osname'].' '.$download[$osstring]['package'];
                                            }
                                            else {
                                                echo $download[$osstring]['osname'];
                                            }
                                        ?></small>
                                    </div>
                                </button>
                                <?php
                                    if($osstring!='unknown')
                                        echo '<br><a href="download" id="moredownloadslink" data-l10n-id="main_otherPlattforms">Other platforms and architectures</a>'; 
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="description" data-l10n-id="main_description">
                        Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.
                    </div>
                </div>
                <aside class="column alt-full">
                    <h2 data-l10n-id="main_asideHeading">Why Nightingale?</h2>
                    <figure class="feature">
                        <img src="http://lorempixel.com/400/400" alt="" data-l10n-id="main_firstFeature_image">
                        <figcaption data-l10n-id="main_firstFeature">Wide variety of supported media formats including <abbr title="MPEG-1/2 Audio Layer III">MP3</abbr>, Ogg, <abbr title="Free Lossless Audio Codec">FLAC</abbr>, <abbr title="Waveform Audio File Format">WAV</abbr> and <a href="features#audio_formats">many more</a>.</figcaption>
                    </figure>
                    <figure class="feature">
                        <img src="http://lorempixel.com/404/404" alt="" data-l10n-id="main_secondFeature_image">
                        <figcaption data-l10n-id="main_secondFeature">Highly customizable user interface due to hundreds of <a href="//addons.getnightingale.com">themes and add-ons</a>.</figcaption>
                    </figure>
                    <figure class="feature">
                        <img src="http://lorempixel.com/401/401" alt="" data-l10n-id="main_thirdFeature_image">
                        <figcaption data-l10n-id="main_thirdFeature">Slick and easy to understand design. the interface stays out of your way while still enabling easy management of big libraries. <!-- link to screenshots --></figcaption>
                    </figure>
                </aside>
            </main>
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
                    <p data-l10n-id="footer_info" data-l10n-args='{"license":"GNU General Public License v2 (GPL v2)"}'>Nightingale is free!<br>
                       It is an Open Source projcet release under the terms of the GNU General Public License v2 (GPL v2).<br>
                       For more details, please read the <a href="//wiki.getnightingale.com/doku.php?id=licensing">license information</a>.
                   </p>
                   <p>
                       <b data-l10n-id="footer_social">Follow us!</b><br>
                       <a href="//www.facebook.com/getnightingale" title="Nightingale on Facebook" class="socialicon" rel="me">f</a>&nbsp;
                       <a href="https://plus.google.com/+Getnightingale" title="Nightingale on Google+" class="socialicon" rel="me">g</a>&nbsp;
                       <a href="//twitter.com/getnightingale" title="Nightingale on Twitter" class="socialicon" rel="me">t</a>
                   </p>
                </section>
                <nav class="footerlinks">
                    <b data-l10n-id="footer_support">Support</b>
                    <ul>
                        <li><a href="//forum.getnightingale.com" title="Nightingale Forum" data-l10n-id="footer_forum">Community Forum</a></li>
                        <li><a href="//blog.getnightingale.com" title="Development Blog" data-l10n-id="footer_blog">Official Blog</a></li>
                        <li><a href="//addons.getnightingale.com" title="Add-ons for Nightingale" data-l10n-id="footer_add-ons">Add-ons</a></li>
                        <li><a href="//wiki.getnightingale.com" title="Nightingale Wiki" data-l10n-id="footer_wiki">Wiki</a></li>
                        <li><a href="//forum.getnightingale.com/forum-13.html" title="Help" id="forumhelplink" data-l10n-id="footer_helpForum">Help Forum</a></li>
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b data-l10n-id="footer_contribute">Contribute</b>
                    <ul>
                        <li><a href="//wiki.getnightingale.com/doku.php?id=developer_center" title="Documentation and Wiki" data-l10n-id="footer_developerCenter">Developer's Center</a></li>
                        <li><a href="//wiki.getnightingale.com/doku.php?id=localization" title="Translate Nightingale" data-l10n-id="footer_translate">Translate Nightingale</a></li>
                        <li><a href="https://github.com/nightingale-media-player" title="Source Code on GitHub" data-l10n-id="footer_source">Source Code</a></li>
                        <li><a href="https://github.com/nightingale-media-player/nightingale-addons/issues/" title="Nightingale Issues on GitHub" data-l10n-id="footer_bugs">Report a Bug</a></li>
                        <!--<li><a href="//getnightingale.com/donate" title="Donate to Nightingale" data-l10n-id="footer_donate">Donate</a></li>-->
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b data-l10n-id="footer_ressources">Ressources</b>
                    <ul>
                        <li><a href="//getnightingale.com/download" title="Download Nightingale" data-l10n-id="footer_download">Download Nightingale</a></li>
                        <li><a href="//getnightingale.com/features" title="Nightingale Features" data-l10n-id="footer_features">Features</a></li>
                        <li><a href="//getnightingale.com/nightlies" title="Nightingale Nightliy Builds" data-l10n-id="footer_nightlies">Nightlies</a></li>
                        <li><a href="//getnightingale.com/branding" title="Nightingale Logo and Screenshots" data-l10n-id="footer_branding">Branding</a></li>
                    </ul>
                </nav>
            </footer>
        </div>
          <!-- Piwik -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(["trackPageView"]);
          _paq.push(["enableLinkTracking"]);

          (function() {
            var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.getnightingale.com/";
            _paq.push(["setTrackerUrl", u+"piwik.php"]);
            _paq.push(["setSiteId", "2"]);
            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
            g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Piwik Code -->
    </body>
</html>
