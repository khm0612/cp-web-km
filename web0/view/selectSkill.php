<?php
$servername = 'webkm'; //ชื่อ Host 
$username = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
$password = 'dbwebkm@2016'; // password สำหรับเข้าจัดการฐานข้อมูล
$dbname = 'webkm'; //ชื่อ ฐานข้อมูล

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT SKILL FROM vw_employee_webkm Where EMP_USERNAME=4483874 and EMP_PASSWORD= 4483874";
$result = mysqli_query($conn, $sql);

//var_dump($result);
//print_r($result);
while ($row = mysqli_fetch_assoc($result)) {

    $ress[] = array(
      //'emp_code' => $row['EMP_CODE'],
      //'emp_name_th' => $row['EMP_THA_NAME'],
      'emp_skill' => $row['SKILL']
      
    );
  }
print_r($ress);