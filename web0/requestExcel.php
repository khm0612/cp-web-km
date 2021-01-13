
<?php
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//error_reporting(0);
//header("Content-type: application/text/x-csv");
//header("Content-disposition: attachment; filename=report.csv");
$name = 'downloadFile.zip';

$result = file_get_contents('http://localhost/sing9/web/fileback.php');
$result =  json_decode($result);
$result = base64_decode($result);


file_put_contents($name, $result);
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($name) . "\""); 
readfile($name);

// readfile($result); 
//print_r($result);
// readfile($result);

//readfile($result);
//$result = str_replace('json','xlsx',$result);

// readfile($result); 

// $result = json_decode($result);
//echo("<hr>");
//print_r($result);
// readfile($result); 
// 
