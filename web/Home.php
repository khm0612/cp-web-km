<?php

ob_start();
ini_set('memory_limit', '-1');
// error_reporting(0);
$_SESSION['skill_sent'];
$Skill = $_SESSION['skill_sent'];
$_POST['skill'] = $Skill;

$Skill = $_POST['skill'];
$_SESSION['expire'];
$expireSent = $_SESSION['expire'];
$auth = 'true';
// if ($_SESSION['expire'] == null) {
//     Session_Logout();
// }
// if ($Skill == null) {
//     Session_Logout();
// }

// pathinfo();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="bootstrap-5.0.0-beta1-dist/js/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.0.0-beta1-dist/js/maxcdn.js"></script>
    <title>Main V.1</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        .modal-lg {

            max-width: 90%;
            max-height: 80vh;

        }
    </style>
</head>
<?php

function d0wNl0AD($name)
{
    $_REQUEST['File'];
    $File = $_REQUEST['File'];
    $result = file_get_contents('http://10.183.252.68/sing9/web/fileback.php?pathFile=' . $File);
    $result =  json_decode($result);
    $result = base64_decode($result);

    file_put_contents($name, $result);
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($name) . "\"");
    readfile($name);
}

?>

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
                    $url = "http://10.183.252.68/sing9/web/search_bar.php?x=" . $_POST['x'] . "&skill=" . $_POST['skill'];
                    //$url = str_replace(" ", '%20', $url);
                    $json = file_get_contents($url);
                    //print_r($json);
                   // print_r($json);
                    
                    if ($_POST['x']!=null){
                       
                        //echo $url;
                        $json = str_replace('][', ",", $json);
                        $json = str_replace('[{', "", $json);
                        $json = str_replace('}]', "", $json);
                        $json = explode('},{', $json);
                        //----------------------------------------------

                        $displays = '';
                        foreach ($json as $l => $item) {
                            $cont = '';
                            //if ($l != 40) {
                            $item2 = explode('","', $item);

                            $a = 0;

                            //$l++;
                            //print_r($item);
                            foreach ($item2 as $l2 => $item4) {
                                $item3 = explode('":', $item4);

                                $a++;
                                if ($a == 1) {
                                   // print_r($item3);
                                    if($item3[0]==null){
                                        unset($item3);
                                    }
                                    //$toopics = null;
                                    $toopics = $item3[1];
                                    $toopics = str_replace('\r', '', $toopics);
                                    $toopics = str_replace('\n', '', $toopics);
                                    $toopics = str_replace('"', '', $toopics);
                                    $toopics = str_replace('\\', '', $toopics);
                                    $toopics = str_replace('/', '', $toopics);
                                    $toopics = str_replace('\/', '', $toopics);

                                    $displays = '<u type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrops' . $l . '"><h5>' . $toopics . '</h5>
                                         </u>';
                                    echo $displays;

                                    $displays = '';
                                }
                                if ($a == 2) {
                                    //$subcatt =  null;
                                    $subcatts = $item3[1];
                                    $subcatts = str_replace('\r', '', $subcatts);
                                    $subcatts = str_replace('\n', '', $subcatts);
                                    $subcatts = str_replace('"', '', $subcatts);

                                    //echo("********");
                                    echo ("<hr>");
                                    //$displays.=$item3[1].'<hr>';
                                }
                                if ($a == 3) {
                                    //$catt = null;
                                    $catts = $item3[1];
                                    $catts = str_replace('\r', '', $catts);
                                    $catts = str_replace('\n', '', $catts);
                                    $catts = str_replace('"', '', $catts);
                                    $catts = str_replace('\/', '', $catts);

                                    //$displays.=$item3[1].'<hr>';
                                }
                                if ($a == 4) {
                                    // $dessc = null;
                                    $desscs = $item3[1];
                                    $desscs = str_replace('\r', '', $desscs);
                                    $desscs = str_replace('\n', '', $desscs);
                                    $desscs = str_replace('"', '', $desscs);
                                    $desscs = str_replace('\t', '', $desscs);
                                    $desscs = str_replace('\\', '', $desscs);
                                    $desscs = str_replace('/kcfinder', 'http://webkm/kcfinder', $desscs);
                                    $desscs = str_replace('alt=', ' class="img-fluid" ', $desscs);
                                    $doc = new DOMDocument();
                                    @$doc->loadHTML($desscs);
                                    $tags = $doc->getElementsByTagName('img');
                                    foreach ($tags as $tag) {

                                        $picPath = $tag->getAttribute('src');

                                        $getPicUrl = "http://10.183.252.68/sing9/web/PicBack.php?picPath=" . $picPath;
                                        $picJson = file_get_contents($getPicUrl);
                                        $picJson = json_decode($picJson);
                                        // echo $picJson;
                                        $desscs =  str_replace($picPath, 'data:image/gif;base64,' . $picJson . ' ', $desscs);

                                        // if ($desscs != null) {

                                        //     $debase64 = base64_decode($picJson);
                                        //     $size = getImageSizeFromString($debase64);

                                        //     if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
                                        //         // die('Base64 value is not a valid image');
                                        //     }

                                        //     $ext = substr($size['mime'], 6);

                                        //     if (!in_array($ext, [
                                        //         'png', 'gif', 'jpeg', 'JPG',
                                        //     ])) {
                                        //         die('Unsupported image type');
                                        //     }
                                        //     $z = 1;
                                        //     $img_file = "file:///D:/pic/{$z}.{$ext}";

                                        //     file_put_contents($img_file, $debase64);
                                        //     $z++;
                                        // }
                                    }
                                }

                                if ($a == 5) {
                                    //$catt = null;
                                    $Files = $item3[1];
                                    // $Files = str_replace('\r', '', $Files);
                                    // $Files = str_replace('\n', '', $Files);
                                    $Files = str_replace('"', '', $Files);
                                    // $Files = str_replace('\/', '', $Files);
                                    $tempPaths = $Files;

                                    $putInDisplays = 'Nofile';
                                    if ($Files != null) {
                                        $Files =  'http://webkm/attfile/' . $tempPaths;

                                        // $name = 'downloadFile.zip';
                                        $names = $tempPaths;
                                        $putInDisplays = '<a href="http://10.183.252.68/sing9/web/DownloadFile.php?File=' . $Files . '&name=' . $names . '&auth='.$auth.' " ><button class="btn1" download ><i class="fa fa-download"></i>download</button></a>';
                                    }
                                    //$displays.=$item3[1].'<hr>';
                                    $displays .= '<div class="modal fade" id="staticBackdrops' . $l . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">' . $toopics . '</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <b>หมวดหมู่ :</b><br>' . $catts . '<br><b>หมวดหมู่ย่อย :</b><br>' . $subcatts . '<hr>' . $desscs . '<hr> ' . $putInDisplays . ' <hr>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>';

                                    $l++;
                                    echo $displays;
                                }
                            }
                        }
                    }

                ?>

                    </form>
            </div>

        </div>

    
