
<?php
header('Content-Type: application/json');
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: GET-check=0, pre-check=0", false);
ob_start();
//$_SESSION['skill_sent'];
//Skill = $_SESSION['skill_sent'];
$_REQUEST['skill'];
$Skill = $_REQUEST['skill'];
if ($Skill == null) {
    Session_Logout();
}
if ($Skill == '') {
    Session_Logout();
}

function Session_Logout()
{
	unset($_SESSION["luser"]);
	unset($_SESSION["start"]);
	unset($_SESSION["expire"]);
	unset($_SESSION["skill_sent"]);

	session_destroy();
	header("Location: https://callservicechat.gosoft.co.th/KMSearch/front/login_front.php");
}
$Db_Servername = 'webkm';
$Db_Username = 'root';
$Db_Password = 'dbwebkm@2016';
$Db_name = 'webkm';

$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}



$SkillEx = explode("|", str_replace('"', '', $Skill));

$sqlcontenttype = "SELECT * FROM vw_content_webkm WHERE CONTENT_TYPE_ID = 1  ORDER BY CONTENT_ID DESC LIMIT 30";

$resultsqlsks = mysqli_query($conn, $sqlcontenttype);

if (mysqli_num_rows($resultsqlsks) !== null) {
	while ($rowsks = mysqli_fetch_assoc($resultsqlsks)) {
		$Resssks[] = array(
			'skillsks' => $rowsks['SKILL'],
		);

		$exp = explode('|', $rowsks['SKILL']);

		if (array_intersect($SkillEx, $exp)) {

			if(empty($rowsks['CATEGORY_NAME'])){
				array_push($rowsks['CATEGORY_NAME'],"No_Data");
			}
			if(empty($rowsks['DESCRIPTION'])){
				array_push($rowsks['DESCRIPTION'],"d_No_Data");
			}
			if(empty($rowsks['SUBCATEGORY_NAME'])){
				array_push($rowsks['SUBCATEGORY_NAME'],"s_No_Data");
			}


			$newArray[] = array(
				'topic' => $rowsks['TOPIC'],
				'subcatename' => $rowsks['SUBCATEGORY_NAME'],
				'cate_name' => $rowsks['CATEGORY_NAME'],
				'description' => $rowsks['DESCRIPTION'],
				//'content_id' => $rowsks['CONTENT_ID'],
				
			);


			 $jsoned = str_replace('][', ",", json_encode($newArray, JSON_UNESCAPED_UNICODE));

			// $jsoned = str_replace('][', "ssss", $jsoned);


			echo $jsoned;
			return $jsoned;
		}
	}
}


?>

