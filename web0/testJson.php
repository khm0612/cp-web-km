<?php
require_once("phpChart_Lite\conf.php"); // this must be include in every page that uses phpChart.
//define('SCRIPTPATH','/phpChart_Lite');  // /phpChart/ is the absolute path to the phpChart files assuming phpChart folder is a folder in the web root.

?>
<!DOCTYPE HTML>


<head>
    <script src="bootstrap-5.0.0-beta1-dist/js/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.0.0-beta1-dist/js/maxcdn.js"></script>
    <title>v1</title>
    <!-- <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

        body {
            font-family: 'Prompt', sans-serif;
        }
    </style> -->
    <style>
        .modal-lg {

            max-width: 90%;
            max-height: 80vh;

        }
    </style>
</head>
<?php

error_reporting(0);

//***************************************
// $json= "json.json";
// $contents = file_get_contents('https://callservicechat.gosoft.co.th/ws_billingnotify/getbillingInfoServer.php?wsdl' );
// //$contents = file_get_contents($url);
// $contents = utf8_encode($contents);
// print_r($contents);
// $getJson = json_decode($contents,true);
// print_r($getJson);
$client = new SoapClient("https://callservicechat.gosoft.co.th/ws_billingnotify/getbillingInfoServer.php?wsdl");
$token = 'uaAJrDjhhq38A6JKttfP2dVHPByeutMYCi3VdAjO56J';
$jdata = json_decode($client->getBillingInfo($token), true);
$jdata = $client->getBillingInfo($token);
//print_r($jdata);
$jdata = json_decode($jdata);
$jdata = json_decode(json_encode($jdata), true);
//print_r($jdata['cmsrpt']);
//print_r($jdata);
//echo('<hr>');
//print_r ($jdata['billing']);
?>
<html>

<body>
    <div class="container">
        <table border="3">
            <thead>
                <tr>
                    <th>row_date</th>
                    <th>tkgrp</th>
                    <th>incalls</th>
                    <th>outcalls</th>
                    <th>allinusetime</th>
                    <th>secsperday</th>
                    <th>0</th>

                    <!-- <th>servey</th> -->
                </tr>
                <?php
                //print_r($jdata['billing']);

                // echo ("***NextForEach***<br>");
                //echo ("<hr>");
                echo ("<b>Report</b>");
                foreach ($jdata['cmsrpt'] as $k => $item) {
                    // echo $k;
                    // print_r($item);

                    // echo ($k);
                    // echo "<br>";
                    // //echo $jdata['cmsrpt'][0];
                    // //echo "aaaaaaaaaaaaaa";
                    // echo $item['row_date'];
                    // echo "<br>";
                    // echo $item['tkgrp'];
                    // echo "<br>";
                    // echo $item['incalls'];
                    // echo "<br>";
                    // echo $item['outcalls'];
                    // echo "<br>";
                    // echo $item['allinusetime'];
                    // echo "<br>";
                    // echo $item['secsperday'];
                    // echo "<br>";
                    // echo $item['0'];
                    // echo "<hr>";

                    // echo "------------nextForeach--------";
                    // echo("<br>");
                ?>

                    <?php
                    foreach ($item as $k2 => $item2) {
                        // print_r($item2);
                        // echo 'key_cmsrpt---->';

                        // echo("<br>");
                        // foreach($item2 as $k3 => $item3){
                        //print_r($item2);
                    ?>

                        <?php $display .= "<tr> 
                            <td>" . $item['row_date'] . " </td>
                            <td>" . $item['tkgrp'] . "</td>
                            <td>" .  $item['incalls'] . " </td>
                            <td> " .  $item['outcalls'] . " </td>
                            <td> " .  $item['allinusetime'] . " </td>
                            <td> " .  $item['secsperday'] . " </td>
                            <td> " .  $item[0] . " </td></tr>";
                        ?>
                        
                <?php

                        echo $display;
                        $display = '';
                        // }
                        break;

                        //$pc = new C_PhpChartX(array(array(11, 9, 5, 12, 14)),'basic_chart');
                        //$pc->draw();
                    }
                }
                // echo "<hr>";
                // foreach($item['row_date'] as $k2 => $item2){
                //     echo $item2;
                //     echo "<hr>";
                // }
                //print_r ($item['row_date']);
                // foreach($item['cmsrpt'] as $k =>$cms){
                //    echo $cms;
                // }

                // print_r($item);
                // echo("<hr>");    




                ?>
                <?php
                //print_r($jdata['billing']);
                //print_r($item);
                ?>

                <?php   ?>


            </thead>
            <hr>

        </table>

        <?php
                echo("<hr>");
                echo("<b>anotherReport</b>");
                echo("<hr>");
                ?>
        <table border="3">
            <thead>
                <tr>
                    <th>trunk07</th>
                    <th>trunk44</th>
                    <th>trunk31</th>
                    <th>trunk32</th>
                    <th>trunk33</th>
                    <th>trunk52</th>
                    <th>0</th>

                    <!-- <th>servey</th> -->
                </tr>
                <?php
                foreach ($jdata['billing'] as $b => $bill) {
                    $displays .= "<tr> 
                        <td>" . $jdata['billing']['trunk07'] . " </td>
                        <td>" . $jdata['billing']['trunk44'] . "</td>
                        <td>" . $jdata['billing']['trunk31'] . " </td>
                        <td>" . $jdata['billing']['trunk32'] . "</td>
                        <td>" . $jdata['billing']['trunk07'] . " </td>
                        <td>" . $jdata['billing']['trunk33'] . " </td>
                        <td>" . $jdata['billing']['trunk52'] . " </td>
                        <td>" . $jdata['billing']['0'] . "</td></tr>";
                            ?>
                            <?php

                    echo $displays;
                    $displays = '';
              
                    break;
                }
                ?>
            </thead>
        </table>

    </div>
</body>

</html>