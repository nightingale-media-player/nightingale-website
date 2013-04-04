<?php
    $version = '1.12';
    
    
    $download['windows']['url'] = ''; // download url
    $download['windows']['img'] = 'images/wine.png'; // symbolicon
    $download['windows']['osname'] = 'Windows';
    $download['windows']['arch'] = 32;
    $download['windows']['package'] = '.exe'; // orange package info
    $download['windows']['popup'] = false;
    
    $download['mac']['url'] = '';
    $download['mac']['img'] = 'images/dmg.png';
    $download['mac']['osname'] = 'Mac OS X';
    $download['mac']['arch'] = 32;
    $download['mac']['package'] = '.dmg';
    $download['mac']['popup'] = false;
    
    $download['ubuntu']['url'] = '';
    $download['ubuntu']['img'] = 'images/start-here-ubuntuoriginal.png';
    $download['ubuntu']['osname'] = 'Ubuntu';
    $download['ubuntu']['arch'] = getArch();
    $download['ubuntu']['package'] = 'PPA';
    $download['ubuntu']['popup'] = true;
    
    $download['debian']['url'] = '';
    $download['debian']['img'] = 'images/application-x-deb.png';
    $download['debian']['osname'] = 'Debian';
    $download['debian']['arch'] = 32;
    $download['debian']['package'] = '.deb';
    $download['debian']['popup'] = false;
    
    $download['arch']['url'] = 'https://aur.archlinux.org/packages/ni/nightingale-git/nightingale-git.tar.gz';
    $download['arch']['img'] = 'images/package-x-generic.png';
    $download['arch']['osname'] = 'Archlinux';
    $download['arch']['arch'] = 32;
    $download['arch']['package'] = 'PKGBUILD';
    $download['arch']['popup'] = false;
    
    $download['linux32']['url'] = '';
    $download['linux32']['img'] = 'images/package-x-generic.png';
    $download['linux32']['osname'] = 'Linux';
    $download['linux32']['arch'] = 32;
    $download['linux32']['package'] = '.tar.bz2';
    $download['linux32']['popup'] = false;
    
    $download['linux64']['url'] = '';
    $download['linux64']['img'] = 'images/package-x-generic.png';
    $download['linux64']['osname'] = 'Linux';
    $download['linux64']['arch'] = 64;
    $download['linux64']['package'] = '.tar.bz2';
    $download['linux64']['popup'] = false;
    
    $download['unknown']['url'] = '/download.php';
    $download['unknown']['img'] = 'images/package-x-generic.png';
    $download['unknown']['osname'] = 'Unknown';
    $download['unknown']['arch'] = 'unknown';
    $download['unknown']['package'] = '';
    $download['unknown']['popup'] = false;
    
    function getArch() {
        $arch = 32;
        if(preg_match('/x86_64|amd64/i', $_SERVER['HTTP_USER_AGENT']))
            $arch = 64;
        return $arch;
    }
?>