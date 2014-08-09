<?php include_once "../static.getnightingale.com/php/env.php"; ?>
<header class="container">
    <nav role="navigation">
        <button class="mobilenav" id="expandngalenav" data-l10n-id="menu">Menu</button>
        <ul id="ngalenavlist">
            <li><a <?php if($current=="main") echo 'class="current" '; ?>href="http://getnightingale.com" data-l10n-id="home">Home</a></li>
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
        <img src="<!php echo $prototcol; ?>static.getnightingale.com/images/nightingale_official_text_outline.png" alt="Nightingale - The tune of life, the tune of yours" data-l10n-id="headerlogo" data-hdpi>
    </figure>
</header>
