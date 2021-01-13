<?php
session_start();

//session_start();
ob_start();
if ($_REQUEST['Id'] == null) {
    Session_Logout();
}
$_REQUEST['Id'] = base64_decode($_REQUEST['Id']);
if ($_REQUEST['Password'] == null) {
    Session_Logout();
}
$_REQUEST['Password'] = base64_decode($_REQUEST['Password']);
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
    header("Location: https://callservicechat.gosoft.co.th/KMSearch/front/login_front.php");
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

        if (mysqli_num_rows($resultSk) > 0) {
            while ($rowSk = mysqli_fetch_assoc($resultSk)) {
                $RessSk[] = array(

                    'skills'   => $rowSk['SKILL'],
                );
            }
        }
        $Skill_Num = ($RessSk[0]['skills']);

        $_SESSION['skill_sent'] = ($RessSk[0]['skills']);

        if ($Skill_Num !== null) {
            $Skill_Num = json_encode($Skill_Num);
            echo $Skill_Num;
            return $Skill_Num;
        }
    }
} else {

    mysqli_close($conn);
}
