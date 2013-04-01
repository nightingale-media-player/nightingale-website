<?php    
    $download['windows']['url'] = ''; // download url
    $download['windows']['img'] = 'images/wine.png'; // symbolicon
    $download['windows']['osname'] = 'Windows';
    $download['windows']['arch'] = 32;
    $download['windows']['package'] = '.exe'; // orange package info
    $download['windows']['popup'] = false;
    
    $download['mac']['url'] = '';
    $download['mac']['img'] = 'images/dmg.png';
    $download['mac']['osname'] = 'Mac OS X';
    $download['mac']['arch'] = 32;
    $download['mac']['package'] = '.dmg';
    $download['mac']['popup'] = false;
    
    $download['ubuntu']['url'] = '';
    $download['ubuntu']['img'] = 'images/start-here-ubuntuoriginal.png';
    $download['ubuntu']['osname'] = 'Ubuntu';
    $download['ubuntu']['arch'] = getArch();
    $download['ubuntu']['package'] = 'PPA';
    $download['ubuntu']['popup'] = true;
    
    $download['debian']['url'] = '';
    $download['debian']['img'] = 'imges/application-x-deb.png';
    $download['debian']['osname'] = 'Debian';
    $download['debian']['arch'] = 32;
    $download['debian']['package'] = '.deb';
    $download['debian']['popup'] = false;
    
    $download['arch']['url'] = 'https://aur.archlinux.org/packages/ni/nightingale-git/nightingale-git.tar.gz';
    $download['arch']['img'] = 'images/application-x-generic.png';
    $download['arch']['osname'] = 'Archlinux';
    $download['arch']['arch'] = 32;
    $download['arch']['package'] = 'PKGBUILD';
    $download['arch']['popup'] = false;
    
    $download['linux32']['url'] = '';
    $download['linux32']['img'] = 'images/application-x-generic.png';
    $download['linux32']['osname'] = 'Linux';
    $download['linux32']['arch'] = 32;
    $download['linux32']['package'] = '.tar.bz2';
    $download['linux32']['popup'] = false;
    
    $download['linux64']['url'] = '';
    $download['linux64']['img'] = 'images/application-x-generic.png';
    $download['linux64']['osname'] = 'Linux';
    $download['linux64']['arch'] = 64;
    $download['linux64']['package'] = '.tar.bz2';
    $download['linux64']['popup'] = false;
    
    $download['unknown']['url'] = '/download.php';
    $download['unknown']['img'] = 'images/application-x-generic.png';
    $download['unknown']['osname'] = 'Unknown';
    $download['unknown']['arch'] = 'unknown';
    $download['unknown']['package'] = '';
    $download['unknown']['popup'] = false;
    
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
    function getArch() {
        $arch = 32;
        if(preg_match('/x86_64|amd64/i', $_SERVER['HTTP_USER_AGENT']))
            $arch = 64;
        return $arch;
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
        
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="css/legacy-ie.css">
            <script src="javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- l10n -->
        <script src="javascript/l10n.js"></script>
        <link rel="resource" type="application/l10n" href="l10n/locales.ini" >
        
    </head>
    <body>
        <div  id="instructions">
            <section>
                <ol type="1">
                    <li data-l10n-id="ubuntuFirstStep">Open a terminal window</li>
                    <li><span data-l10n-id="ubuntuSecondStep">Type</span <code>sudo add-apt-repository ppa:nightingaleteam/nightingale-release</code></li>
                    <li><span data-l10n-id="ubuntuThirdStep">Then</span> <code>sudo apt-get update</code></li>
                    <li><span data-l10n-id="ubuntuFourthStep">And finally</span> <code>sudo apt-get install nightingale</code></li>
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
                        <li class="current"><a href="http://getnightingale.com" data-l10n-id="home">Home</a></li>
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
                    <img src="images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo">
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <article id="main" class="container" role="main">
                <div id="contentleft">
                    <div id="screenshots">
                        <img id="screenshotone" src="http://lorempixel.com/500/300">
                        <img id="screenshottwo" src="http://lorempixel.com/501/301">
                        <button id="downloadbutton" <?php if($download[$osstring]['popup']) echo 'data-popup'; else echo 'data-url="'.$download[$osstring]['url'].'"'; ?>>
                            <img src="<?php echo $download[$osstring]['img']; ?>" alt="<?php echo $download[$osstring]['osname']; ?> Icon">
                            <div><b data-l10n-id="download">Download Nightingale</b><br>
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
                        <?php if($osstring!='unknown') echo '<a href="/download.php" id="moredownloadslink" data-l10n-id="otherPlattforms">Other platforms and architectures</a>'; ?>
                    </div>
                    <div id="description" data-l10n-id="description">
                        Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.
                    </div>
                </div>
                <aside>
                    <h2 data-l10n-id="asideHeading">Why Nightingale?</h2>
                    <figure class="feature">
                        <img src="http://lorempixel.com/400/400" alt="" data-l10n-id="firstFeatureImage">
                        <figcaption data-l10n-id="firstFeature">Wide variety of supported media formats including MP3, Ogg, FLAC, WAV and many more.</figcaption>
                    </figure>
                    <figure class="feature">
                        <img src="http://lorempixel.com/404/404" alt="" data-l10n-id="secondFeatureImage">
                        <figcaption data-l10n-id="secondFeature">Highly customizable user interface due to hundreds of themes and add-ons.</figcaption>
                    </figure>
                    <figure class="feature">
                        <img src="http://lorempixel.com/401/401" alt="" data-l10n-id="thirdFeatureImage">
                        <figcaption data-l10n-id="thirdFeature">Support by an active and very ambitious community.</figcaption>
                    </figure>
                </aside>
            </article>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <footer class="container">
                <section id="footerinfo" role="contentinfo">
                    <div id="leftfooter">
                        <img id="footergale" alt="white outlined nightingale project logo" src="images/footergale.png">
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
                       <a href="http://www.facebook.com/pages/Nightingale/210174055669535" title="Nightingale on Facebook"><img class="socialicon" src="images/facebook.png" alt="Like Nightingale on Facebook"></a><a href="https://plus.google.com/103377471329459083108/posts" title="Nightingale on Google+"><img class="socialicon" src="images/googlep.png" alt="Circle Nightingale on Google+"></a><a href="http://twitter.com/getnightingale" title="Nightingale on Twitter"><img class="socialicon" src="images/twitter.png" alt="Follow @getnightingale on Twitter"></a>
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
        
        <script type="text/javascript">
            window.onload = function() {
                if(document.getElementById("downloadbutton").attributes['data-popup']) {
                    document.getElementById("downloadbutton").addEventListener("click",function() {
                        show("overlay");
                        show("instructions");
                        document.getElementById("overlay").addEventListener("click",hideOverlay);
                        if(!('pointerEvents' in document.body.style))
                            document.getElementById("instructions").addEventListener("click",hideOverlay);
                    });
                }
                else {
                    document.getElementById("downloadbutton").addEventListener("click",function() {
                        document.location = document.getElementById("downloadbutton").attributes['data-url'].value;
                    });
                }
                document.getElementById("expandngalenav").addEventListener("click",toggleNav);
                
                var l10n = document.webL10n;
                
                l10n.ready(function() {
                
                    // add the languages to the dropdown
                    var langs = l10n.getLanguages();
                    var select = document.getElementById('l10nselect'), n;
                    for(var l in langs) {
                        n = document.createElement("option");
                        n.text = l10n.get(langs[l]+'Name');
                        n.value = langs[l];
                        select.appendChild(n);
                    }
                    
                    // set current language
                    select.value = l10n.getLanguage(); // not working with IE<9
                    
                    // chane document language when selection is changed
                    select.onchange = function() {
                        l10n.setLanguage(this.value);
                    };
                });
            };
            
            function hideOverlay() {
                hide("overlay");
                hide("instructions");
                document.getElementById("overlay").removeEventListener("click",hideOverlay);
                if(!('pointerEvents' in document.body.style))
                    document.getElementById("instructions").removeEventListener("click",hideOverlay);
            }
            
            function show(nodeId) {
                document.getElementById(nodeId).style.display = "block";
                document.getElementById(nodeId).style.visibility = "visible";
            }
            
            function hide(nodeId) {
                document.getElementById(nodeId).style.display = "";
                document.getElementById(nodeId).style.visibility = "";
            }
            function toggleNav() {
                if(document.getElementById("ngalenavlist").style.display=="block")
                    hide("ngalenavlist");
                else
                    show("ngalenavlist");
            }
        </script>
    </body>
</html>