
<?php
ob_start();

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sh/eet');

// session_start();
$_REQUEST['pathFile'];
$_REQUEST['pathFile'] = str_replace('%20',' ',$_REQUEST['pathFile']);
$_REQUEST['pathFile'] = urldecode($_REQUEST['pathFile']);

$pathFile = urldecode($_REQUEST['pathFile']);
// $try = 'file:///C:/Users/vitta/Desktop/excel.xlsx';

// $try = str_replace('xlsx','json',$try);

//rename('xlsx','json',$try);
// $try = file_get_contents($try);
// echo $try;
//readfile($try);
// Prepare Tmp File for Zip archive
$zip = new ZipArchive;
$name = 'test_new.zip';
if ($zip->open('test_new.zip', ZipArchive::CREATE) === TRUE) {

    $zip->addFromString(basename($pathFile), file_get_contents($pathFile));
    // All files are added, so close the zip file.
    $path = 'test_new.zip';
    //sing9\web'.$name.'
    $file = file_get_contents($path);
    $file = base64_encode($file);
    $file = json_encode($file);
    //     $file = json_decode($file);
    echo $file;


    //$zip->close();
}
//var_dump( $zip);
// echo  $zip;
// header('Content-Type: application/zip');
// header('Content-Length: ' . filesize($try));
// header('Content-Disposition: attachment; filename="file.zip"');
// readfile($try);
// unlink($try);

// echo base64_encode($try);
// echo ("<hr>");
// $decode =  base64_decode($try);
//file_put_contents('file:///C:/Users/vitta/Desktop/test_new.zip',$zip);
//readfile($decode);
// echo $decode;

// $zip = new ZipArchive();

// $DelFilePath="first.zip";

// if(file_exists($_SERVER['DOCUMENT_ROOT']."/sing9/web".$DelFilePath)) {

//         unlink ($_SERVER['DOCUMENT_ROOT']."/sing9/web".$DelFilePath); 

// }
// if ($zip->open($_SERVER['DOCUMENT_ROOT']."/sing9/web".$DelFilePath, ZIPARCHIVE::CREATE) != TRUE) {
//         die ("Could not open archive");
// }
//     $zip->addFile($try,"excel");

// // close and save archive

// $zip->close(); 
?>
<?php

//echo $try;

// $zip = new ZipArchive();
// // $filename = "./test112.zip";

// if ($zip->open($try, ZipArchive::CREATE)!==TRUE) {
//     exit("cannot open <$try>\n");
// }

// $zip->addFromString("testfilephp.txt" . time(), "#1 This is a test string added as testfilephp.txt.\n");
// $zip->addFromString("testfilephp2.txt" . time(), "#2 This is a test string added as testfilephp2.txt.\n");
// $zip->addFile('file:///C:/Users/vitta/Desktop/ '. "/too.php","/testfromfile.php");
// echo "numfiles: " . $zip->numFiles . "\n";
// echo "status:" . $zip->status . "\n";
// $zip->close();



//$try = file_get_contents($file);
// if (file_exists($try)) {
//    header('Content-Description: File Transfer');
//    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//    header('Content-Disposition: attachment; try$try="'.basename($try).'"');
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate');
//    header('Pragma: public');
//    header('Content-Length: ' . filesize($try));
//    //$download = readfile($try);
//    $json = json_encode(readfile($try));
//    //$download = json_encode($download);
//    //echo $download;
//    exit;
// }

//readfile($file);
// $_REQUEST['FilePath'];
//$path = $_REQUEST['FilePath'];
// header('Content-Type: application/json');
// header("Content-type:application/json; charset=UTF-8");

//$file = 'file:///C:/Users/vitta/Desktop/a.jpg';
//$file = readfile($excellFile);
// $excellFile = json_encode($excellFile);
// $type = pathinfo($excellFile, PATHINFO_EXTENSION);
//readfile($file);
// if (file_exists($file)) {
//    header('Content-Description: File Transfer');
//    header('Content-Type: application/jpeg');
//    header('Content-Disposition: attachment; filename='.basename($file));
//    header('Content-Transfer-Encoding: binary');
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//    header('Pragma: public');
//    header('Content-Length: ' . filesize($file));
//    ob_clean();
//    flush();
//    readfile($file);
//    exit;
// }
// if(file_exists($filename)){

//    //Get file type and set it as Content Type
//    $finfo = finfo_open(FILEINFO_MIME_TYPE,$filename);
//    header('Content-Type: ' . finfo_file($finfo, $filename));
//    finfo_close($finfo);

//    //Use Content-Disposition: attachment to specify the filename
//    header('Content-Disposition: attachment; filename='.basename($filename));

//    //No cache
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate');
//    header('Pragma: public');

//    //Define file size
//    header('Content-Length: ' . filesize($filename));

//    ob_clean();
//    flush();
//    readfile($filename);
//    exit;
// }
//echo $file;





// $path = $path;
// $type = pathinfo($path, PATHINFO_EXTENSION);
// $data = file_get_contents($path);
//$base64 = base64_encode($data);
// xls = pd.ExcelFile('path_to_file.xls')
// df1 = pd.read_excel(xls, 'Sheet1')
// df2 = pd.read_excel(xls, 'Sheet2')
// echo "$type";
// echo "<br>";
// echo "$base64";
// echo "<br>";
// convert image to base64
?>
 
 <?php
 //echo $_REQUEST['Name'];
    // echo $base64;
    // echo '<hr>';
   //  $jsonPic = json_encode($data);
   //  echo $data;
   //  // echo $jsonPic;
    // return $jsonPic;
