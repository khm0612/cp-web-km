<?php
$a = '{topic},{testYopic1["subtopic":"hello111"]}';
echo $a;
echo "<hr>";

$a = explode('},{',$a);
print_r($a) ;
echo "<hr>";

$a = explode('[',$a[1]);
$a = str_replace(']}','',$a);
$a = explode('":"',$a[1]);
$a = str_replace('"','',$a[1]);

print_r($a);