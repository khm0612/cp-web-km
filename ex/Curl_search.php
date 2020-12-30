<!DOCTYPE html>
<html lang = "en">
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

function _sentparamToKmDb()
{

    $url = "https://10.183.252.227/ApiTest/app/json_search_km_Sing.php";
    $options=array(
        'ssl'=>array(
        'cafile' => '/path/to/cacert.pem',
        'verify_peer' => true,
        'verify_peer_name' => true,
        ),
        );
        
        
        $context = stream_context_create( $options );

    $json = file_get_contents($url);
    $json = json_decode($json,true);
   #print_r($json);
    #$json = json_decode($json);
    #echo $json;
    #return var_dump($json);
}
/*$con = mysqli_connect("localhost", "root", "", "peawkub");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();*/

?>

<body>
    
    <div class="container mt-3">
    <h1>Seaarch in webKM</h1>
                <form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <p>
                        <input type="text" name="x" placeholder="input" value="" />
                        <button  type="submit" class="btn-success">submit</button>
                    </p>
                    <?php
                    if (isset($_GET['x'])) {

                        $argument1 = $_GET['x'];
                        //_sentparamToKmDb();
                        $url = "https://10.183.252.227/ApiTest/app/json_search_km_Sing.php";
                        curl_setopt($curl_handle, CURLOPT_URL, $url);

                        // This option will return data as a string instead of direct output
                        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

                        // Execute curl & store data in a variable
                        $curl_data = curl_exec($curl_handle);

                        curl_close($curl_handle);

                        // Decode JSON into PHP array
                        $response_data = json_decode($curl_data);

                        foreach ((array) $response_data as $sing){
                            echo "TOPIC: " . $sing->TOPIC;
                        }
                                }
                          ?>

                </form>
    
            </div>
