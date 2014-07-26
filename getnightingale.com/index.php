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
        <script type="application/javascript" src="//static.getnightingale.com/javascript/l10n.js"></script>
        <script type="application/javascript" src="//static.getnightingale.com/javascript/base.js"></script>
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
            <?php   $current = "main";
                    include "../static.getnightingale.com/php/header.php"; ?>
        </div>
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
