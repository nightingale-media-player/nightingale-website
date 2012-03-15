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
  <title>Nightingale - Downloads</title>
  <meta name="description" content="Nightingale is a free and powerfull music player for Linux, Windows and Mac">
  <meta name="author" content="Martin Giger">
  <link type="text/plain" rel="author" href="humans.txt" >

  <meta name="viewport" content="width=device-width,initial-scale=1">

  
  <!-- css -->
  <link rel="stylesheet" href="http://static.getnightingale.com/css/general.css">
  <link rel="stylesheet" href="http://static.getnightingale.com/css/style.css">
  
  <!-- favicon -->
  <link type="image/vnd.microsoft.icon" size="32x32" rel="icon" href="favicon.ico" >
  
  <script src="http://static.getnightingale.com/js/libs/modernizr-2.0.6.min.js"></script>

</head>

<body>
  <div id="page">
  <!-- Use this as header -->
	<header id="ngalemainhead">
		<a href="/" title="Home"><img src="//static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
		<nav>
		<ul class="menu">
			<li><a href="/" title="Home">Home</a></li>
			<li><a href="http://forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
			<li><a href="http://addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
			<li><a href="http://blog.getnightingale.com" title="Development Blog">Blog</a></li>
			<li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
		</ul>
		</nav>
	</header>
	<!-- end of header -->
    <div id="main" role="main">
		<div id="headtitle">
			<h1>All Nightingale <?echo $version ?> downloads</h1>
		</div>
		<div id="under">
			<h2>Linux:</h2>
			<ul class="downloadlist" style="text-align:left;">
				<li><a href="<?php echo $urls[0]; ?>">Linux Tarball (.tar.gz) | 32-Bit</a></li> <!-- here goes the linux 32bit tarball -->
				<li><a href="<?php echo $urls[1]; ?>">Linux Tarball (.tar.gz)  | 64-Bit</a></li> <!-- and here its 64bit twin -->
			</ul>
			<h2>Windows:</h2>
			<ul class="downloadlist" style="text-align:left;">
				<li><a href="<?php echo $urls[2]; ?>">Windows Installer (.exe) | 32-Bit</a></li> <!-- this link here offcourse refers to the windows installer.-->
			</ul>
			<h2>Mac:</h2>
			<ul class="downloadlist" style="text-align:left;">
				<li><a href="<?php echo $urls[3]; ?>">Mac disk Image (.dmg) | 32-Bit</a></li>
			</ul>
			<h2>Source:</h2>
			<ul class="downloadlist" style="text-align:left;">
				<li><a href="<?php echo $urls[4]; ?>">Tarball</a></li> <!-- Tarball link here! -->
				<li><a href="git://github.com/nightingale-media-player/nightingale-hacking.git">Git Repo</a> - right click and copy URL, then "git clone --depth=1 [url]" followed by "git checkout nightingale-1.11"</li>	
			</ul>
			<h2>Linux Distro Specific:</h2>
			<ul class="downloadlist" style="text-align:left;">
				<li><a target="_blank" href="https://aur.archlinux.org/packages.php?ID=52721">Archlinux PKGBUILD</a></li>
				<li>Ubuntu/Debian PPA Wanted - feel free to make one and we'll put it here!</li>
				<li>Other distros: let us know and we'll post your Nightingale links here!</li>
			</ul>
		</div>
	  </div>
  </div>
	<?php include("footer.php"); ?>

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
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
