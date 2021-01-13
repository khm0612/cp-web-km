<?php

$url = "http://gocalwi01/WsApp/SearchKM/back/PicBack.php";
$jsonPic = file_get_contents($url);
// $jsonPic = str_replace('"', '', $jsonPic);
// $jsonPic = str_replace('\\', '', $jsonPic);
// $jsonPic = str_replace("'", '', $jsonPic);
$jsonPic = json_decode($jsonPic);
echo '<img src="data:image/gif;base64,' . $jsonPic . '" />';
// echo $jsonPic;

//$jsonPic = json_decode($jsonPic,false);
// print_r($jsonPic);
// echo $jsonPic;
// $jsonPics = json_decode($jsonPic);
// $jsonPic = json_encode($base64);
// echo $jsonPics;
// $bin = base64_decode($jsonPic);
