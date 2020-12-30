<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
ob_start();

header("Cache-Control: GET-check=0, pre-check=0", false);

?>
<!DOCTYPE html>

<html lang="en">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script href="bootstrap-5.0.0-beta1-dist/maual/js1.js"></script>
<script href="bootstrap-5.0.0-beta1-dist/maual/js2.js"></script>
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"></script>
    <title>Login_front_v.2.0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php


    // include('include/includecss.php');
    // include('include/includejavascript.php')
    ?>
    <style>
        .loginfont {
            font-size: 4em;
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand">
                    <h1>Gosoft</h1>
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>

            </div>
        </div>
    </nav>


    <div class=" zainer-sm">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5  ">
                <div class="card">
                    <div class="card-header">
                        <form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="text-center mb-4">
                                <h1 class="loginfont">LOGIN</h1>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3" style="color: green;">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter your ID" maxlength="30" name="Id" value="" required>
                            </div>
                            <div class="input-group mb-4 ">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key " style="color: black;"></i></div>
                                </div>
                                <input type="text" class="form-control" name="Password" placeholder="Enter your password" maxlength="20" value="" required>
                            </div>

                            <div class="col-12">
                                <center>
                                    <div class="g-recaptcha" data-callback="recaptChcallback" data-sitekey="6LdTCAIaAAAAAEeuGqenbzt6ICBumt1yqh7E1OO9"></div>
                                </center>
                            </div>


                            <br>
                            <button class="btn-lg btn-success btn-block" id="submit" name="submit" type="submit">Login</button>
                        </div>
                        <?php
                        error_reporting(0);
                        try {
                            if (isset($_POST['Id']) && isset($_POST['Password'])) {
                                $url = 'http://10.183.252.68/sing9/web/login_back.php?Id=' . $_POST['Id'] . '&&Password=' . $_POST['Password'];

                                $json = file_get_contents($url);

                                $check_num = str_replace('|', ',', $json);
                               // $jsoned = json_encode($json);
                                //echo($jsoned);
                                echo $json;
                                $Skill = $json;
                                //echo $json;
                                //print_r($Skill);

                                //$Skill = $_POST[$Skill];
                                //$_POST['skill_sent'] = $Skill;
                                // $_COOKIE['skill_sent'] = $Skill;
                                $_SESSION['skill_sent'] = $Skill;
                                //$_SESSION['skill_sent'] = $Skill;

                                //$_SERVER['skill_sent'] = $Skill;
                                //print_r($_POST['skill_sent']);
                                //echo($_POST['skill_sent']);
                                //session_start();
                                //$arg1 = $_POST['Id'];
                                //$arg2 = $_POST['Password'];
                                //$Login_Result = true;\
                                //echo("  in front-if  ");
                                // $_SESSION['skills_j']=$jsoned;
                                // echo $_SESSION['skills_j'];


                                //var_dump($json);
                                $word = "expire";
                                if ($json !== null) {
                                    //strpos($jsoned,$word) !== false
                                    //echo(" in Login_Result ");
                                    //echo($loginB);

                                    //$_SESSION['skill_sent'] = $Skill;
                                    //$Skill = $_SESSION['skill_sent'];
                                    $_SESSION['skill_sent'] = $Skill;
                                    //echo $_SESSION['skill_sent'];
                                    //secho $Skill;
                                    if ($_SESSION['skill_sent'] !== null) {



                                        $_POST['skill'] = $Skill;


                                        $_SESSION['start'] = time();
                                        $_SESSION['expire'] = $_SESSION['start'] + (60 * 5);
                                        //echo $_SESSION['expire'];
                                        $_POST['skill'];

                                        if ($json != null) {
                                            header("Location: http://10.183.252.68/sing9/web/Home.php");
                                        } else {
                                        }
                                    }
                                } else {
                                    echo (":: in Front Else");
                                    // print_r($_POST['Id']);
                                    //print_r($_POST['Password']);
                                }
                            } else {
                                //echo ("Error-font");
                            }
                            //$authF = $_REQUEST['expire'];
                            //echo $authF;
                        } catch (Exception $e) {
                            echo 'Caught exception: ',  $e->getMessage(), "\n";
                        }
                        ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>
<script>
    function recaptChcallback() {
        $("#submit").removeAttr("disabled");
    }
</script>