<?php
//session_start();
ob_start();

if ($_REQUEST['Id'] == null) {
    Session_Logout();
}
if ($_REQUEST['Password'] == null) {
    Session_Logout();
}
$Id = $_REQUEST['Id'];
$Password = $_REQUEST['Password'];
$Db_Servername = 'webkm';
$Db_Username = 'root';
$Db_Password = 'dbwebkm@2016';
$Db_name = 'webkm';
function Session_Logout()
                                            {
                                                unset($_SESSION["luser"]);
                                                unset($_SESSION["start"]);
                                                unset($_SESSION["expire"]);
                                                unset($_SESSION["skill_sent"]);

                                                session_destroy();
                                                header("Location: http://localhost/sing9/web1/login_front.php");
                                            }
$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM vw_employee_webkm Where EMP_USERNAME='" . $Id . "' and EMP_PASSWORD='" . $Password . "' ";
$result = mysqli_query($conn, $sql);

$sqlSk = " SELECT SKILL FROM vw_employee_webkm WHERE EMP_USERNAME='" . $Id . "' and EMP_PASSWORD='" . $Password . "' ";
$resultSk = mysqli_query($conn, $sqlSk);


if (mysqli_num_rows($result) == 1) {
    if (mysqli_num_rows($resultSk) == 1) {
        //echo("  Respond ResultSk  ----------- ");
        if (mysqli_num_rows($resultSk) > 0) {
            while ($rowSk = mysqli_fetch_assoc($resultSk)) {
                $RessSk[] = array(
                    // 'emp_code' => $row['EMP_CODE'],
                    //'emp_pass' => $row['EMP_PASSWORD'],
                    'skills'   => $rowSk['SKILL'],
                );
            }
        }
        $Skill_Num = ($RessSk[0]['skills']);

        $_SESSION['skill_sent'] = ($RessSk[0]['skills']);
        //echo(" expire time left :");
        //echo("<pre>");
        //echo($_SESSION['expire']);
        //$expire = $_GET['expire'];
        //echo ($expire);
        //$auths = "true";
        //header('../Home.php');
        //echo("<br>");
        //echo(" Success");
        //echo("<br>");
        if ($Skill_Num !== null) {
            $Skill_Num = json_encode($Skill_Num);
            echo $Skill_Num;
            return $Skill_Num;
            //echo'inif';
        }

        //return $Skill_Num;

    }
} else {
    // echo("  auth-fail");
    //var_dump($row['EMP_USERNAME']);
    //var_dump($row['EMP_USERNAME']);
    //var_dump($_GET['emp_pass']);
    //var_dump($ress['emp_id']);
    //echo($_GET['emp_id']);
    //print_r($RessId);
    //var_dump($RessPassword);
    mysqli_close($conn);
}
/*echo("ID:");
print_r($_GET['Id']);
echo("   Password:");
print_r($_GET['Password']);
echo("   expire in:");*/

//echo($_SESSION['expire']);


//เทียบ DB ถ้ามี Search
/*if ($Id) {
	$Result_Search_Db = 'a.TOPIC LIKE "%' . $_GET['x'] . '%" OR a.DESCRIPTION LIKE "%' . $_GET['x'] . '%" OR a.KEYWORD LIKE "%' . $_GET['x'] . '%" ';
} else {
	echo 'Wrong';
}*/