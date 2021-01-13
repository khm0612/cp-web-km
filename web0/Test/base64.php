<?php
$str = 'Hello';
$encod =  base64_encode($str);
echo $encod;
$decod =  base64_decode($encod);
echo("<hr>");
echo $decod;