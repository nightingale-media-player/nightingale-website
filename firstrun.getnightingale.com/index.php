<?php
    $version;
    $isNightingale = preg_match('/(Songbird|Nightingale)\/([0-9\.ab]+)/', $_SERVER['HTTP_USER_AGENT'], $matches);
    $version = $matches[2];
    if($isNightingale)
    {
        if(file_exists('version-info/'.$version.'.json'))
            $content = json_decode(file_get_contents('version-info/'.$version.'.json'));
        else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://getnightingale.com/version.php?as=num');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $currentVersion = curl_exec($ch);
            curl_close($ch);
            $content = json_decode(file_get_contents('version-info/'.$currentVersion.'.json'));   
        }
    }
    else
    {
        header( 'Location: http://getnightingale.com' );
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="firstrun_title">Welcome to Nightingale!</title>
        <meta name="description" content="Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.">
        <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="//static.getnightingale.com/css/style.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="//static.getnightingale.com/css/legacy-ie.css">
            <script src="//static.getnightingale.com/javascript/html5shiv.js"></script>
        <![endif]-->
        
        <!-- l10n -->
        <script type="application/javascript" src="//static.getnightingale.com/javascript/l10n.js"></script>
        <link rel="prefetch" type="application/l10n" href="//static.getnightingale.com/l10n/locales<?php echo $version; ?>.ini" >
        <script type="application/javascript" src="//static.getnightingale.com/javascript/base.js"></script>
        
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <div id="ngalemainheadwrapper" class="wrapper">
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <h1 data-l10n-id="firstrun_title">Welcome to Nightingale!</h1>
                <p data-l10n-id="firstrun_description">You have just started the best music player for the first time. We are proud to bring you the unique combination of a web browser and a media player in one program. Further Nightingale allows you to install Feathers, which let you tweak the appearance, while Add-ons expand the functionality of the programm. Close this tab to access your library.</p>
                <section class="column">
                    <h2 data-l10n-id="firstrun_recommendedAdd-ons">Recommended Add-ons</h2>
                    <ul class="plainlist"><?php
foreach($content->extensions as $extension) {
    $extensionBaseId = 'firstrun_recommendedAdd-ons_'.$extension->name.'_';
    echo '<li class="feature">
            <h3 data-l10n-id="'.$extensionBaseId.'title">'.$extension->name.'</h3><a data-l10n-id="firstrun_recommendedAdd-ons_install" href="'.$extension->url.'">install</a>
            <figure>
                <img src="'.$extension->image.'" alt="'.$extension->name.' Preview" data-hdpi data-l10n-id="firstrun_recommendedAdd-ons_image" data-l10n-args="{\"name\":\"'.$extension->name.'\"">
                <figcaption data-l10n-id="'.$extensionBaseId.'description">'.$extension->description.'</figcaption>
            </figure>
        </li>';
}
                        ?>
                    </ul>
                </section>
                <section class="column">
                <?php
                    if(!array_key_exists('type',$_GET)||$_GET['type']!='upgrade')
                    {
                        // for the actual firstrun
                        echo '
                    <h2 data-l10n-id="firstrun_gettingStarted">Getting Started</h2>
                    <!-- for more help visit the forum -->
                    <ul class="plainlist">
                        <li class="feature">
                            <h3 data-l10n-id="firstrun_gettingStarted_migration_title">Migrate your old library</h3>
                            <figure>
                                <img src="//static.getnightingale.com/images/songbirdtransition.png" alt="Songbird to Nightingale" data-hdpi data-l10n-id="firstrun_gettingStarted_migration_image">
                                <figcaption data-l10n-id="firstrun_gettingStarted_migration_description">Nightingale supports migration from lots of players, including Songbird and iTunes. For step by step guides, check out <a href="//wiki.getnightingale.com/doku.php?id=migration" title="Migration">this article</a>.</figcaption>
                            </figure>
                        </li>
                        <li class="feature">
                            <h3 data-l10n-id="firstrun_gettingStarted_updates_title">Follow our Blog for Updates!</h3>
                            <figure>
                                <img src="//static.getnightingale.com/images/social.png" alt="Twitter, Facebook and Google+ Logos" data-l10n-id="firstrun_gettingStarted_updates_image">
                                <figcaption data-l10n-id="firstrun_gettingStarted_updates_description">Always want to know the latest news of the project? Subscribe to our <a href="//blog.getnightingale.com">blog</a> or follow us on <a href="https://twitter.com/getnightingale">Twitter</a>, <a href="https://plus.google.com/+Getnightingale">Google+</a> or <a href="https://facebook.com/getnightingale">Facebook</a>.</figcaption>
                            </figure>
                        </li>
                        <li class="feature">
                            <h3 data-l10n-id="firstrun_gettingStarted_sync_title">Sync your Music Player</h3>
                            <figure>
                                <img src="//static.getnightingale.com/images/sync.png" alt="Nightingale Folder Sync" data-l10n-id="firstrun_gettingStarted_sync_image">
                                <figcaption data-l10n-id="firstrun_gettingStarted_sync_description">Keep your music player\'s library, be it a mobile phone or an mp3 player,in sync with your computer\'s. The interface is confusing to you? Nightingale doesn\'t detect your device? Open the manual from the Synchronization view for help.</figcaption>
                            </figure>
                        </li>
                    </ul>';
                    }
                    else
                    {
                        $li = '';
                        foreach($content->changes as $i => $change) {
                            if(isset($change->number)) {
                                $gh = '<a href="//github.com/nightingale-media-player/nightingale-hacking/issues/'.$change->number.'">#'.$change->number.'</a> ';
                            }
                            else {
                                $gh = '';
                            }
                            $li .= '<li data-l10n-id="releasenotes_'.$i.'">'.$gh.$change->title.'</li>
                            ';
                        }
                        echo '
                    <h2 data-l10n-id="firstrun_whatsNew">What\'s New</h2>
                    <ul class="plainlist">
                        '.$li.'
                        <li data-l10n-id="firstrun_releaseNotes"  data-l10n-args=\'{"url":"//wiki.getnightingale.com/doku.php?id=releases_notes:'.$version.'_release_notes"}\'>For the full changelog visit the <a href="//wiki.getnightingale.com/doku.php?id=releases_notes:'.$version.'_release_notes">Release Notes</a>.</li>
                    </ul>';
                    }
                ?>
                </section>
                <section class="column omega">
                <?php
                    if(!array_key_exists('openstage',$_GET))
                        echo '<h2 data-l10n-id="firstrun_os_soon">Coming Soon!</h2>';
                    else {
                        $tracks = '';
                        foreach($content->openstage->tracks as $track) {
                            $tracks .= '<li>'.$track.'</li>
                            ';
                        }
                        echo '
                    <!--Project Open Stage
                         For more information visit //wiki.getnightingale.com/some.php?get=kitchen:open_stage -->

                    <h2 data-l10n-id="firstrun_os_artist">Featured Artist</h2>
                    <ul class="plainlist">
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
                            <h3 data-l10n-id="firstrun_os_discoverArtists">Discover more Artists</h3>
                            <p>Artists of previous releases. Maybe a list of the last few or just a link to some sort of history page.</p>
                        </li>
                    </ul>';
                    }
                ?>
                </section>
            </main>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <?php include "../static.getnightingale.com/php/footer.php"; ?>
        </div>
        <!-- Piwik -->
        <script type="application/javascript">
          var _paq = _paq || [];
          _paq.push(["setCustomVariable",1,"Type","<?php echo $_GET['type'];?>","visit"]);
          _paq.push(["setCustomVariable",2,"Version","<?php echo $version;?>","visit"]);
          _paq.push(["trackPageView"]);
          _paq.push(["enableLinkTracking"]);
        
          (function() {
            var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.getnightingale.com/";
            _paq.push(["setTrackerUrl", u+"piwik.php"]);
            _paq.push(["setSiteId", "1"]);
            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
            g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Piwik Code -->
            </body>
</html>