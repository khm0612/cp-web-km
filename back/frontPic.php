<?php

session_start();
ob_start();
$url = "http://gocalwi01/WsApp/SearchKM/back/PicBack.php";

$jsonPic = file_get_contents($url);

$jsonPic = json_decode($jsonPic);
echo '<img src="data:image/gif;base64,' . $jsonPic . '" />';
