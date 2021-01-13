
<?php
session_start();
ob_start();

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sh/eet');

// session_start();
$_REQUEST['pathFile'];
$_REQUEST['pathFile'] = str_replace('%20',' ',$_REQUEST['pathFile']);
$_REQUEST['pathFile'] = urldecode($_REQUEST['pathFile']);
// $try = 'file:///C:/Users/vitta/Desktop/excel.xlsx';
$pathFile = urldecode($_REQUEST['pathFile']);

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
}

?>
