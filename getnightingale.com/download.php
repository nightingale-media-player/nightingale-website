<?php    
    include('version.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="downloads_title">Download Nightingale</title>
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
        <script type="application/javascript" src="../static.getnightingale.com/javascript/l10n.js"></script>
        <script type="application/javascript" src="../static.getnightingale.com/javascript/base.js"></script>
        <link rel="prefetch" type="application/l10n" href="../static.getnightingale.com/l10n/locales.ini" >
        
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
                <ul class="plainlist">
                    <?php foreach($download as $os => $properties) {
                            if($os == $UNKNOWN) // exclude the default option...
                                continue;
                            echo '
                                <li '.($properties['popup'] ? 'data-popup data-popup-name="'.$properties['popupPackageName'].'"':'data-url="'.$properties['url'].'"').' class="download split">
                                    <a href="'.($properties['popup'] ? '#'.$properties['popupPackageName'].'"':$properties['url']).'" title="Download Nightingale for '.$properties['osname'].'" data-l10n-id="downloads_item_link" data-l10n-args=\'{"os":"'.$properties['osname'].'"}\'>
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
    </body>
</html>