<?php
    $name = 'Nightingale';
    $title = 'The tune of life, the tune of yours';
    $description = 'Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.';
    
    
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
    <head lang="en">
        <!-- meta info -->
        <meta charset="utf-8">
        <title><?php echo $name.' - '.$title;?></title>
        <meta name="description" content="<?php echo $description; ?>">
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/style.css">
        <!--[if lt IE 9]>
            <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
            <link rel="stylesheet" href="css/legacy-ie.css">
            <script src="javascript/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <div  id="instructions">
            <section>
                <ol type="1">
                    <li>Open a terminal window</li>
                    <li>Type <code>sudo add-apt-repository ppa:nightingaleteam/nightingale-release</code></li>
                    <li>Then <code>sudo apt-get update</code></li>
                    <li>And finally <code>sudo apt-get install nightingale</code></li>
                </ol>
            </section>
        </div>
        <div id="overlay">
        </div>
        <div id="ngalemainheadwrapper" class="wrapper">
            <header class="container">
                <nav role="navigation">
                    <button class="mobilenav" id="expandngalenav">Navigation</button>
                    <ul id="ngalenavlist">
                        <li class="current"><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Add-ons</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Wiki</a></li>
                        <li><a href="#">Developers</a></li>
                    </ul>
                </nav>
                <figure id="headerlogo" role="banner">
                    <div id="tabshadow" class="tab"></div>
                    <div id="birdtab" class="tab"></div>
                    <img src="images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours">
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
                            <div>Download Nightingale<br>
                                <small><?php echo $download[$osstring]['arch']; ?>-bit | <?php echo $download[$osstring]['osname']; ?> <?php echo $download[$osstring]['package']; ?></small>
                            </div>
                        </button>
                        <a href="#" id="moredownloadslink">Other platforms and architectures</a>
                    </div>
                    <div id="description">
                        <?php echo $description; ?>
                    </div>
                </div>
                <aside>
                    <figure class="feature">
                        <img src="http://lorempixel.com/400/400">
                        <figcaption>Lorem ipsum</figcaption>
                    </figure>
                    <figure class="feature">
                        <img src="http://lorempixel.com/404/404">
                        <figcaption>Lorem ipsum</figcaption>
                    </figure>
                    <figure class="feature">
                        <img src="http://lorempixel.com/401/401">
                        <figcaption>Lorem ipsum</figcaption>
                    </figure>
                </aside>
            </article>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <footer class="container">
                <section id="footerinfo" role="contentinfo">
                    <img id="footergale" alt="white outlined nightingale project logo" src="images/footergale.png">
                    <p>Nightingale is free!<br>
                       It is an Open Source projcet release under the terms of the GNU General Public License vX (GPL cX).<br>
                       For more deails, please read the <a href="">license information</a>.
                    </p>
                </section>
                <nav class="footerlinks">
                    <b>Support</b>
                    <ul>
                        <li><a href="http://forum.getnightingale.com" title="Nightingale Forum">Community Forum</a></li>
                        <li><a href="http://blog.getnightingale.com" title="Development Blog">Official Blog</a></li>
                        <li><a href="http://addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
                        <li><a href="http://wiki.getnightingale.com" title="Nightingale Wiki">Wiki</a></li>
                        <li><a href="http://forum.getnightingale.com/forum-13.html" title="Help" id="forumhelplink">Help Forum</a></li>
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b>Contribute</b>
                    <ul>
                        <li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Developers Center</a></li>
                        <li><a href="http://wiki.getnightingale.com/doku.php?id=ngale-locales" title="Translate Nightingale">Translate Nightingale</a></li>
                        <li><a href="https://github.com/nightingale-media-player" title="GitHub">Source Code</a></li>
                        <li><a href="http://bugs.getnightingale.com" title="Bugzilla">Report a Bug</a></li>
                        <li><a href="http://getnightingale.com/donate" title="donate to Nightingale">Donate</a></li>
                    </ul>
                </nav>
                <nav class="footerlinks">
                    <b>Ressources</b>
                    <ul>
                        <li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Download Nightingale</a></li>
                        <li><a href="http://wiki.getnightingale.com/doku.php?id=ngale-locales" title="Translate Nightingale">Features</a></li>
                        <li><a href="https://github.com/nightingale-media-player" title="GitHub">Nightlies</a></li>
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