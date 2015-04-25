<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="donate_title">Donate to Nightingale</title>
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

        <script type="application/javascript">
            addEventListenerLegacy(window, "load", function() {
                var bsr = new XMLHttpRequest(),
                    list = document.getElementById("issueslist");
                bsr.open("GET","https://api.bountysource.com/issues?tracker_id=230233&order=bounty&tracker_type=github&page=1&per_page=10&can_add_bounty=true", true);
                bsr.setRequestHeader("Accept", "application/vnd.bountysource+json; version=2");
                bsr.responseType = "json";
                bsr.onreadystatechange = function(e) {
                    if(bsr.readyState == 4) {
                        if(bsr.status == 200) {
                            var result = bsr.response;
                            for(var i in result) {
                                if(result[i].bounty_total != "0.0") {
                                    var element = document.createElement("li"),
                                        link = document.createElement("a");
                                    link.appendChild(document.createTextNode(result[i].title + " ["+ result[i].bounty_total + "$]"));
                                    link.href = "https://www.bountysource.com/issues/" + result[i].slug;
                                    element.appendChild(link);
                                    list.appendChild(element);
                                }
                            }
                        }
                        else {
                            var element = document.createElement("li");
                            element.appendChild(document.createTextNode("Error retrieving issues from Bountysource"));
                            list.appendChild(element);
                        }
                    }
                };
                bsr.send();
            });
        </script>
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <h1 data-l10n-title="donate_title">Donate to Nightingale</h1>
                <p data-l10n-title="donate_description">We do not take any donations to run services, but to pay developers for their efforts. Using Bountysource one can assign money to an issue, which the developer gets paid as soon as the issue is fixed. If you don't know which bug to put a bounty on, you can donate to our <a href="https://www.bountysource.com/teams/nightingale">team on Bountysource</a> and we can then distribute the money accross issues. Bountysource only takes a fee when paying the money to the developer, see their <a href="https://www.bountysource.com/fees">fees information page</a>. You can back us on Bountysource with the following payment methods:</p>
                <ul>
                    <!-- add sample currencies each platform supports -->
                    <li data-l10-nid="donate_googlewallet">Google Wallet</li>
                    <li data-l10n-id="donate_paypal">PayPal</li>
                    <li data-l10n-id="donate_coinbase">Coinbase</li>
                </ul>
                <section class="clear">
                    <h2 data-l10n-title="donate_bounty">Put a Bounty on an Issue</h2>
                    <p data-l10n-id="donate_bounty_description">Alternatively you can put a bounty directly on an existing issue. Visit the <a href="https://www.bountysource.com/trackers/230233-nightingale-media-player-nightingale-hacking">issues list</a> on Bountysource to choose the issue you want to back. A few examples of bugs with a bounty:</p>
                    <ul id="issueslist">
                    </ul>
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
