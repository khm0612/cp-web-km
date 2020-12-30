<?php
//$_SESSION['skill_sent'];
//Skill = $_SESSION['skill_sent'];



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
			'topic'=>$row['DESCRIPTION']
        
        );
        $row = json_encode($row,JSON_UNESCAPED_UNICODE);
        print_r( $row);

    }
    
}