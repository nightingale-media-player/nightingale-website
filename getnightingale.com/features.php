<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="features_title">Nightingale Features</title>
        <meta name="description" content="Nightingale is a community support project for the powerful media player Songbird. It is developed by a proud community and we are equally proud to bring you the most extensible and feature-rich media experience. Freaturing smart playlists, equalizer, Last.fm integration, customizeable look and hundreds of add-ons. Nightingale has it all.">
        <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
        
        <!-- styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../static.getnightingale.com/css/style.css">
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
                        <li><a href="http://developer.getnightingale.com" data-l10n-id="developers">Developers</a></li>
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
                <h1 data-l10n-id="features_title">Nightingale Features</h1>
                <p data-l10n-id="features_description">Nightingale is powered by XULRunner from Mozilla. XULRunner is a reliable base from Mozilla. Other applications like Thunderbird or Instantbird are also based on XULRunner. The media core of Nightingale uses GStreamer, which allows Nightingale to have a large feature set of playback customization as well as a large selection of supported file formats.</p>
                <section class="fullwidth">
                    <h2 data-l10n-id="features_playback">Playback</h2>
                    <section class="twocolumns">
                        <a name="audio_formats"></a>
                        <h3 data-l10n-id="features_audioFormat" >Audio Formats</h3>
                        <img src="../static.getnightingale.com/images/controls.png" alt="Player controls" data-l10n-id="features_playerControls_image" class="columnimage">
                        <p class="column" data-l10n-id="features_audioFormat_description">Thanks to GStreamer Nighitngale can play various different file formats. Including <abbr title="MPEG-1/2 Audio Layer III">MP3</abbr>, <abbr title="Waveform Audio File Format">WAV</abbr>, <abbr title="Advanced Audio Coding">AAC</abbr>, <abbr title="Free Lossless Audio Codec">FLAC</abbr> and <a href="http://wiki.getnightingale.com/doku.php?id=audio_codec_support" title="Full Audio Codec support list">many more</a>. Thanks to the GStreamer integration, it's super easy to add GStreamer modules to expand the list even more.</p>
                    </section>
                    <section class="column omega">
                        <h3 data-l10n-id="features_native">Native GStreamer</h3>
                        <p data-l10n-id="features_native_description">On Linux systems Nightingale uses the GStreamer of the system. This slims down our package size and enhances compatibility with different operating systems.</p>
                    </section>
                    <section class="column">
                        <h3 data-l10n-id="features_videoPlayback">Video Playback</h3>
                        <p data-l10n-id="features_videoPlayback_description">Apart from playing audio, Nightingale also masters the playback of <a href="http://wiki.getnightingale.com/doku.php?id=video_codec_support" title="Detailed list of supported video formats">video formats</a>. This makes Nightingale the hub for all your local media files.
                    </section>
                    <section class="twocolumns omega">
                        <h3 data-l10n-id="features_playlists">Playlists</h3>
                        <img src="../static.getnightingale.com/images/playlists.png" class="columnimage" alt="Smart playlist selector with multiple filter arguments" data-l10n-id="features_playlists_image">
                        <p class="column" data-l10n-id="features_playlists_description">As every media player, Nightingale has playlists. However there are special playlists in Nightingale: Smart Playlists. They allow you to filter your Library based on any available tag with complex rulesets.
                    </section>
                    <section class="twocolumns">
                        <h3 data-l10n-id="features_equalizer">Equalizer</h3>
                        <img src="../static.getnightingale.com/images/equalizer.png" class="columnimage" alt="Equalizer window with ten horizontal sliders set to different heights." data-l10n-id="features_equalizer_image">
                        <p class="column" data-l10n-id="features_equalizer_description">Adjust the sound of your music with the built-in 10-band equalizer. Nightingale comes with a set of presets to which you can easily add your own ones or overwrite existing ones.</p>
                    </section>
                    <section class="column alt-full">
                        <h3 data-l10n-id="features_radio">Radiostreams</h3>
                        <p data-l10n-id="features_radio_description">For the internet radio fans: Nightingale can play m3u, pls and other streams. Just click on the link to the file and Nightingale will start playing the Stream.</p>
                    </section>
                </section>
                <section class="fullwidth">
                    <h2 data-l10n-id="features_browser">Integrated Browser</h2>
                    <section class="column alt-full">
                        <h3 data-l10n-id="features_linkGrabber">Link Grabber</h3>
                        <p data-l10n-id="featzres_linkGrabber_description">The intgerated browser of Nightingale detects links to media files and lists the files in a pane in the bottom of the window. You can then listen to the file or download it directly into your library.</p>
                    </section>
                    <section class="twocolumns omega">
                        <h3 data-l10n-id="features_tabs">Tabbed Browsing</h3>
                        <img src="../static.getnightingale.com/images/tabstrip.png" class="twocolumnimage" alt="Tabstrip with various titles, mostly related to Nightingale and parts of the navigationbar, including forward and backwards buttons." data-l10n-id="features_tabs_image">
                        <p data-l10n-id="features_tabs_description">By default you can only see one tab, the Library tab. However you can open an unlimited amount of other tabs to browse the web. Thanks to Gecko being integrated into XULRunner Nightingale has built-in a full featured browser.</p>
                    </section>
                </section>
                <section class="fullwidth">
                    <h2 data-l10n-id="features_sync">Synchronization</h2>
                    <section class="twocolumns">
                        <h3 data-l10n-id="features_devicesync">Device Sync</h3>
                        <p data-l10n-id="features_devicesync_description">You can synchronize any storage device with Nightingale's library or a custom playlist. It's only one way sync, so an export of the selected playlist to a folder.</p>
                    </section>
                    <secion class="column alt-full">
                        <h3 data-l10n-id="features_itunes">iTunes Import/Export</h3>
                        <p data-l10n-id="features_itunes_description">Easily import your iTunes library into Nightingale. If you need iTunes to sync your iOS device, you can also automatically sync your iTunes and Nightingale libraries. The import and export includes traditional playlists but not smart playlists.</p>
                    </secion>
                </section>
                <section class="fullwidth">
                    <h2 data-l10n-id="features_customization">Customization</h2>
                    <section class="column">
                        <h3 data-l110n-id="features_layout">Variable Interface</h3>
                        <p data-l10n-id="features_layout_description">Nightingale has two main view modes: the full version and a mini player mode. Additionally in the full view mode you can hide and show parts of the interface to your liking.</p>
                    </section>
                    <section class="column">
                        <h3 data-l10n-id="features_feathers">Feathers</h3>
                        <p data-l10n-id="features_feathers_description">You don't like the default look of Nightingale? No problem! The built-in Theme system allows you to quickly completely change the layout. Themes are called Feathers - well - because Nightingale is a bird.</p>
                    </section>
                    <section class="column omega">
                        <h3 data-l10n-id="features_add-ons">Add-ons</h3>
                        <p data-l10n-id="features_add-ons_description">Similar to Firefox, Nightingale also supports Add-ons. Extensions add new features to Nightingale or enhance existing ones. There is a big community creating extensions for Nightingale.</p>
                    </section>
                    
                    <section class="column">
                        <h3 data-l10n-id="features_soundCloud">SoundCloud Integration</h3>
                        <p data-l10n-id="feautures_soundCloud_description">You can optionally install an extension to neatly integrate SoundCloud into Nightingale.</p>
                        <a href="INSTALL" data-l10n-id="installAddOn" data-l10n-args='{"name":"SoundCloud"}'>Install SoundCloud</a>
                    </section>
                    <section class="column">
                        <h3 data-l10n-id="features_lastFm">Last.fm Scrobbling</h3>
                        <p data-l10n-id="features_lastFm_description">Scrobble the songs you are listening to Last.fm - from within Nightingale.</p>
                        <a href="INSTALL" data-l10n-id="installAddOn" data-l10n-args='{"name":"Last.fm"}'>Install Last.fm</a>
                    </section>
                    <!--replacement?<section class="column bottom">
                        <h3 data-l10n-id="features_shoutCast">SHOUTcast Integration</h3>
                        <p data-l10n-id="features_shoutCast_description">All your favorite SHOUTcast streams just a click away in Nightingale.</p>
                        <a href="INSTALL" data-l10n-id="installAddOn" data-l10n-args='{"name":"SHOUTcast"}'>Install SHOUTcast</a>
                    </section>-->
                </section>
            </main>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <?php include "../static.getnightingale.com/php/footer.php"; ?>
        </div>
    </body>
</html>