<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->

  <title>Nightingale</title>
  <meta name="description" content="Nightingale is a free and powerfull music player for Linux, Windows and Mac">
  <meta name="author" content="Martin Giger">

  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/style.css">
  <link type="text/plain" rel="author" href="http://domain/humans.txt" />
  
  <script src="js/libs/modernizr-2.0.6.min.js"></script>

</head>

<body>
  <div id="page">
  <!-- Use this as header -->
	<header class="clearfix">
		<a href="/" title="Home"><img src="//static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
		<nav>
		<ul class="clearfix">
			<li><a href="/" title="Home">Home</li>
			<li><a href="//forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
			<li><a href="//addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
			<li><a href="//blog.getnightingale.com" title="Development Blog">Blog</a></li>
			<li><a href="//wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
		</ul>
		</nav>
	</header>
	<!-- end of header -->
    <div id="main" role="main">
		<div id="headtitle">
			<h1>All Nightingale downloads</h1>
		</div>
		<ul id="downloadlist" style="text-align:left;">
			<?php if($_GET['linux']!=64) { echo '<li><a href="">Ubunu/Debian installer (.deb) | 32-Bit</a></li>';}?>
			<?php if($_GET['linux']!=32) { echo '<li><a href="">Ubunu/Debian installer (.deb) | 64-Bit</a></li>';}?>
			<li><a href="https://github.com/nightingale-media-player/nightingale-hacking/tarball/nightingale-1.8">Linux (.tar.gz) | 64/32-Bit</a></li>
			<?php if(!$_GET['linux']) { echo '<li><a href="">Windows Installer (.exe) | 32-Bit</a></li><li><a href="">Mac OS X (.app) | 32-Bit</a></li>';}?>
		</ul>
	  </div>
  </div>
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

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>