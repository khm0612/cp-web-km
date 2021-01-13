<html>
<?php
ob_start();
//header('Content-Type: application/json');
//header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: GET-check=0, pre-check=0", false);   
echo $_SESSION['skill_sent'];

?>
</html>