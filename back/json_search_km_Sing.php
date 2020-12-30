<?php


header('Content-Type: application/json');
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: GET-check=0, pre-check=0", false);
//header("Content-Type: application/json; charset=UTF-8");

$servername = 'webkm'; //ชื่อ Host 
$username = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
$password = 'dbwebkm@2016'; // password สำหรับเข้าจัดการฐานข้อมูล
$dbname = 'webkm'; //ชื่อ ฐานข้อมูล

//$_GET['x']='smile';
$_REQUEST['skill'];
$Skill = $_REQUEST['skill'];
$SkillEx2 = explode("|", str_replace('"', '', $Skill));
#$x = $_SESSION['x'];
#$x = $_COOKIE['x'];
$x = $_REQUEST['x'];

$sqlcontenttype = "SELECT * FROM vw_content_webkm    ORDER BY CONTENT_ID DESC LIMIT 70";

//print_r($x);
if ($_GET['x']) {
	$stxt = 'a.TOPIC LIKE "%' . $_GET['x'] . '%" OR a.DESCRIPTION LIKE "%' . $_GET['x'] . '%" OR a.KEYWORD LIKE "%' . $_GET['x'] . '%" ';
} else {
	echo 'nulllllllllllllllll';
}
$sql = 'SELECT * FROM vw_content_webkm WHERE ' . $stxt . 'ORDER BY CONTENT_ID DESC LIMIT 70';

$sqls = 'SELECT a.CONTENT_ID,a.TOPIC,a.DESCRIPTION,a.LAST_UPDATE,a.CONTENT_TYPE_ID,a.SKILL,b.category_name,c.subcategory_name  FROM content_table a LEFT JOIN category_table b ON b.id = a.CATEGORY_ID LEFT JOIN subcategory_table c ON c.id = a.SUBCATEGORY_ID WHERE  ' . $stxt . ' ORDER BY LAST_UPDATE  LIMIT 5';


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, $sqls);
//$result = json_encode($result);
//$result = strip_tags($result);
//print_r($result);

$ress = array();
if (mysqli_num_rows($result) !== null) {

	while ($row = mysqli_fetch_assoc($result)) {
		$ress[] = array(
			'skill' => $row['SKILL'],
		);
		$exp = explode('|', $row['SKILL']);
		


			
			if (array_intersect($SkillEx2, $exp)) {
				$newArray[] = array(
				'topic' => $row['TOPIC'],
				'subcatename' => $row['subcategory_name'],
				'cate_name' => $row['category_name'],
				'description' => $row['DESCRIPTION'],
				//'content_id' => $row['CONTENT_ID'],
					);
					if(empty($newArray[0]['topic'])==null){
						//array_push($newArray['subcatename'],"s2_No_Data-----------------------------");
						$newArray[0]['topic'] = "-----------------------NoData-----------------------";


					}
					if(empty($newArray[0]['topic'])=="null"){
						//array_push($newArray['subcatename'],"s2_No_Data-----------------------------");
						$newArray[0]['topic'] = "-----------------------NoData-----------------------";


					}
					if(empty($newArray[0]['subcatename'])=="null"){
						//array_push($newArray['subcatename'],"s2_No_Data-----------------------------");
						$newArray[0]['subcatename'] = "-----------------------NoData-----------------------";


					}
					if(empty($newArray[0]['subcatename'])==null){
						//array_push($newArray['subcatename'],"s2_No_Data-----------------------------");
						$newArray[0]['subcatename'] = "-----------------------NoData-----------------------";


					}
					if(empty($newArray[0]['description'])==null){
						$newArray[0]['description'] = "-----------------------NoData-----------------------";
						//$a = array($newArray[0]['description']=>"No_data");
						//array_push($a,"d2_No_Data**************************************************");

					}
					if(empty($newArray[0]['cate_name'])=="null"){
						$newArray[0]['cate_name'] = "-----------------------NoData-----------------------";
						//$a = array($newArray[0]['description']=>"No_data");
						//array_push($a,"d2_No_Data**************************************************");

					}
					if(empty($newArray[0]['cate_name'])==null){
						$newArray[0]['cate_name'] = "-----------------------NoData-----------------------";
						//$a = array($newArray[0]['description']=>"No_data");
						//array_push($a,"d2_No_Data**************************************************");

					}
					// if (!empty($newArray[0]['subcatename']) && in_array(1, $newArray[0], true)){
					// 	echo("x");
					// 	//array_push($newArray,"s2_No_Data");

					// }
					// if (!empty($newArray[0]['description']) && in_array(1, $newArray[0], true)){
					// 	echo("x");
					// 	//array_push($newArray[0],"d2_No_Data---------------------------------------------------");

					// }
					
	
				// if($row['category_name']==null){
				// 	array_push($row['category_name'],"No_Data","No_Data");
				// 	//array_push($newArray[0],"No_Data","No_Data");
				// }
				// if($row['DESCRIPTION']==null){
				// 	array_push($row['DESCRIPTION'],"d_No_Data","d_No_Data");
				// }
				// if(empty($row['subcategory_name']==null)){
				// 	array_push($rowsks['subcategory_name'],"s_No_Data","s_No_Data");
				// }
			
		}

			//$json = str_replace('][', ",", json_encode($newArray, JSON_UNESCAPED_UNICODE));
			$json = json_encode($newArray,JSON_UNESCAPED_UNICODE);
			echo($json);
			return $json;
			//echo $json;
			//$jsoned = str_replace('][',"ssss", $jsoned);
		


		// $ress[] = array(
		// 	//'skills' => $row['SKILL'],
		// 	'topic' => $row['TOPIC'],
		// 	//'cate_id' => $rowsks['CONTENT_ID'],

		// 	'cate_name' => $row['category_name'],
		// 	'subcatename' => $row['subcategory_name'],
		// 	'description' => $row['DESCRIPTION'],
		// 	// 'topic' => $row['TOPIC'],
		// 	// //'description' => $row['DESCRIPTION'],
		// 	// 'cate' => $row['category_name'],
		// 	// 'subcate' => $row['subcategory_name'],
		// 	// //'lastupdate' => $row['LAST_UPDATE']
		// );
	}
}
// if (isset($ress)) {
// 	$json = json_encode($ress, JSON_UNESCAPED_UNICODE);
// 	//$sent = $json;
// 	if (isset($_GET['callback']) && $_GET['callback'] != "") {
// 		echo $_GET['callback'] . "(" . $json . ");";
// 	} else {
// 		echo $json;
// 	}
// }
//echo json_encode($ress, JSON_UNESCAPED_UNICODE);
//print_r($x);


mysqli_close($conn);
