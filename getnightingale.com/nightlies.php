<?php
    include_once "../static.getnightingale.com/php/env.php";
    $download['windows']['url'] = ''; // download url
    $download['windows']['img'] = $protocol.'static.getnightingale.com/images/wine.png'; // symbolicon
    $download['windows']['osname'] = 'Windows Installer';
    $download['windows']['arch'] = 32;
    $download['windows']['package'] = '.exe'; // orange package info
    $download['windows']['popup'] = false;
    
    $download['windowspackage']['url'] = '';
    $download['windowspackage']['img'] = $protocol.'static.getnightingale.com/images/wine.png';
    $download['windowspackage']['osname'] = 'Windows';
    $download['windowspackage']['arch'] = 32;
    $download['windowspackage']['package'] = '.zip';
    $download['windowspackage']['popup'] = false;
    
    $download['mac']['url'] = '';
    $download['mac']['img'] = $protocol.'static.getnightingale.com/images/dmg.png';
    $download['mac']['osname'] = 'Mac OS X';
    $download['mac']['arch'] = 32;
    $download['mac']['package'] = '.dmg';
    $download['mac']['popup'] = false;
    
    $download['ubuntu']['url'] = '';
    $download['ubuntu']['img'] = $protocol.'static.getnightingale.com/images/start-here-ubuntuoriginal.png';
    $download['ubuntu']['osname'] = 'Ubuntu';
    $download['ubuntu']['arch'] = getArch();
    $download['ubuntu']['package'] = 'PPA';
    $download['ubuntu']['popup'] = true;
    $download['ubuntu']['popupPackageName'] = 'nightingale';
        
    $download['arch']['url'] = 'https://aur.archlinux.org/packages/nightingale-git/';
    $download['arch']['img'] = $protocol.'static.getnightingale.com/images/package-x-generic.png';
    $download['arch']['osname'] = 'Archlinux';
    $download['arch']['arch'] = 32;
    $download['arch']['package'] = 'PKGBUILD';
    $download['arch']['popup'] = false;

    $download['linux32']['url'] = '';
    $download['linux32']['img'] = $protocol.'static.getnightingale.com/images/package-x-generic.png';
    $download['linux32']['osname'] = 'Linux';
    $download['linux32']['arch'] = 32;
    $download['linux32']['package'] = '.tar.bz2';
    $download['linux32']['popup'] = false;
    
    $download['linux64']['url'] = '';
    $download['linux64']['img'] = $protocol.'static.getnightingale.com/images/package-x-generic.png';
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
        <title data-l10n-id="nightlies_title">Nightingale Nightlies</title>
        <?php include "../static.getnightingale.com/php/head.php"; ?>        
    </head>
    <body>
        <div id="instructions">
            <section>
                <ol type="1">
                    <li data-l10n-id="ubuntu_firstStep">Open a terminal window</li>
                    <li><span data-l10n-id="ubuntu_secondStep_pre">Type</span> <code>sudo add-apt-repository ppa:nightingaleteam/nightingale-nightly</code> <span data-l10n-id="ubuntu_secondStep_post"></span></li>
                    <li><span data-l10n-id="ubuntu_thirdStep_pre">Then</span> <code>sudo apt-get update</code> <span data-l10n-id="ubuntu_thirdStep_post"></span></span></li>
                    <li><span data-l10n-id="ubuntu_fourthStep_pre">And finally</span> <a href="apt://nightingale"><code id="ubuntuInstallCode" data-l10n-id="ubuntu_fourthStep_code" data-l10n-args='{"name":"nightingale"}'>sudo apt-get install nightingale</code></a> <span data-l10n-id="ubuntu_fourthStep_post"></span></li>
                </ol>
            </section>
        </div>
        <div id="overlay">
        </div>
        <div id="ngalemainheadwrapper" class="wrapper">
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <h1 data-l10n-id="nightlies_title">Nightingale Nightlies</h1>
                <p data-l10n-id="nightlies_description">We automatically build the latest version of our source. Since those are development versions, we don't take any liability for possible damage. If you run into an issue, please <a href="https://github.com/nightingale-media-player/nightingale-addons/issues/">report it</a> to us! We don't have a Nightly update channel, so the version you download here will only upgrade to the next major release.</p>
                <ul id="downloadlist" class="plainlist">
                    <?php foreach($download as $os => $properties) {
                            echo '
                                <li '.($properties['popup'] ? 'data-popup data-popup-name="'.$properties['popupPackageName'].'"':'data-url="'.$properties['url'].'"').' class="download split">
                                    <a class="piwik_download" href="'.($properties['popup'] ? '#'.$properties['popupPackageName'].'"':$properties['url']).'" title="Download Nightingale for '.$properties['osname'].'" data-l10n-id="downloads_item_link" data-l10n-args=\'{"os":"'.$properties['osname'].'"}\'>
                                        <img src="'.$properties['img'].'" alt="'.$properties['osname'].' Icon" data-hdpi> <span class="os">'.$properties['osname'].' ('.$properties['arch'].'-bit)</span> <span class="package" data-l10n-id="downloads_'.$os.'_package">'.$properties['package'].'</span>
                                    </a>
                                </li>
                            ';
                          }
                    ?>
                </ul>
                <section class="clear bottom">
                    <h2 data-l10n-id="compile">Compile Nightingale</h2>
                    <p data-l10n-id="compilingInstructions" data-l10n-args='{"tarball":"<?php echo $tarball;?>"}'>You can compile Nightingale for yourself. You will require our <a href="<?php echo $tarball; ?>">Source</a> and everything else is conviniently explained for each plattform in the <a href="http://wiki.getnightingale.com/doku.php?id=build">"Build" wiki article</a>.</p>
                </section>
            </main>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <?php include "../static.getnightingale.com/php/footer.php"; ?>
        </div>
        <!-- Piwik -->
        <script type="application/javascript">
          var _paq = _paq || [];
          _paq.push(["trackPageView"]);
          _paq.push(["enableLinkTracking"]);

          (function() {
            var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.getnightingale.com/";
            _paq.push(["setTrackerUrl", u+"piwik.php"]);
            _paq.push(["setSiteId", "2"]);
            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="application/javascript";
            g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Piwik Code -->
    </body>
</html>
