<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="branding_title">Nightingale Branding</title>
        <?php include "../static.getnightingale.com/php/head.php"; ?>
        
        <!-- structured data -->
        <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "name": "Nightingale",
          "alternateName": "Nightingale Media Player",
          "url": "http://getnightingale.com",
          "isFamilyFriendly": true,
          "author": {
            "@type": "Organization",
            "name": "Nightingale Media Player Community",
            "url": "http://getnightingale.com",
            "logo": "http://static.getnightingale.com/images/nightingale_official_text_outline.png",
            "sameAs": [
                "https://twitter.com/getnightingale",
                "https://facebook.com/getnightingale",
                "https://plus.google.com/+Getnightingale"
            ]
          }
        }
        </script>
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <h1 data-l10n-title="branding_title">Nightingale Branding</h1>
                <section>
                    <h2 data-l10n-id="branding_logo">Logo</h2>
                    <section>
                        <p data-l10n-id="branding_logo_description">Please respect the special license of the Nightingale logo: <a href="//wiki.getnightingale.com/doku.php?id=licensing#logo">logo license</a>. The official Nightingale branding is tracked in the <a href="https://github.com/nightingale-media-player/nightingale-branding">nightingale-branding repository</a> on GitHub.</p>
                        <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_text.png" download>SVG</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_text_1000.png" download>PNG (1000x333)</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_text_500.png" download>PNG (500x167)</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_text_201.png">PNG (201x67)</a>
                        <figure>
                            <img src="<? echo $protocol; ?>static.getnightingale.com/images/nightingale_official_text_outline_1064.png"><!-- logo with text -->
                            <figcaption data-l10n-id="branding_logo_text_description">Logo with text</figcaption>
                        </figure>
                    </section>
                    <hr>
                    <section>
                        <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo.svg" download>SVG</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_1000.png" download>PNG (1000x1000)</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_512.png" download>PNG (512x512)</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_256.png" download>PNG (256x256)</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_128.png" download>PNG (128x128)</a>
                        <figure>
                            <img src="<? echo $protocol; ?>static.getnightingale.com/images/downloads/logo_512.png"><!-- logo without text -->
                            <figcaption data-l10n-id="branding_logo_figure_description">Logo without text</figcaption>
                        </figure>
                    </section>
                    <hr>
                    <section>
                        <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/splash.bmp" download>BMP (490x245)</a> <a href="<? echo $protocol; ?>static.getnightingale.com/images/downloads/splash.png" download>PNG (490x245)</a>
                        <figure>
                            <img src="<? echo $protocol; ?>static.getnightingale.com/images/downloads/splash.png"><!-- splash screen -->
                            <figcaption data-l10n-id="branding_splash_description">Windows splash screen</figcaption>
                        </figure>
                    </section>
                </section>
                <section>
                    <h2 data-l10n-id="branding_screenshots">Screenshots</h2>
                    <!-- insert all the promotional screen shots (features & differen plattforms) -->
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
