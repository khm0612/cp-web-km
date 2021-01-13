<?php
//$_SESSION['skill_sent'];
//Skill = $_SESSION['skill_sent'];
$_REQUEST['img_src'];
$img_src = $_REQUEST['img_src'];


$Db_Servername = 'webkm';
$Db_Username = 'root';
$Db_Password = 'dbwebkm@2016';
$Db_name = 'webkm';

$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$sql='SELECT * FROM vw_content_webkm LIMIT 10  ';


// Create connection
$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "<img src='/images/test/{ $img_src}' alt='img'>";