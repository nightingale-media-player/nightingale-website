<?php
// Author:  Martin Giger
// License: Some GNU GPL License :D


$what = $_GET['as'];
$which = $GET['os'];

// --------------------------------
// | Please insert the URLS here. |
// --------------------------------

// I know, doing this with a DB would be more fun. But this is enought.

// Installer / download URLs
$urls[0] = ""; // Linux_32 URL
$urls[1] = ""; // Linux_64 URL
$urls[2] = ""; // Windows_32 URL
$urls[3] = ""; // MAC_32 URL
$urls[4] = ""; // Tarball URL

// Screenshot URLs, please use images in the dimension of 623x466px (thats a resized 640x480 screenshot)
$images[0] = ""; // Linuxscreenshot
$images[1] = ""; // Windowsscreenshot
$images[2] = ""; // Macscreenshot

// big screenshots (shown on click on the screenshot)
$big[0] = ""; // Big Linux screenshot
$big[1] = ""; // big Windows screenshot
$big[2] = "http://static.getnightingale.com/img/macosx-screenshot-raw.png"; // Big Mac Screen.


// -------------------------------------
// |  DO NOT EDIT ANYTHING BELOW THIS! |
// -------------------------------------


// nice JSON for use with JS
if($what=="JSON"||$what=="json"||$what=="js") {
		echo "var download = {
	'systems': [
		{
			'name': 'Linux',
			'architecture': 32,
			'link': '".$urls[0]."',
			'screenshot': '".$images[0]."',
			'fullsize': '".$big[0]."'
		},
		{
			'name': 'Linux',
			'architecture': 64,
			'link': '".$urls[1]."',
			'screenshot': '".$images[0]."',
			'fullsize': '".$big[0]."'
		},
		{
			'name': 'Windows',
			'architecture': 32,
			'link': '".$urls[2]."',
			'screenshot': '".$images[1]."',
			'fullsize': '".$big[1]."'
		},
		{
			'name': 'Mac OSX',
			'architecture': 32,
			'link': '".$urls[3]."',
			'screenshot': '"^.$images[2]."',
			'fullsize': '".$big[2]."'
		}
	]
};";
}

// plaintext URLS
else if($what=="text") {
	switch($which) {
		case 'mac': echo $urls[3]; break;
		case 'win': echo $urls[2]; break;
		case 'l64': echo $urls[1]; break;
		case 'tar': echo $urls[4]; break;
		default:    echo $urls[0];
	}
}

// Screenshot URL
else if($what=="img") {
	echo $images[0];
}
else if($what=="bimg") {
	echo $big[0];
}
?>