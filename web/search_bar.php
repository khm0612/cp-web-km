
<?php
header('Content-Type: application/json');
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: GET-check=0, pre-check=0", false);
ob_start();
//$_SESSION['skill_sent'];
//Skill = $_SESSION['skill_sent'];
$_REQUEST['x'];
$_REQUEST['skill'];
$Skill = $_REQUEST['skill'];
// if ($Skill == null) {
//     Session_Logout();
// }
// if ($Skill == '') {
//     Session_Logout();
// }
//echo $_GET['x'];
function Session_Logout()
{
	unset($_SESSION["luser"]);
	unset($_SESSION["start"]);
	unset($_SESSION["expire"]);
	unset($_SESSION["skill_sent"]);

	session_destroy();
	header("Location: http://10.183.252.68/sing9/web/login_front.php");
}
$Db_Servername = 'webkm';
$Db_Username = 'root';
$Db_Password = 'dbwebkm@2016';
$Db_name = 'webkm';

$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//TOPIC LIKE '%hotline%'
$stxt = 'TOPIC LIKE "%' . $_REQUEST['x'] . '%" OR DESCRIPTION LIKE "%' . $_REQUEST['x'] . '%" OR KEYWORD LIKE "%' . $_REQUEST['x'] . '%" ';
$Content = null;
//echo $_REQUEST['x'];
if ($_REQUEST['x'] = !null) {
	$key = $_REQUEST['x'];
	$C = "TOPIC LIKE '%" . $_REQUEST['x'] . "%'  ";
	$T = "TOPIC LIKE '%hot%' ";
	$W = "hotline";
	//Session_Logout();
}
// if($_REQUEST['x']==null){
// 	$_REQUEST['x']="counter";
// }
// if(is_string($_REQUEST['x'])){
// 	$_REQUEST['x'] = "hotline";
// }
// if(is_string($_REQUEST['x'])){
// 	$_REQUEST['x'] = "hotline";
// }
// else{
//     echo "Content = null";
//     $C = null;
//     $T = "AS<>SAD<<>%ASD=/asd>Z8*";
//     $conn = "SAD";
//     $resultsqlsks = 125;
//     break;
// }
// hotline
// '". $_REQUEST['x'] ."'
$SkillEx = explode("|", str_replace('"', '', $Skill));

$sqlcontenttype = "SELECT * FROM vw_content_webkm WHERE TOPIC LIKE '%" . $_GET['x'] . "%' OR KEYWORD LIKE '" . $_GET['x'] . "' OR DESCRIPTION LIKE '%" . $_GET['x'] . "%'  ORDER BY CONTENT_ID  LIMIT 40 ";
//echo $sqlcontenttype;
$resultsqlsks = mysqli_query($conn, $sqlcontenttype);

if (mysqli_num_rows($resultsqlsks) !== null) {
	while ($rowsks = mysqli_fetch_assoc($resultsqlsks)) {
		$Resssks[] = array(
			'skillsks' => $rowsks['SKILL'],
		);

		$exp = explode('|', $rowsks['SKILL']);

		if (array_intersect($SkillEx, $exp)) {

			if (empty($rowsks['CATEGORY_NAME'])) {
				array_push($rowsks['CATEGORY_NAME'], "No_Data");
			}
			if (empty($rowsks['DESCRIPTION'])) {
				array_push($rowsks['DESCRIPTION'], "d_No_Data");
			}
			if (empty($rowsks['SUBCATEGORY_NAME'])) {
				array_push($rowsks['SUBCATEGORY_NAME'], "s_No_Data");
			}


			$newArray[] = array(
				'topic' => $rowsks['TOPIC'],
				'subcatename' => $rowsks['SUBCATEGORY_NAME'],
				'cate_name' => $rowsks['CATEGORY_NAME'],
				'description' => $rowsks['DESCRIPTION'],
				//'content_id' => $rowsks['CONTENT_ID'],

			);
			$nextArray[] = array(
				'description' => $rowsks['DESCRIPTION'],

			);


			$jsoned = str_replace('][', ",", json_encode($newArray, JSON_UNESCAPED_UNICODE));
			$jsonedDes = json_encode($newArray, JSON_UNESCAPED_UNICODE);
			// $jsoned = str_replace('][', "ssss", $jsoned);



		}
	}
	echo $jsoned;
	return $jsoned;
	//echo $jsonedDes;
}


?>

