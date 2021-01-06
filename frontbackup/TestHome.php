<?php
//include('include/nevbar.php');
// include('include/includecss.php');
// include('include/includejavascript.php');    
session_start();

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
// if ($_SESSION['expire'] == null) {
//     Session_Logout();
// }
// if ($Skill == null) {
//     Session_Logout();
// }
//echo $_SESSION['expire'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.5.3-dist/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <!-- <script src="https://kit.fontawesome.com/70c6b531cd.js" crossorigin="anonymous"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Home(Week2)</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="web/style.php"> -->

    <title>Main V.0.2</title>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

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


    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h1>ค้นหา</h1>
            </div>
            <div class="card-body">


                <?php

                if (isset($_POST['x'])) {
                    $counts = 0;
                    $argument1 = $_POST['x'];
                    //_sentparamToKmDb();
                    $url = "http://gocalwi01/WsApp/SearchKM/back/json_search_km_Sing.php?x=" . $_POST['x'] . "&&skill=" . $_POST['skill'];
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
                                            // $id = 'RES' . $r;
                                            // $ress = '';
                                            if ($counts !== 10) {

                                                $ShowIds = 'D' . $counts;

                                                echo ('<div class="panel-group">');
                                                echo ('<div class="panel panel-default">');
                                                echo ('<div class="panel-heading">');


                                                if ($w2 == 0 && $obj3[1]) {
                                                    echo (' <h4 class="panel-title">');
                                                    echo ('<a data-toggle="collapse" href="#' . $ShowIds . '">');
                                                    $result = str_replace('\r', '', $result);
                                                    $result = str_replace('\n', '', $result);
                                                    $result = str_replace('"', '', $result);
                                                    //$result = str_replace('\/','',$result);
                                                    $result = str_replace('/', '', $result);
                                                    echo ("</u>");

                                                    echo $result;
                                                    echo ("</u>");

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
                                                    echo ("</u>");

                                                    echo ("หมวดหมู่  :");
                                                    echo $result;
                                                    echo ("</u>");

                                                    echo ('</li>');
                                                }



                                                if ($w2 == 3 && $obj3[1]) {
                                                    echo ('<li class="list-group-item">');
                                                    $result = str_replace('\r', '', $result);
                                                    $result = str_replace('\n', '', $result);
                                                    $result = str_replace('"', '', $result);
                                                    $result = str_replace('\/', '', $result);
                                                    $result = str_replace('\t', '', $result);
                                                    $result = str_replace('</>', '', $result);
                                                    $result = str_replace('\\', '', $result);


                                                    if ($result != null) {
                                                        //echo ("<pre>");
                                                        echo ("</u>");

                                                        echo (strip_tags($result, '<br><p></p><div></div><pre></pre><u></u>'));
                                                        echo ("</u>");

                                                        //echo ("</pre>");
                                                        echo ("<hr>");
                                                        echo ('</li>');
                                                        $counts++;
                                                    }



                                            ?>
                        <?php
                                                }
                                                // $counts++;
                                                //echo ($counts);
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
                                        </div>

                                    </div>

            </div>
        </div>
    </div>





    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h1>ข่าว</h1>
            </div>
            <div class="card-body">
                <?php


                $url = "http://gocalwi01/WsApp/SearchKM/back/HomeBack.php?skill=" . $_POST['skill'];
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

                                        if ($count !== 20) {
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

                                                echo ("</u>");

                                                echo ("หัวข้อ  :");
                                                echo $result;
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
                                                echo ("</u>");

                                                echo ("หมวดหมู่  :");
                                                echo $result;
                                                echo ('</li>');



                                                // echo "<br>";
                                                // echo "test";
                                            }
                                            if ($k2 == 2 && $item3[1]) {
                                                echo ('<li class="list-group-item">');
                                                $result = str_replace('\r', '', $result);
                                                $result = str_replace('\n', '', $result);
                                                $result = str_replace('"', '', $result);
                                                echo ("</u>");

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
                                                $result = str_replace('<b>', '', $result);
                                                $result = str_replace('</b>', '', $result);
                                                $result = str_replace('\\', '', $result);


                                                //echo('</div>');

                                                //echo('<div class="accordion">');\
                                                echo ("</u>");
                                                echo ("เนื้อหา");
                                                echo (strip_tags($result, '<br><p></p><div></div><pre></pre>'));
                                                echo ("</u>");

                                                //echo ("<pre>");
                                                //echo $result;
                                                //echo ("</pre>");
                                                echo ("<hr>");
                                                echo ('</li>');
                                                // echo "<br>";
                                                // echo "test";

                                                $count++;
                                            }
                                            echo ('</ul>');

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
                                                header("Location: https://callservicechat.gosoft.co.th/KMSearch/front/login_front.php");
                                            }
                                            ?>
                                    </div>
                                </div>
            </div>
</body>

</html>