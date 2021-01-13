<?php
ob_start();
$_REQUEST['File'];
$_REQUEST['name'];
$File = $_REQUEST['name'];
$name = $_REQUEST['File'];
$result = file_get_contents('http://10.183.252.68/sing9/web/fileback.php?pathFile='.$File);
$result =  json_decode($result);
$result = base64_decode($result);

 file_put_contents($name, $result);
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($name) . "\"");
readfile($name);