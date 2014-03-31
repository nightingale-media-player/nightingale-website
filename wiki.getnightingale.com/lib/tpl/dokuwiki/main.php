<?php
/**
 * DokuWiki Default Template 2012
 *
 * @link     http://dokuwiki.org/template
 * @author   Anika Henke <anika@selfthinker.org>
 * @author   Clarence Lee <clarencedglee@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
header('X-UA-Compatible: IE=edge,chrome=1');

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');
?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
    <link rel="stylesheet" href="http://static.getnightingale.com/css/general.css">
</head>

<body>
    <header id="ngalemainhead">
		<a href="http://getnightingale.com/" title="Home"><img src="http://static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
		<nav>
		<ul class="menu">
			<li><a href="http:////getnightingale.com/" title="Home">Home</a></li>
			<li><a href="http://forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
			<li><a href="http://addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
			<li><a href="http://blog.getnightingale.com" title="Development Blog">Blog</a></li>
			<li class="actual"><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
		</ul>
		</nav>
	</header>
    <!--[if lte IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->
    <div id="dokuwiki__site"><div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?> <?php
        echo ($showSidebar) ? 'showSidebar' : ''; ?> <?php echo ($hasSidebar) ? 'hasSidebar' : ''; ?>">

        <?php include('tpl_header.php') ?>

        <div class="wrapper group">

            <?php if($showSidebar): ?>
                <!-- ********** ASIDE ********** -->
                <div id="dokuwiki__aside"><div class="pad include group">
                    <h3 class="toggle"><?php echo $lang['sidebar'] ?></h3>
                    <div class="content">
                        <?php tpl_flush() ?>
                        <?php tpl_includeFile('sidebarheader.html') ?>
                        <?php tpl_include_page($conf['sidebar'], 1, 1) ?>
                        <?php tpl_includeFile('sidebarfooter.html') ?>
                    </div>
                </div></div><!-- /aside -->
            <?php endif; ?>

            <!-- ********** CONTENT ********** -->
            <div id="dokuwiki__content"><div class="pad group">

                <div class="pageId"><span><?php echo hsc($ID) ?></span></div>

                <div class="page group">
                    <?php tpl_flush() ?>
                    <?php tpl_includeFile('pageheader.html') ?>
                    <!-- wikipage start -->
                    <?php tpl_content() ?>
                    <!-- wikipage stop -->
                    <?php tpl_includeFile('pagefooter.html') ?>
                </div>

                <div class="docInfo"><?php tpl_pageinfo() ?></div>

                <?php tpl_flush() ?>
            </div></div><!-- /content -->

            <hr class="a11y" />

            <!-- PAGE ACTIONS -->
            <div id="dokuwiki__pagetools">
                <h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>
                <div class="tools">
                    <ul>
                        <?php
                            $data = array(
                                'view'  => 'main',
                                'items' => array(
                                    'edit'      => tpl_action('edit',      1, 'li', 1, '<span>', '</span>'),
                                    'revert'    => tpl_action('revert',    1, 'li', 1, '<span>', '</span>'),
                                    'revisions' => tpl_action('revisions', 1, 'li', 1, '<span>', '</span>'),
                                    'backlink'  => tpl_action('backlink',  1, 'li', 1, '<span>', '</span>'),
                                    'subscribe' => tpl_action('subscribe', 1, 'li', 1, '<span>', '</span>'),
                                    'top'       => tpl_action('top',       1, 'li', 1, '<span>', '</span>')
                                )
                            );

                            // the page tools can be amended through a custom plugin hook
                            $evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
                            if($evt->advise_before()){
                                foreach($evt->data['items'] as $k => $html) echo $html;
                            }
                            $evt->advise_after();
                            unset($data);
                            unset($evt);
                        ?>
                    </ul>
                </div>
            </div>
        </div><!-- /wrapper -->

        <?php include('tpl_footer.php') ?>
    </div></div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
    <!--[if ( lte IE 7 | IE 8 ) ]></div><![endif]-->
    </div>
    <footer id="ngalemainfooter">
	  <div id="lgradient"></div>
		<ul id="footerwrapper" class="clearfix">
			<li><img src="http://static.getnightingale.com/img/footergale.png" alt="Nightingale logo" id="outlinedngale">
			  <div id="license">
			  <b>License</b>
			  <?php if(defined('DOKU_INC')) { echo tpl_license(false); } else { echo
			  "Site content licensed under the <a href='http://www.gnu.org/copyleft/gpl.html'>GNU GPL</a>."; } ?> <!-- ready to include the dokuwiki licenseblock -->
			  </div></li>
			<li><nav>
			<ul id="double" class="clearfix">
			  <li><b>Content</b>
			  <ul id="links">
				<li><a href="http://blog.getnightingale.com" title="Development Blog">Blog</a></li>
				<li><a href="http://forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
				<li><a href="http://addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
				<li><a href="all-versions.php" title="Download Nightingale">Download</a></li>
				<li><a href="http://forum.getnightingale.com/forum-13.html" title="Help" id="forumhelplink">Help</a></li>
			  </ul></li>
			  <li><b>Developer</b>
			  <ul>
				<li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
				<li><a href="http://wiki.getnightingale.com/doku.php?id=ngale-locales" title="Translate Nightingale">Translate</a></li>
				<li><a href="https://github.com/nightingale-media-player" title="GitHub">Source Code</a></li>
				<li><a href="http://bugs.getnightingale.com" title="Bugzilla">Bugs</a></li>
			  </ul></li>
			</ul>
		  </nav></li>
			<li id="buttons">
			<nav>
			  <b>Social</b>
			  <ul>
				<li><a href="http://twitter.com/getnightingale" title="Nightingale on twitter">Follow @getnightingale on Twitter</a></li>
				<li><a href="http://www.facebook.com/pages/Nightingale/210174055669535" title="Nightingale on Facebook">Like Nightingale on Facebook</a></li>
				<li><a href="https://plus.google.com/103377471329459083108/posts" title="Nightingale on Google+">Follow Nightingale on Google+</a></li>
			  </ul>
			</nav>
			</li>
		</ul>
</footer>
<script src="http://static.getnightingale.com/js/language-switch.js" type="text/javascript"></script>
</body>
</html>