<?php } ?>
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


            $url = "http://10.183.252.68/sing9/web/HomeBack.php?skill=" . $_POST['skill'];
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
            $display = '';
            foreach ($jsoned as $k => $item) {
                $cont = '';
                if ($k != 500) {
                    $item2 = explode('","', $item);

                    $j = 0;


                    //$k++;
                    //print_r($item2);
                    foreach ($item2 as $k2 => $item4) {
                        $item3 = explode('":"', $item4);
                        //                  ORIGINAL--      $item3 = explode('":', $item4);

                        // print_r($item3);
                        // echo "<hr>";
                        // print_r($item4);

                        $j++;
                        if ($j == 1) {
                            $toopic = null;
                            $toopic = $item3[1];
                            $toopic = str_replace('\r', '', $toopic);
                            $toopic = str_replace('\n', '', $toopic);
                            $toopic = str_replace('"', '', $toopic);
                            $toopic = str_replace('\\', '', $toopic);
                            $toopic = str_replace('/', '', $toopic);
                            $toopic = str_replace('\/', '', $toopic);

                            $display .= '<u type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop' . $k . '"><h5>' . $toopic . '</h5>
                                 </u>';
                            //echo $display;
                            // $display = '';

                            //<div class="d-grid gap-2"> </div>
                            //$display.=$item3[1].'<hr>';
                        }
                        if ($j == 2) {
                            //$subcatt =  null;
                            $subcatt = $item3[1];
                            $subcatt = str_replace('\r', '', $subcatt);
                            $subcatt = str_replace('\n', '', $subcatt);
                            $subcatt = str_replace('"', '', $subcatt);

                            //echo("********");
                            echo ("<hr>");
                            //$display.=$item3[1].'<hr>';
                        }
                        if ($j == 3) {
                            //$catt = null;
                            $catt = $item3[1];
                            $catt = str_replace('\r', '', $catt);
                            $catt = str_replace('\n', '', $catt);
                            $catt = str_replace('"', '', $catt);
                            $catt = str_replace('\/', '', $catt);

                            //$display.=$item3[1].'<hr>';
                        }
                        if ($j == 4) {
                            // $dessc = null;
                            $dessc = $item3[1];
                            $dessc = str_replace('\r', '', $dessc);
                            $dessc = str_replace('\n', '', $dessc);
                            $dessc = str_replace('"', '', $dessc);
                            $dessc = str_replace('\t', '', $dessc);
                            $dessc = str_replace('\\', '', $dessc);
                            $dessc = str_replace('/kcfinder', 'http://webkm/kcfinder', $dessc);
                            $dessc = str_replace('alt', '', $dessc);
                            $doc = new DOMDocument();
                            @$doc->loadHTML($dessc);
                            $tags = $doc->getElementsByTagName('img');
                            foreach ($tags as $tag) {

                                $picPath = $tag->getAttribute('src');

                                $getPicUrl = "http://10.183.252.68/sing9/web/PicBack.php?picPath=" . $picPath;
                                $picJson = file_get_contents($getPicUrl);
                                $picJson = json_decode($picJson);
                                $dessc =  str_replace($picPath, 'data:image/gif;base64,' . $picJson . ' ', $dessc);
                                $picName = basename($picPath);
                                if ($dessc != null) {

                                    $debase64 = base64_decode($picJson);
                                    $sizes = getImageSizeFromString($debase64);

                                    // if (empty($sizes['mime']) || strpos($sizes['mime'], 'image/') !== 0) {
                                    //     // die('Base64 value is not a valid image');
                                    // }

                                    // $exts = substr($sizes['mime'],6);

                                    // if (!in_array($exts, [
                                    //     'png', 'gif', 'jpeg','JPG'
                                    // ])) {
                                    //     // die('Unsupported image type');
                                    // }
                                    // $CPic = '';

                                    $img_files = "file:///C:/Users/vitta/Desktop/cahesPic/" . $picName . ".png";
                                    $img_files = str_replace('%20', ' ', $img_files);
                                    //$CPic++;
                                    //file_put_contents($img_files, $debase64);
                                }
                                //$CPic++;
                            }
                            //$dessc = strip_tags($dessc);


                            //$display.='<pre>'.$item3[1].'</pre><hr>';
                        }
                        if ($j == 5) {
                            //$catt = null;
                            $File = $item3[1];
                            // $File = str_replace('\r', '', $File);
                            // $File = str_replace('\n', '', $File);
                            $File = str_replace('"', '', $File);
                            // $File = str_replace('\/', '', $File);
                            $tempPath = $File;
                            // echo $tempPath;
                            $putInDisplay ='noFile';
                            if ($File != null) {
                                $File =  'http://webkm/attfile/' . $tempPath;

                                // $name = 'downloadFile.zip';
                                $name = $tempPath;
                                $putInDisplay = '<a href="http://10.183.252.68/sing9/web/DownloadFile.php?File=' . $File . '&name=' . $name . '&auth='.$auth.' " ><button class="btn1" download ><i class="fa fa-download"></i>download</button></a>';
                            }

                            //$displays.=$item3[1].'<hr>';
                            $display .= '<div class="modal fade" id="staticBackdrop' . $k . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">' . $toopic . '</h5>
                                                            <p type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
                                                            </div>
                                                            <div class="modal-body">
                                                            <b>หมวดหมู่ :</b><br>' . $catt . '<br><b>หมวดหมู่ย่อย :</b><br>' . $subcatt . '<hr>' . $dessc . '<hr>'.$putInDisplay.'<hr>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>';

                            $k++;
                            echo $display;
                            $display = '';
                        }
                    }


                    // $k++;
                    //$k++;
                    //echo $display;
                    //echo("---");

                    //echo $display;
                    //echo $k;
                }
            }






            if (isset($_GET['Submit1'])) {
                Session_Logout();
            }

            function Session_Logout()
            {
                session_unset();
                //session_destroy();
                session_write_close();
                unset($_SESSION["luser"]);
                unset($_SESSION["start"]);
                unset($_SESSION["expire"]);
                unset($_SESSION["skill_sent"]);

                session_destroy();
                header("Location: http://10.183.252.68/sing9/web/login_front.php");
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>