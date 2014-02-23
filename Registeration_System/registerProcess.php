<?php

header("Content-Type:text/html; charset=utf-8");
header("Cache-Control:no-cache");
//get data
$username = $_POST['username'];
//xml
$info = "";
if ($username == "hehan") {
    //echo "invalid";
    //$info.= "<res><mes>Username is invalid</mes></res>";//this info is back to request page
    $info.='[{"res":"invalid","name":"h1"},{"res":"invalid","name":"h2"}]';
} else {
    //echo "vaid";
    //$info.= "<res><mes>Username is valid</mes>></res>";
    $info.='[{"res":"valid","name":"h3"},{"res":"valid","name":"h4"}]';
}
echo $info;
?>
