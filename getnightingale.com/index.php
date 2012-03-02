<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->

  <!-- Info -->
  <title>Nightingale</title>
  <meta name="description" content="Nightingale is a free and powerfull music player for Linux, Windows and Mac">
  <meta name="tags" content="Nightingale free powerfull music video browser Firefox Gecko Songbird player Linux Windows Mac">
  <meta name="author" content="Martin Giger">
  <link type="text/plain" rel="author" href="humans.txt" >

  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <!-- css -->
  <link rel="stylesheet" href="http://static.getnightingale.com/css/style.css">
  <link rel="stylesheet" href="http://static.getnightingale.com/css/general.css">
  
  <!-- favicon -->
  <link type="image/vnd.microsoft.icon" size="32x32" rel="icon" href="favicon.ico" >
  
  <!-- scripts part 1 -->
  <script src="http://getnightingale.com/version.php?as=JSON"></script>
  <script src="http://static.getnightingale.com/js/libs/modernizr-2.0.6.min.js"></script>

</head>

<body>
  <div id="page">
  <!-- Use this as header -->
	<header id="ngalemainhead">
		<a href="/" title="Home"><img src="http://static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
		<nav>
		<ul class="menu">
			<li class="actual"><a href="/" title="Home">Home</a></li>
			<li><a href="http://forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
			<li><a href="http://addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
			<li><a href="http://blog.getnightingale.com" title="Development Blog">Blog</a></li>
			<li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
		</ul>
		</nav>
	</header>
	<!-- end of header -->
    <div id="main" role="main">
		<div id="messageh">
			<h2>Nightingale chirps your favorite tunes!</h2>
			<!-- If you scroll a bit over there (this direction ->), you will find the link to the release notes. You may want to replace it ~-> (hehe, fake end :P)                                                                                                                  Here you go. It's under this phrase. v (& here finally comes the end of this comment:)                                                         404 End not found :P                                                    200 OK-->
			<span id="mainmsg">A beautiful interface with a wide range of supported audio formats, all with multi-platform support! <br /><br /><strong>Please note this is a preview release!</strong> There may be some bugs, so you should see the <a href="http://wiki.getnightingale.com/doku.php?id=releases_notes:1.11.0_release_notes">release notes</a> and the <a href="http://forum.getnightingale.com">forums</a> for more details!</span>
		<div class="buttonpadder">
			<a class="button" href="all-versions.php" title="Download Nightingale">
				<div class="play"></div>
				<span class="buttontext">Download<br><span class="small">1.11.0 | <span class="os">Not detected</span></span></span>
			</a>
		</div>
		<span id="other">We tried to detect the optimal installer for you. <a href="all-versions.php" title="all downloads">Other&nbsp;systems</a></span>
		</div>
		<div id="screen">
			<a href="<?php include("version.php?as=bimg"); ?>"><img src="<?php include("version.php?as=img"); ?>" alt="Screenshot"></a>
		</div>
		<div id="spec">
			<ul id="features" class="clearfix">
				<li><div id="features-addons"></div>Missing a feature? An addon may already do that...otherwise, you can help develop or suggest one!<a href="http://addons.getnightingale.com" class="more">Show Addons &gt;</a></li>
				<li><div id="features-lastfm"></div>Use the Last.FM Addon to track your listening habits and compare them with your friends.</li>
				<li><div id="features-devsneeded"></div>We currently want community members, testers, packagers, and developers - all help IS appreciated!</li>
			</ul>
		</div>
	</div>
  </div>
	<footer id="ngalemainfooter">
	  <div id="lgradient"></div>
		<ul id="footerwrapper" class="clearfix">
			<li><img src="http://static.getnightingale.com/img/footergale.png" alt="Nightingale logo" id="outlinedngale">
			  <div id="license">
			  <b>License</b>
			  Site content licensed under the <a href="http://www.gnu.org/copyleft/gpl.html">GNU GPL</a>.
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
	
  <!-- scripts part 2 -->
  <script src="http://static.getnightingale.com/js/language-switch.js" type="text/javascript"></script>

  <script src="http://static.getnightingale.com/js/jquery-1.7.1.min.js"></script>

  <script defer src="http://static.getnightingale.com/js/plugins.js"></script>
  <script defer src="http://static.getnightingale.com/js/script.js"></script>
  <script>
    window._gaq = [['_setAccount','UA-27679277-1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="http//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
