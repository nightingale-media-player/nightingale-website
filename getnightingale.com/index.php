<!doctype html>
<?php include("version.php"); ?>
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
  <div id="topline"></div>
  <div id="page">
  <!-- Use this as header -->
	<header id="ngalemainhead">
		<a href="/" title="Home"><img src="http://static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
		<nav>
			<div id="rightend"><div id="rightoverlay"></div></div>
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
			<span id="mainmsg">A beautiful interface with a wide range of supported audio formats, all with multi-platform support! <br /><br> <b>We are proud to offer you the first full release.</b><br> To see the changes we did, check out the <a href="http://wiki.getnightingale.com/doku.php?id=releases_notes:<?php echo $version; ?>_release_notes">release notes</a> for more details! Feel free to leave us your feedback in our <a href="http://forum.getnightingale.com" title="forum">forum</a>.</span>
		<div class="buttonpadder">
			<a class="button" href="all-versions.php" title="Download Nightingale">
				<div class="play"></div>
				<span class="buttontext">Download<br><span class="small"><?php echo $version; ?> | <span class="os">Not detected</span></span></span>
			</a>
		</div>
		<span id="other">We tried to detect the optimal installer for you. <a href="all-versions.php" title="all downloads">Other&nbsp;systems</a></span>
		</div>
		<div id="screen">
			<a href="<?php echo $big[0]; ?>"><img src="<?php echo $images[0]; ?>" alt="Screenshot"></a>
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
	<?php include("footer.php"); ?>

  <!-- scripts part 2 -->
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
