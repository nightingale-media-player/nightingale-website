<?php
    if(file_exists('version-info/'.$_GET['version'].'.json'))
        $content = json_decode(file_get_contents('version-info/'.$_GET['version'].'.json'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" media="screen" href="chrome://songbird-web/content/html.css" />
    </head>
    <body class="darkest">
        <h1>Nightingale <?php echo $_GET['version']; ?> Release Notes</h1>
        <?php
        if(isset($content)) {
            $list = '<ul>';
            foreach($content->changes as $change) {
                $list .= '<li>'.$change->title.'</li>
                ';
            }
            echo $list.'</ul>';
        }
        else {
            echo "<p>Sorry, we found no release notes for this version</p>";
        }
        ?>
    </body>
</html>
