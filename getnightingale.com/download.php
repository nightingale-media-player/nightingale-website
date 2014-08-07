<?php    
    include('version.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="downloads_title">Download Nightingale</title>
        <?php include "../static.getnightingale.com/php/head.php"; ?>
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
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <h1 data-l10n-id="downloads_title">Download Nightingale</h1>
                <p data-l10n-id="downloads_description" data-l10n-args='{"version":"<?php echo $version; ?> "}'>Nightingale <?php echo $version; ?> is available for multiple platforms. If yours isn't in the list, this doesn't mean, Nightingale isn't available for it. If you compiled Nightingale for an operating system not listed below, let us know in the <a href="http://forum.getnightingale.com">forum</a>!</p>
                <ul class="plainlist downloadlist">
                    <?php foreach($download as $os => $properties) {
                            if($os == $UNKNOWN) // exclude the default option...
                                continue;
                            echo '
                                <li '.($properties['popup'] ? 'data-popup data-popup-name="'.$properties['popupPackageName'].'"':'data-url="'.$properties['url'].'"').' class="download split">
                                    <a class="piwik_download" href="'.($properties['popup'] ? '#'.$properties['popupPackageName'].'"':$properties['url']).'" title="Download Nightingale for '.$properties['osname'].'" data-l10n-id="downloads_item_link" data-l10n-args=\'{"os":"'.$properties['osname'].'"}\'>
                                        <img src="'.$properties['img'].'" alt="'.$properties['osname'].' Icon" data-hdpi> <span class="os">'.$properties['osname'].' ('.$properties['arch'].'-bit)</span> <span class="package">'.$properties['package'].'</span>
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