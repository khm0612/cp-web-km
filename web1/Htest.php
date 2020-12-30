<?php
//include('include/nevbar.php');
// include('include/includecss.php');
// include('include/includejavascript.php');    
ob_start();
//$_REQUEST['skill'];
$_SESSION['skill_sent'];
$Skill = $_SESSION['skill_sent'];
$_POST['skill'] = $Skill;
//echo $Skill;
// echo $_SESSION['expire'];
// echo $_POST['skill'];
$Skill = $_POST['skill'];
$_SESSION['expire'];
if ($_SESSION['expire'] == null) {
    Session_Logout();
}
if ($Skill == null) {
    Session_Logout();
}
// if($_POST['skill'] == null){
//     Session_Logout();
// }
//echo $_SESSION['expire'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <!-- <script src="https://kit.fontawesome.com/70c6b531cd.js" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    
    <meta charset="UTF-8">
    <title>Home(Week2)</title>


    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="nevbar.php"> -->
    <!-- <link rel="stylesheet" href="web/style.php"> -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> <!-- link เลือก css-->
    <!-- <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css"> -->
    <link rel="stylesheet" href="include/CSS/styles.css?v=<?php echo filemtime('include/CSS/styles.css'); ?>" type=" text/css">
    <link rel="icon" href="img/index/icon.png">
    <title>Main V.0.2</title>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';
        .red{
            color: red;
            font-family: 'Prompt', sans-serif;
        }
        body {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand">
                <h1>Gosoft</h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <div class="container">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <form name="form" class="input-group mb-0" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input class="form-control " type="text" name="x" placeholder="Search" aria-label="Search" value="">
                            <button class="btn btn-success btn-lg" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-primary btn-lg" type="submit" value="">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                </div>
                </ul>
                <form name="form" action="" method="GET" class="d-flex mb-0">
                    <button type="submit" name="Submit1" class="btn btn-warning btn-lg">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    
    <?php
    // $Skill = $_POST['skill'];
    str_replace(' ', '', $Skill);
    //echo $Skill;
    ?>

    <?php
    
    //id        44838374
    //pass      44838374
    //echo $_SESSION['skill_sent'];
    // $now = time();
    // if ($now > $_SESSION['expire']) {
    //     session_destroy();
    //     //echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
    //     Session_Logout();

    // }else{
    ?>
  
        <?/*<form name="" action="<?php echo $_SERVER['PHP_SELF']; ?>" medthod="GET"*/?>



        <?php
 

        if (isset($_POST['x'])) {

            $argument1 = $_POST['x'];
            //_sentparamToKmDb();
            $url = "http://localhost/sing9/web/json_search_km_Sing.php?x=" . $_POST['x'] . "&&skill=" . $_POST['skill'];
            $counts = 0;
            $url = str_replace(" ", '%20', $url);
            $json = file_get_contents($url);
            //echo $json;
            $json = str_replace('][', ",", $json);
            $json = str_replace('[{', "", $json);
            $json = str_replace('}]', "", $json);
            $json = explode('},{', $json);
            foreach ($json as $w => $obj) {
                $obj2 = explode('","', $obj);


                foreach ($obj2 as $w2 => $obj4) {
                    $obj3 = explode('":', $obj4);

                    foreach ($obj3 as $w3 => $result) {
                        // print_r($obj3);
                        str_replace('"', '', $result);

                        $FinResult = str_replace('\r\n', '<br>', str_replace('\/', '/', $result));
                        $FinResult = str_replace('\t', "", $FinResult);
                        //echo($FinResult);
                        if ($w3 == 1) {
                            //echo $FinResult;

                            //  $count = 0;
                            //echo $result;
                            str_replace('"', '', $FinResult);


                            // $counts = 1;
                                                        ?>
                            <div class="container">
                        <div class="accordion-md">
                                    <?php 
                                    $status = false;
                                    $ShowIds = 'S' . $counts;
                                    // $id = 'RES' . $r;
                                    // $ress = '';
                                    // if($w2 == 3 && $obj3[1]){
                                    //     echo $obj3[1];
                                    //     //$counts++;
                                       
                                    if ($counts != 50) {

                                       

                                        echo ('<div class="panel-group">');
                                        echo ('<div class="panel panel-default">');
                                        echo ('<div class="panel-heading">');

                                        if ($w2 == 0 && $obj3[1]) {
                                            
                                            //$counts++;
                                            echo (' <h4 class="panel-title">');
                                            echo ('<a data-toggle="collapse" href="#' . $ShowIds . '">');
                                            $result = str_replace('\r', '', $result);
                                            $result = str_replace('\n', '', $result);
                                            $result = str_replace('"', '', $result);
                                            //$result = str_replace('\/','',$result);
                                            $result = str_replace('/', '', $result);

                                            echo('<div style:"color:red;">');
                                            echo $result;
                                            echo('</div>');
                                            echo ('</a>');
                                            echo ('</h4>');
                                            echo ('<hr>');
                                            
                                        }
                                        
                                        echo ('</div>');
                                        echo ('<div id="' . $ShowIds . '" class="panel-collapse collapse">');
                                        echo ('<ul class="list-group">');


                                        if ($w2 == 1 && $obj3[1]) {
                                            echo ('<li class="list-group-item">');

                                           
                                            $result = str_replace('\r', '', $result);
                                            $result = str_replace('\n', '', $result);
                                            $result = str_replace('"', '', $result);
                                            $result = str_replace('\/', '', $result);
                                            echo ("หมวดหมู่  :");
                                            echo $result;
                                            echo ('</li>');
                                        }
                                       
                                        
                                        if ($w2 == 2 && $obj3[1]) {
                                            //$counts++;

                                            echo ('<li class="list-group-item">');
                                            $result = str_replace('\r', '', $result);
                                            $result = str_replace('\n', '', $result);
                                            $result = str_replace('"', '', $result);
                                            $result = str_replace('\/', '', $result);
                                            //echo("<b>");
                                            echo ("หมวดหมู่ย่อย  :");
                                            echo $result;
                                            echo ('</li>');
                                            if($status == false){
                                                $counts++;
                                            }
                                            ///$counts++;
                                        }
                                        if ($w2 == 3 && $obj3[1]) {
                                            //$counts++;
                                             
                                            echo ('<li class="list-group-item">');
                                            $result = str_replace('\r', '', $result);
                                            $result = str_replace('\n', '', $result);
                                            $result = str_replace('"', '', $result);
                                            $result = str_replace('\/', '', $result);
                                            $result = str_replace('\t', '', $result);
                                            $result = str_replace('</>', '', $result);
                                            $result = str_replace('\\', '', $result);
                                            //$counts++;
                                            
                                                
                                                echo ("<pre>"); 
                                                 //$result = str_replace(',', 'aaaaaaaaa', $result);
                                                //echo $result;
                                                // echo($obj3[1]);
                                                // var_dump($obj3[1]);
                                                echo (strip_tags($result, '<br><p></p><div></div>'));
                                                
                                                echo ("</pre>");
                                                
                                                 echo ("<hr>");
                                                echo ('</li>');
                                                $status = true;
                                                $counts++;
                                                
                                               
                                        }
                                       
                                        
                                        // if($w2 == 4 && $obj3[1]){ 
                                        //      $counts++;
                                        //     echo ('<li class="list-group-item">');
                                        //     echo($result);
                                        //    // echo("inif1");
                                        //     //$counts++;
                                          
                                        //     echo ('</li>');
                                            

                                        // }
                                        echo ('</ul>');
                                        
                                        echo ('</div>');
                                        echo ('</div>');
                                        echo ('</div>');

                                    }
                                    echo ('</div>');
                                        echo ('</div>');
                                    

                                }
                            }
                        }
                        }
                    }
                



                ?>
</form>
                         
    <?php


    $url = "http://localhost/sing9/web/HomeBack.php?skill=" . $_POST['skill'];
    $i = '';
    $r = '';
    $count = 0;
    $jsoned = file_get_contents($url);
    $jsoned = str_replace('][', ",", $jsoned);
    $jsoned = str_replace('[{', "", $jsoned);
    $jsoned = str_replace('}]', "", $jsoned);
    $jsoned = explode('},{', $jsoned);
    // $jsoned = json_decode($jsoned,true);
    // echo $jsoned;
    //print_r($jsoned); 
    foreach ($jsoned as $k => $item) {
        $item2 = explode('","', $item);

        //print_r($item2);
        foreach ($item2 as $k2 => $item4) {
            $item3 = explode('":', $item4);

            // echo"<pre>";
            foreach ($item3 as $k3 => $result) {
                $r++;
                str_replace('"', '', $result);
                //echo($result);
                //echo $k3;
                //echo $k3,'  - ',$result;
                $FinResult = str_replace('\r\n', '<br>', str_replace('\/', '/', $result));
                $FinResult = str_replace('\t', "", $FinResult);
                //echo($FinResult);
                if ($k3 == 1) {


                    // $count = 0;
                    //echo $result;
                    //str_replace('"','',$FinResult);
                    //echo $FinResult;
                    //                                         
    ?>
                    <!-- แสดงตรงนี้นะครับ -->

                    <div class="container">
                        <div class="accordion-md">

                            <?php
                            $id = 'RES' . $r;
                            $ress = '';

                            //    echo $FinResult;

                            if ($count !== 50) {
                                // echo 'innews';
                            ?>



                                <?php
                                $ShowId = 'C' . $count;
                                //echo('<div class="card">');
                                echo ('<div class="panel-group">');
                                echo ('<div class="panel panel-default">');
                                echo ('<div class="panel-heading">');


                                //echo('<div class="card-header" >');
                                if ($k2 == 0 && $item3[1]) {
                                    echo (' <h4 class="panel-title">');
                                    echo ('<a data-toggle="collapse" href="#' . $ShowId . '">');
                                    $result = str_replace('\r', '', $result);
                                    $result = str_replace('\n', '', $result);
                                    $result = str_replace('"', '', $result);
                                    $result = str_replace('\\', '', $result);


                                    //echo("หัวข้อ  :");
                                    echo('<div style:"color:red;">');
                                    echo $result;
                                    echo('</div>');
                                    echo ('</a>');
                                    echo ('</h4>');
                                    echo ('<hr>');
                                    //echo("</b>");

                                }

                                echo ('</div>');
                                echo ('<div id="' . $ShowId . '" class="panel-collapse collapse">');
                                echo ('<ul class="list-group">');
                                if ($k2 == 1 && $item3[1]) {
                                    echo ('<li class="list-group-item">');
                                    $result = str_replace('\r', '', $result);
                                    $result = str_replace('\n', '', $result);
                                    $result = str_replace('"', '', $result);
                                    echo('<div class="red">');
                                    echo('<b>');
                                    echo ("หมวดหมู่  :");
                                    echo $result;
                                    echo('</b>');
                                    echo('</div>');

                                    echo ('</li>');



                                    // echo "<br>";
                                    // echo "test";
                                }
                                if ($k2 == 2 && $item3[1]) {
                                    echo ('<li class="list-group-item">');
                                    $result = str_replace('\r', '', $result);
                                    $result = str_replace('\n', '', $result);
                                    $result = str_replace('"', '', $result);

                                    echo ("หมวดหมู่ย่อย  :");
                                    echo $result;
                                    echo ('</li>');


                                    // echo "<br>";
                                    // echo "test";
                                }
                                //echo('</div>');



                                if ($k2 == 3 && $item3[1]) {

                                    echo ('<li class="list-group-item">');
                                    $result = str_replace('\r', '', $result);
                                    $result = str_replace('\n', '', $result);
                                    $result = str_replace('"', '', $result);
                                    $result = str_replace('\/', '', $result);
                                    $result = str_replace('\t', '', $result);
                                    //$result = str_replace('<b>', '', $result);
                                    //$result = str_replace('</b>', '', $result);
                                    $result = str_replace('\\', '', $result);

                                    //echo('</div>');

                                    //echo('<div class="accordion">');
                                    echo ("<pre>");
                                    echo $result;
                                    echo ("<pre>");
                                    echo ("<hr>");
                                    echo ('</li>');
                                    // echo "<br>";
                                    // echo "test";

                                    $count++;
                                }
                                echo ('</ul>');
                                // echo('<div class="panel-footer">Footer</div>
                                // </div>');
                                echo ('</div>');

                                echo ('</div>');
                                echo ('</div>');



                                ?>






                                <?php
                            }
                            echo ('</div>');

                            echo ('</div>');

                            //นอกลูป
                        }
                    }
                }
            }

                                ?><?php

                                    ?>

                                <?php






                                if (isset($_GET['Submit1'])) {
                                    Session_Logout();
                                }

                                function Session_Logout()
                                {
                                    unset($_SESSION["luser"]);
                                    unset($_SESSION["start"]);
                                    unset($_SESSION["expire"]);
                                    unset($_SESSION["skill_sent"]);

                                    session_destroy();
                                    header("Location: http://10.183.252.51/sing9/web/login_front.php");
                                }
                                ?>
</body>

</html>