<?php
// Author:  Martin Giger
// License: Some GNU GPL License :D


$what = $_GET['as'];
$which = $_GET['os'];

// --------------------------------
// | Please insert the URLS here. |
// --------------------------------

// I know, doing this with a DB would be more fun. But this is enought.

$version = "1.12.1"; // current version number

// Installer / download URLs
$urls[0] = "http://sourceforge.net/projects/ngale/files/1.12.1-Release/Nightingale_1.12.1-2454_linux-i686.tar.bz2/download"; // Linux_32 URL
$urls[1] = "http://sourceforge.net/projects/ngale/files/1.12.1-Release/Nightingale_1.12.1-2454_linux-x86_64.tar.bz2/download"; // Linux_64 URL
$urls[7] = "http://sourceforge.net/projects/ngale/files/1.12.1-Release/Nightingale_1.12.1-2454_ubuntu-i686.tar.bz2/download"; // Linux_32 gnome URL
$urls[8] = "http://sourceforge.net/projects/ngale/files/1.12.1-Release/Nightingale_1.12.1-2454_ubuntu-x86_64.tar.bz2/download"; // Linux_64 gnome URL
$urls[5] = "ppa:nightingaleteam/nightingale-release"; // Ubuntu PPA
$urls[6] = "https://aur.archlinux.org/packages.php?ID=52721"; //Archlinux
$urls[2] = "http://sourceforge.net/projects/ngale/files/1.12.1-Release/Nightingale_1.12.1-2454_windows-i686.exe/download"; // Windows_32 URL
$urls[3] = "http://sourceforge.net/projects/ngale/files/1.12.1-Release/Nightingale_1.12.1-2454_macosx-i686.dmg/download"; // MAC_32 URL
$urls[4] = "http://github.com/nightingale-media-player/nightingale-hacking/tarball/nightingale-1.12"; // Tarball URL

// Screenshot URLs, please use images in the dimension of 623x466px (thats a resized 4:3 screenshot)
$images[0] = "http://static.getnightingale.com/img/linux-screenshot.png"; // Linuxscreenshot
$images[1] = "http://static.getnightingale.com/img/windows-screenshot.png"; // Windowsscreenshot
$images[2] = "http://static.getnightingale.com/img/macosx-screenshot.png"; // Macscreenshot

// big screenshots (shown on click on the screenshot)
$big[0] = "http://static.getnightingale.com/img/linux-screenshot-raw.png"; // Big Linux screenshot
$big[1] = "http://static.getnightingale.com/img/windows-screenshot-raw.png"; // big Windows screenshot
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
			'name': 'Ubuntu',
			'architecture': 32,
			'link': '".$urls[5]."',
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
			'screenshot': '".$images[2]."',
			'fullsize': '".$big[2]."'
		}
	],
	'version':'".$version."'
};";
}

// get Version number
else if($what=="num") {
	echo $version;
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
