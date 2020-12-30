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
$sql='SELECT * FROM vw_content_webkm ORDER BY CONTENT_ID DESC LIMIT 20';


// Create connection


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while($row = mysqli_fetch_assoc($result)) {
		//echo "topic: " . $row["TOPIC"]. " <br> description : " . $row["DESCRIPTION"]. "<br>";
		// $ress[$row['CONTENT_ID']]['topic']=$row["TOPIC"];
		// $ress[$row['CONTENT_ID']]['description']=$row["DESCRIPTION"];
		// $ress[$row['CONTENT_ID']]['cate']=$row["category_name"];
		// $ress[$row['CONTENT_ID']]['subcate']=$row["subcategory_name"];
		// $ress[$row['CONTENT_ID']]['lastupdate']=$row["LAST_UPDATE"];
		$ress[]= array(
            "<hr>",
            //'id'=>$row['CONTENT_ID'],
			'des'=>$row['DESCRIPTION'],
        );
        //  $ress = json_encode($ress,JSON_UNESCAPED_UNICODE);
        //  $ress = json_decode($ress,JSON_UNESCAPED_UNICODE);
        //echo ($ress[0]['des']);
        

        //echo implode(" ",$ress[0]['des']);

        // preg_match_all('/<img[^>]+>/i',$ress,$resPreg);
        // print_r($resPreg);

        // $tags = $ress->getElementsByTagName('img');
        // foreach($tags as $tag){
        //     echo $tag->getAttribute('src');
        // }
       

    }
    echo count($ress);
    echo("<hr>");
    print_r($ress);
    //echo("<hr>");
    
    
    
}