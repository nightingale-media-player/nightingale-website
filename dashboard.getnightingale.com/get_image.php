<?php
    include "token_auth.php";
    header("Content-Type: image/png");

    $name = 'http://stats.getnightingale.com/?module=API&method=ImageGraph.get&idSite=1&apiModule=CustomVariables&apiAction=getCustomVariables&language=en&token_auth='.$token.'&period=day&date='.date('Y-m-d',strtotime('-1 month')).',today&flat=1&filter_pattern_recursive='.$_GET['var'].'*&width=703&height=290';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $name);
    $fp = curl_exec($ch);
    curl_close($ch);
    exit;
?>