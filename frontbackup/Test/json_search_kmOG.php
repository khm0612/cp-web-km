﻿<?php
header("Content-type:application/json; charset=UTF-8");    
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 
//header("Content-Type: application/json; charset=UTF-8");
//$obj = json_decode($_GET['x'], false);

$servername = 'webkm'; //ชื่อ Host 
$username = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
$password = 'dbwebkm@2016'; // password สำหรับเข้าจัดการฐานข้อมูล
$dbname = 'webkm'; //ชื่อ ฐานข้อมูล

//$_GET['x']='smile';
if($_GET['x']){
	$stxt='a.TOPIC LIKE "%'.$_GET['x'].'%" OR a.DESCRIPTION LIKE "%'.$_GET['x'].'%" OR a.KEYWORD LIKE "%'.$_GET['x'].'%"';
// }else{
// 	$stxt='a.CONTENT_ID=1';
}

$sql='SELECT a.CONTENT_ID,a.TOPIC,a.DESCRIPTION,a.LAST_UPDATE,b.category_name,c.subcategory_name FROM content_table a LEFT JOIN category_table b ON b.id = a.CATEGORY_ID LEFT JOIN subcategory_table c ON c.id = a.SUBCATEGORY_ID WHERE '.$stxt.' ORDER BY LAST_UPDATE DESC';


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, $sql);

$ress=array();
if (mysqli_num_rows($result) > 0) {

	while($row = mysqli_fetch_assoc($result)) {
		//echo "topic: " . $row["TOPIC"]. " <br> description : " . $row["DESCRIPTION"]. "<br>";
		// $ress[$row['CONTENT_ID']]['topic']=$row["TOPIC"];
		// $ress[$row['CONTENT_ID']]['description']=$row["DESCRIPTION"];
		// $ress[$row['CONTENT_ID']]['cate']=$row["category_name"];
		// $ress[$row['CONTENT_ID']]['subcate']=$row["subcategory_name"];
		// $ress[$row['CONTENT_ID']]['lastupdate']=$row["LAST_UPDATE"];
		$ress[]= array(
			'topic'=>$row['TOPIC'],
			'description'=>$row['DESCRIPTION'],
			'cate'=>$row['category_name'],
			'subcate'=>$row['subcategory_name'],
			'lastupdate'=>$row['LAST_UPDATE']
		);

	}
}
if(isset($ress)){  
	$json= json_encode($ress);    
	if(isset($_GET['callback']) && $_GET['callback']!=""){    
		echo $_GET['callback']."(".$json.");";        
	}else{    
		echo $json;    
	}    
}
// echo json_encode($ress);

mysqli_close($conn);


//$conn = new mysqli("webkm", "root", "dbwebkm@2016", "webkm");
//$stmt = $conn->prepare($sql);
//$stmt->bind_param("s", $obj->limit);
//$stmt->execute();
//$result = $stmt->get_result();
//$outp = $result->fetch_all(MYSQLI_ASSOC);

//echo json_encode($outp);
?>