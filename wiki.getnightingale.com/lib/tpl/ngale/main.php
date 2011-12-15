<?php
/**
 * DokuWiki Default Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://dokuwiki.org/templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo tpl_getFavicon() ?>" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>
</head>

<style>
body{
  background-image: url('//static.getnightingale.com/img/gradent.png');
  background-repeat:repeat-x;
}

  /* header/nav */
#mainhead {
		margin-bottom: 1em;
		font-size: 15px;
	width: 950px;
	margin: 0 auto;    

}

#headlogo {
		height: 100px;
		margin-top: .8em;
}

/* nav*/
#mainhead #pagenav {
		float: right;
		margin-top: 1em;
}

#mainhead #pagenav li {
		float: left;
		padding:.8em;
		background-color: #333333;
}

#mainhead #pagenav li a:link, #mainhead #pagenav li a:hover, #mainhead #pagenav li a:active, #mainhead #pagenav li a:visited {
		color: white;
}

#mainhead #pagenav li:first-child {
		border-radius: 5px 0 0 5px;
}

#mainhead #pagenav li:last-child {
		border-radius:0 5px 5px 0;
}

#mainhead #pagenav .actual, #mainhead #pagenav li:hover {
		border-bottom: .4em solid #B55029;
		padding-bottom: .4em;
		text-decoration: none;
}

  .clearfix {
  list-style-type:none;
  }
  
/* footer */
/* footer styles */
footer {
	color: #fff;
	width: 100%;
	background-color: #666;
	z-index: 500;
	margin: 0;
	padding-bottom: 10px;
	font-size: 14px;
  height: 160px;
}

footer b {
	padding-bottom: 5px;
	display: block;
}

footer a:link, footer a:visited {
	color: #fff;
}

footer #license a:link, footer #license a :visited {
	text-decoration: underline;
}

footer a:hover {
	color: #EDEDED;
	text-decoration: underline;
}

footer a:active {
	color: #ccc;
	text-decoration: underline;
}

#lgradient {
	height: 14px;
	border-top: 2px solid #333333;
	width: 100%;
	
	background: #414141; /* Old browsers */
	background: -moz-linear-gradient(top,  #414141 0%, #373737 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#414141), color-stop(100%,#373737)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #414141 0%,#373737 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #414141 0%,#373737 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #414141 0%,#373737 100%); /* IE10+ */
	background: linear-gradient(top,  #414141 0%,#373737 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#414141', endColorstr='#373737',GradientType=0 ); /* IE6-9 */
	
	margin-bottom: 10px;
}

footer img {
	margin-top: 3px;
	margin-right: 5px;
}

#license {
	height: 120px;
}

footer nav {
	height: 120px;
}

#footerwrapper {
	width: 950px;
	margin: 10px auto;
	list-style: none;
	padding: 0;
}

#footerwrapper li {
	float: left;
	display: block;
	width: 296.6px;
	padding: 0 30px 0 0;
	margin: 0;
}

#double {
	margin: 0;
	padding: 0;
}

#double li {
	float: left;
	width: 133.3px;
}

#double li:first-child {
	padding-right: 30px;
}

#footerwrapper li:last-child {
	padding-right: 0;
}

#outlinedngale {
	float: left;
	display: block;
}

#buttons img {
	float: right;
	cursor: pointer;
	vertical-align: top;
	margin-right: -10px;
	margin-top: -10px;
.menu {
 list-style-type:none;
}

.menu {
 zoom: 1;
}

.menu {
 list-style-type:none;
}


.menu {
 zoom: 1;
}

.menu {
 list-style-type:none;
}



</style>

<body>
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>
			<div id="mainhead" class="clearfix">
				<a href="//getnightingale.com" title="Home"><img src="//static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
				<div id="pagenav">
				<ul class="clearfix">
					<li><a href="//getnightingale.com" title="Home">Home</li>
					<li><a href="//forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
					<li><a href="//addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>

					<li><a href="//blog.getnightingale.com" title="Development Blog">Blog</a></li>
					<li class="actual"><a href="//wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
				</ul>
				</div>
			</div>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div class="stylehead">

    <div class="header">
      <div class="pagename">
        [[<?php tpl_link(wl($ID,'do=backlink'),tpl_pagetitle($ID,true),'title="'.$lang['btn_backlink'].'"')?>]]
      </div>
      <div class="logo">
        <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"')?>
      </div>

      <div class="clearer"></div>
    </div>

    <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>

    <div class="bar" id="bar__top">
      <div class="bar-left" id="bar__topleft">
        <?php tpl_button('edit')?>
        <?php tpl_button('history')?>
      </div>

      <div class="bar-right" id="bar__topright">
        <?php tpl_button('recent')?>
        <?php tpl_searchform()?>&nbsp;
      </div>

      <div class="clearer"></div>
    </div>

    <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere() //(some people prefer this)?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs">
      <?php tpl_youarehere() ?>
    </div>
    <?php }?>

  </div>
  <?php tpl_flush()?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>

  <div class="clearer"></div>

  <?php tpl_flush()?>

  <div class="stylefoot">

    <div class="meta">
      <div class="user">
        <?php tpl_userinfo()?>
      </div>
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
    </div>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html')?>

    <div class="bar" id="bar__bottom">
      <div class="bar-left" id="bar__bottomleft">
        <?php tpl_button('edit')?>
        <?php tpl_button('history')?>
        <?php tpl_button('revert')?>
      </div>
      <div class="bar-right" id="bar__bottomright">
        <?php tpl_button('subscribe')?>
        <?php tpl_button('admin')?>
        <?php tpl_button('profile')?>
        <?php tpl_button('login')?>
        <?php tpl_button('index')?>
        <?php tpl_button('top')?>&nbsp;
      </div>
      <div class="clearer"></div>
    </div>

  </div>

  <?php tpl_license(false);?>

</div>
<?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html')?>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>

<footer>
	  <div id="lgradient"></div>
		<ul id="footerwrapper" class="clearfix">
			<li><img src="//static.getnightingale.com/img/footergale.png" alt="Nightingale logo" id="outlinedngale">
			  <div id="license">
			  <b>License</b>
			  Site content licensed under the GNU GPL. More info on the <a href="//wiki.getnightingale.com" title="license">licenses page</a>.
			  </div></li>

			<li><nav>
			<ul id="double" class="clearfix">
			  <li><b>Content</b>
			  <ul id="links">
				<li><a href="//blog.getnightingale.com" title="Development Blog">Blog</a></li>
				<li><a href="//forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
				<li><a href="//addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>

				<li><a href="all-versions.php" title="Download Nightingale">Download</a></li>
			  </ul></li>
			  <li><b>Developer</b>
			  <ul>
				<li><a href="//wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
				<li><a href="//locales.getnightingale.com" title="Translate Nightingale">Translate</a></li>
				<li><a href="https://github.com/nightingale-media-player" title="GitHub">Source Code</a></li>

				<li><a href="//bugs.getnightingale.com" title="Bugzilla">Bugs</a></li>
			  </ul></li>
			</ul>
		  </nav></li>
			<li id="buttons">
			<nav>
			  <b>Social</b>
			  <ul>

				<li><a href="//twitter.com/getnightingale" title="Nightingale on twitter">Follow @getnightingale on Twitter</a></li>
				<li><a href="//www.facebook.com/pages/Nightingale/210174055669535" title="Nightingale on facebook">Like Nightingale on Facebook</a></li>
			  </ul>
			</nav>
			</li>
		</ul>
</footer>
</body>
</html>
