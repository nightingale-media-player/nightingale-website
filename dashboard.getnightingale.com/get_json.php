<?php
    include "token_auth.php";
    $siteId = 1;
    $lang = 'en';

    if(isset($_GET['lang']))
        $lang = $_GET['lang'];

function getVersion() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://getnightingale.com/version.php?as=num');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $currentVersion = curl_exec($ch);
    curl_close($ch);

    return $currentVersion;
}

function getURL($type, $version = 0) {
    global $siteId, $token;
    $monthAgo = date('Y-m-d',strtotime('-1 month'));


    switch($type) {
        case 'installs':
            return 'http://stats.getnightingale.com/?module=API&method=VisitsSummary.getUniqueVisitors&idSite='.$siteId.'&language='.$lang.'&token_auth='.$token.'&period=day&date='.$monthAgo.',today&format=JSON&segment=customVariableValue1==install';
        case 'downloads':
            return 'http://stats.getnightingale.com/?module=API&method=VisitsSummary.getVisits&idSite=2&language='.$lang.'&token_auth='.$token.'&period=day&date='.$monthAgo.',today&format=JSON&segment=visitConvertedGoalId==1';
        case 'infiniteInstalls':
            return 'http://stats.getnightingale.com/?module=API&method=VisitsSummary.getUniqueVisitors&idSite='.$siteId.'&language='.$lang.'&token_auth='.$token.'&period=day&date=2014-01-12,today&format=JSON&segment=customVariableValue1==install;customVariableValue2=='.$version;
        case 'updates':
            return 'http://stats.getnightingale.com/?module=API&method=VisitsSummary.getUniqueVisitors&idSite='.$siteId.'&language='.$lang.'&token_auth='.$token.'&period=day&date='.$monthAgo.',today&format=JSON&segment=customVariableValue1==upgrade';
        case 'infiniteUpdates':
            return 'http://stats.getnightingale.com/?module=API&method=VisitsSummary.getUniqueVisitors&idSite='.$siteId.'&language='.$lang.'&token_auth='.$token.'&period=day&date=2014-01-12,today&format=JSON&segment=customVariableValue1==upgrade;customVariableValue2=='.$version;
        case 'versionGraph':
            return 'http://stats.getnightingale.com/?module=API&method=CustomVariables.getCustomVariables&idSite='.$siteId.'&language='.$lang.'&token_auth='.$token.'&period=day&date='.$monthAgo.',today&flat=1&format=JSON&filter_pattern_recursive=Version*';
        case 'osDistribution':
            return 'http://stats.getnightingale.com/?module=API&method=DevicesDetection.getOsFamilies&idSite='.$siteId.'&language='.$lang.'&token_auth='.$token.'&period=range&date=2014-01-12,today&format=JSON&segment=customVariableValue2=='.getVersion();
        default:
            return '';
    }
}

function getData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = json_decode(curl_exec($ch));
    curl_close($ch);

    return $data;
}

// main code

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://dashboard.getnightingale.com");
    
    $return = new stdClass;

    switch($_GET['type']) {
        case 'versionInfo':
            $version = getVersion();
            $data = getData(getURL('infiniteInstalls',$version));

            $num = 0;
            foreach($data as $val) {
                $num += $val;
            }
            $inst = new stdClass;
            $inst->name = "install";
            $inst->nb_visits = $num;

            $return->versionPie[0] = $inst;
            $return->totalProfiles = $num;

            $data = getData(getURL('infiniteUpdates',$version));

            $num = 0;
            foreach($data as $val) {
                $num += $val;
            }
            $obj = new stdClass;
            $obj->name = "update";
            $obj->nb_visits = $num;

            $return->versionPie[1] = $obj;
            $return->totalProfiles += $num;
            $return->version = $version;

            echo json_encode($return);
            break;
        case 'installsGraph':
            $return->installs = getData(getURL('installs'));
            $return->updates = getData(getURL('updates'));
            $return->downloads = getData(getURL('downloads'));
            echo json_encode($return);
            break;
        default:
            echo json_encode(getData(getURL($_GET['type'])));
    }
?>
