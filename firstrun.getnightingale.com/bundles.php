<?php
    header('Content-Type: text/xml');
?>
<SongbirdInstallBundle version="2">
<?php
    if(file_exists('version-info/'.$_GET['version'].'.json')) {
        $content = json_decode(file_get_contents('version-info/'.$_GET['version'].'.json'));
        foreach($content->extensions as $extension) {
            echo '<XPI description="',$extension->description,'" icon="',$extension->icon,'" default="true" name="',$extension->name,'" url="',$extension->url,'" id="',$extension->id,'"/>',PHP_EOL; 
        }
    }
?>
</SongbirdInstallBundle>
