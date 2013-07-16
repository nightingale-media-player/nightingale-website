<?php    
    $download['windowsInstaller']['url'] = ''; // download url
    $download['windowsInstaller']['img'] = '../static.getnightingale.com/images/wine.png'; // symbolicon
    $download['windowsInstaller']['osname'] = 'Windows Installer';
    $download['windowsInstaller']['arch'] = 32;
    $download['windowsInstaller']['package'] = '.exe'; // orange package info
    $download['windowsInstaller']['popup'] = false;
    
    $download['windows']['url'] = '';
    $download['windows']['img'] = '../static.getnightingale.com/images/wine.png';
    $download['windows']['osname'] = 'Windows';
    $download['windows']['arch'] = 32;
    $download['windows']['package'] = '.zip';
    $download['windows']['popup'] = false;
    
    $download['mac']['url'] = '';
    $download['mac']['img'] = '../static.getnightingale.com/images/dmg.png';
    $download['mac']['osname'] = 'Mac OS X';
    $download['mac']['arch'] = 32;
    $download['mac']['package'] = '.dmg';
    $download['mac']['popup'] = false;
    
    $download['ubuntu']['url'] = '';
    $download['ubuntu']['img'] = '../static.getnightingale.com/images/start-here-ubuntuoriginal.png';
    $download['ubuntu']['osname'] = 'Ubuntu';
    $download['ubuntu']['arch'] = getArch();
    $download['ubuntu']['package'] = 'PPA';
    $download['ubuntu']['popup'] = true;
    
    $download['linux32']['url'] = '';
    $download['linux32']['img'] = '../static.getnightingale.com/images/package-x-generic.png';
    $download['linux32']['osname'] = 'Linux';
    $download['linux32']['arch'] = 32;
    $download['linux32']['package'] = '.tar.bz2';
    $download['linux32']['popup'] = false;
    
    $download['linux64']['url'] = '';
    $download['linux64']['img'] = '../static.getnightingale.com/images/package-x-generic.png';
    $download['linux64']['osname'] = 'Linux';
    $download['linux64']['arch'] = 64;
    $download['linux64']['package'] = '.tar.bz2';
    $download['linux64']['popup'] = false;
    
    $tarball = 'git://github.com/nightingale-media-player/nightingale-hacking.git';
    
    function getArch() {
        $arch = 32;
        if(preg_match('/x86_64|amd64/i', $_SERVER['HTTP_USER_AGENT']))
            $arch = 64;
        return $arch;
    }
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
        
        <link rel="stylesheet" href="../static.getnightingale.com/css/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="css/legacy-ie.css">
            <script src="javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- l10n -->
        <script src="../static.getnightingale.com/javascript/l10n.js"></script>
        <link rel="prefetch" type="application/l10n" href="../static.getnightingale.com/l10n/locales.ini" >
        
    </head>
    <body>
        <div  id="instructions">
            <section>
                <ol type="1">
                    <li data-l10n-id="ubuntuFirstStep">Open a terminal window</li>
                    <li><span data-l10n-id="ubuntuSecondStep">Type</span> <code>sudo add-apt-repository ppa:nightingaleteam/nightingale-nightly</code></li>
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
                    <img src="../static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo">
                </figure>
            </header>
        </div>
        <div class="wrapper" id="wrapper">
            <article id="main" class="container" role="main">
                <p data-l10n-id="nightliesText">We automatically build the latest version of our source. Since those are development versions, we don't take any liability for possible damage. If you run into an issue, please <a href="https://github.com/nightingale-media-player/nightingale-addons/issues/">report it</a> to us! We don't have a Nightly update channel, so the version you download here will only upgrade to the next major release.</p>
                <ul id="downloadlist">
                    <?php foreach($download as $os => $properties) {
                            echo '
                                <li '.($properties['popup'] ? 'data-popup':'data-url="'.$properties['url'].'"').' class="download">
                                    <img src="'.$properties['img'].'" alt="'.$properties['osname'].' Icon"> <span class="os">'.$properties['osname'].' ('.$properties['arch'].'-bit)</span> <span class="package">'.$properties['package'].'</span>
                                </li>
                            ';
                          }
                    ?>
                    <section class="clear">
                        <h2 data-l10n-id="compile">Compile Nightingale</h2>
                        <p data-l10n-id="compilingInstructions" data-l10n-args='{"tarball":"<?php echo $tarball;?>"}'>You can compile Nightingale for yourself. You will require our <a href="git://github.com/nightingale-media-player/nightingale-hacking.git">Source</a> and everything else is conviniently explained for each plattform in the <a href="http://wiki.getnightingale.com/doku.php?id=build">"Build" wiki article</a>.</p>
                    </section>
                </ul>
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
        
        <script type="text/javascript" src="../static.getnightingale.com/javascript/base.js"></script>
    </body>
</html>