<?php

$client = new SoapClient("https://callservicechat.gosoft.co.th/ws_billingnotify/getbillingInfoServer.php?wsdl");
$token='uaAJrDjhhq38A6JKttfP2dVHPByeutMYCi3VdAjO56J';
$jdata = json_decode($client->getBillingInfo($token),true);
$jdata = $client->getBillingInfo($token);

//***************************************
/*
$json= "json.json";
$contents = file_get_contents($json);
//$contents = file_get_contents($url);
$contents = utf8_encode($contents);
$getJson = json_decode($contents,true);
print_r($getJson);
*/
print_r($jdata);
?>