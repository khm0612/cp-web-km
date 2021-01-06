<?php
// ob_start();
// session_start();
header('Content-Type: application/json');
header("Content-type:application/json; charset=UTF-8");

$path = 'http://webkm/kcfinder/upload/images/Capture%28438%29.JPG';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = base64_encode($data);
// echo "$type";
// echo "<br>";
// echo "$base64";
// echo "<br>";
// convert image to base64
?>

<?php
// echo $base64;
// echo '<hr>';
$jsonPic = json_encode($base64);
echo $jsonPic;
return $jsonPic;
// echo("<br>");
// echo("Sdddddddddddddddddddddddd");
// $jsonPic = json_decode($jsonPic);
// // echo $jsonPic;
// // echo '<hr>';

// //$jsonPic = json_decode($jsonPic);
// // echo $jsonPic;
// // Define the Base64 value you need to save as an image
// $b64 = $base64;

// // Obtain the original content (usually binary data)
// $bin = base64_decode($b64);
// // echo $bin;

// // Gather information about the image using the GD library
//  $size = getImageSizeFromString($bin);
// // print_r($size);
// // // Check the MIME type to be sure that the binary data is an image
// if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
//     die('Base64 value is not a valid image');
// }

// // // Mime types are represented as image/gif, image/png, image/jpeg, and so on
// // // Therefore, to extract the image extension, we subtract everything after the “image/” prefix
//  $ext = substr($size['mime'], 6);
//  //echo("<br>");
// // echo $ext;
// // // Make sure that you save only the desired file extensions
// if (!in_array($ext, ['png', 'gif', 'jpeg'])) {
//     die('Unsupported image type');
// }
// echo '<img src="data:image/gif;base64,' . $jsonPic . '" />';
// // // Specify the location where you want to save the image
// //  $img_file = "file:///C:/Users/vitta/Desktop/New folder (4)/sasddf.{$ext}";

// // // Save binary data as raw data (that is, it will not remove metadata or invalid contents)
// // // In this case, the PHP backdoor will be stored on the server
// // echo file_put_contents($img_file, $bin);
// // echo("<hr>");
// // echo("<href='file:///C:/Users/vitta/Desktop/New folder (4)/sasddf.{$ext}'>");
// // // convert base64 string to image
// ?>
