<!DOCTYPE html>
<html lang="en">
<?php

?>
<head>


    <title>Search in webkm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php
function _sentparamToLocal()
{

    $url = "10.183.252.51/sing9/new/json_search_km_Sing.json";

    $json = file_get_contents($url);
    $json = json_decode($json);
    echo $json;
    #var_dump($json);
}
/*function stripHTML(text) {
    return text.replace(/<.?*>/gm,'');
}*/
function _sentparamToKmDb()
{
    #เช็ค http
    $url = "http://10.183.252.51/sing9/web/json_search_km_Sing.php?x=" . $_POST['x'] ;
    $url = str_replace(" ", '%20', $url);
    $json = file_get_contents($url);   
  //  $json = str_replace("https:",'',$json);
  //  $json = str_replace("table",'',$json);
  //  $json = str_replace("a href",'',$json);
   // $json = str_replace("/r",'',$json);
   // $json = str_replace("/n",'',$json);
   // $json = str_replace("/t",'',$json);
   // $json = str_replace("\r",'',$json);
    //$json = str_replace("\n",'',$json);    
    #stripHTML($json);
    
    #print_r($json);
    #$json = json_decode($json);
    
    //print_r($json);
    echo($json);
    
    #return var_dump($json); 
    //return $jsons;
    /* $url = "http://10.183.252.227/ApiTest/app/json_search_km_Sing.php";
    $options=[
        'ssl' => [
            'cafile' => 'C:\xampp\php\extras\ssl\cacert.pem',
            'verify_peer' => true,
            'verify_peer_name' => true
        ],
    ];
    $context  = stream_context_create($options);*/

    #print_r($json);
    #$json = json_decode($json);
    #echo $json;
    //return var_dump($json);
}
//$aa = _sentparamToKmDb();

//echo "--->". count($aa);
?>
 


<body>
    
            <div class="container mt-3">
                <?/*<form name="" action="<?php echo $_SERVER['PHP_SELF']; ?>" medthod="GET"*/?>
                <h1>Seaarch in webKM</h1>
                <form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <p>
                        <input type="text" name="x" placeholder="input" value="" />
                        <button  type="submit" class="btn-success">submit</button>
                        
                    </p>
                    <?php
                    if (isset($_POST['x'])) {

                        $argument1 = $_POST['x'];
                        _sentparamToKmDb();
                    }
                    ?>

                </form>
    
            </div>
   

    


</body>

</html>