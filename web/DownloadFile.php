<?php
error_reporting(0);
ob_start();
$_REQUEST['auth'];
// $_REQUEST['skill'];
// echo $_SESSION;
if ($_REQUEST['auth'] == null) {
    Session_Logout();
}

// if ($Skill == null) {
//     Session_Logout();
// }
function Session_Logout()
{
    session_unset();
    //session_destroy();
    session_write_close();
    unset($_SESSION["luser"]);
    unset($_SESSION["start"]);
    unset($_SESSION["expire"]);
    unset($_SESSION["skill_sent"]);

    session_destroy();
    header("Location: http://10.183.252.68/sing9/web/login_front.php");
}
$_REQUEST['File'] = urldecode($_REQUEST['File']);
$_REQUEST['name'] = urldecode($_REQUEST['name']);
$File = $_REQUEST['name'];
$name = $_REQUEST['File'];
$File = urldecode($File);
$name = urldecode($name);
$name = str_replace('%20', ' ', $name);
$File = str_replace('%20', ' ', $File);


$result = file_get_contents('http://10.183.252.68/sing9/web/fileback.php?pathFile=' . $File);
// $result = str_replace('%20','',$result);

$result =  json_decode($result);
$result = base64_decode($result);
// $name = urldecode($name);
//file_put_contents($name, $result);
// $name = urldecode($name);
//$dir = realpath($name);

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" .  urldecode(basename($name)) . "\"");
// $$dir = urldecode($$dir);

readfile($name);
