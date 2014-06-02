<?php
$failed = false;
$url = '';

// Check for XSS and stuff
if(filter_var($_REQUEST['url'], FILTER_VALIDATE_URL)) {
    $url = filter_var($_REQUEST['url'], FILTER_SANITIZE_URL);
}
else if($_REQUEST['url']) {
    $failed = true;
}

if (!($_COOKIE["nightingale_installed"] == "yes") && !$failed) {
  if ($_POST['have'] == yes) {
	  if ( setcookie("nightingale_installed", 'yes', time()+315360000, "/", "getnightingale.com", false, true)) {
	  //if (setcookie("nightingale_installed", $value, time()+315360000)) {
		header('Location:index.php?url='.$url);
	  }
      else {
		$failed = true;
	  }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
if($failed) {
    echo "<title data-l10n-id='launch_failed'>Failed to launch Nightingale</title>";
}
else if ($_COOKIE["nightingale_installed"] == "yes") {
  echo	"
  <title data-l10n-id='launch_inprogress'>Launching Nightingale...</title>
	<script type='application/javascript' src='//static.getnightingale.com/javascript/launch.js'></script>  ";
  }
  else {
    echo "<title data-l10n-id='launch_question'>Got Nightingale?</title>";
  }
?>
	<link rel='stylesheet' type='text/css' href='//static.getnightingale.com/css/launch.css' />
    
    <script type="application/javascript" src="//static.getnightingale.com/javascript/l10n.js"></script>
    <link rel="prefetch" type="application/l10n" href="//static.getnightingale.com/l10n/locales.ini">
</head>

<?php
if($failed) {
    echo "<body><h1 data-l10n-id='launch_failed'>Failed to launch Nightingale</h1></body>";
}
else if ($_COOKIE["nightingale_installed"] == "yes") {
  echo	"
  <body id='launch'>
	<div id='wrap'>
		<h1 data-l10n-id='launch_wait'>One Moment Please</h1>
		<p class='note' data-l10n-id='launch_inprogress'>
			Launching Nightingale...
		</p>
		<p class='link'>
			<a href='ngale:open?url=".$url."'>ngale:open?url=".htmlspecialchars($url)."</a>
		</p>
		<img src='//static.getnightingale.com/images/launch.png' />
		<div id='options'>
			<form action='http://getnightingale.com/' method='GET'>
				<input type='submit' value='Download Nightingale' data-l10n-id='launch_download'/>
			</form>
		</div>
	</div>
</body>";
  }
  else {
    echo "
      <body id='detect'>
        <div id='wrap'>
          <h1 data-l10n-id='launch_question'>Got Nightingale?</h1>
          <p class='note' data-l10n-id='launch_nogale'>
          You tried to open the following link in Nightingale but
          Nightingale has not yet been detected.
        </p>
        <p class='link'>
          <a href='ngale:open?url=".$url."'>ngale:open?url=".htmlspecialchars($url)."</a>
        </p>
        <img src='//static.getnightingale.com/images/detect.png' />
        <div id='options'>
          <form action='http://" . $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"] . "' method='POST'>
            <input type='hidden' name='have' value='yes' />
            <input type='hidden' name='url' value='".$url."' />
            <input type='submit' value='I have Nightingale'".($url==''?" disabled='true'":'')." data-l10n-id='launch_yes'/>
          </form>
          <form action='http://getnightingale.com/' method='GET'>
            <input type='submit' value='Download Nightingale' data-l10n-id='launch_download'/>
          </form>
        </div>
      </div>
    </body>";
  }
?>
</html>
