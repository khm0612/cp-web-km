<?php
ob_start();
session_start();
$_REQUEST['picPath'];
$path = $_REQUEST['picPath'];
header('Content-Type: application/json');
header("Content-type:application/json; charset=UTF-8");

// $path = 'http://webkm/kcfinder/upload/images/Capture%28438%29.JPG';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = base64_encode($data);
// echo "$type";
// echo "<br>";
// echo "$base64";
// echo "<br>";
// convert image to base64
?>

<?php
// echo $base64;
// echo '<hr>';
$jsonPic = json_encode($base64);
echo $jsonPic;
return $jsonPic;

?>
