<?php
    if(file_exists('version-info/'.$_GET['version'].'.json'))
        $content = json_decode(file_get_contents('version-info/'.$_GET['version'].'.json'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" media="screen" href="chrome://songbird-web/content/html.css" >
        
        <script type="text/javascript" src="http://static.getnightingale.com/javascript/l10n.js"></script>
        <link rel="prefetch" type="application/l10n" href="http://static.getnightingale.com/l10n/locales.ini" >
    </head>
    <body class="darkest">
        <h2 data-l10n-id="releasenotes_title" data-l10n-args='{"version":"<?php echo $_GET['version']; ?>"}'>Nightingale <?php echo $_GET['version']; ?> Release Notes</h2>
        <?php
        if(isset($content)) {
            $list = '<ul>';
            foreach($content->changes as $i => $change) {
                $list .= '<li data-l10n-id="releasenotes_'$i.'">'.$change->title.'</li>
                ';
            }
            echo $list.'</ul>',PHP_EOL;
        }
        else {
            echo "<p data-l10n-id='releasenotes_versionNotFound'>Sorry, we found no release notes for this version</p>",PHP_EOL;
        }
        ?>
    </body>
</html>
