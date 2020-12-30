<?php
include('include/nevbar.php');
include('include/includecss.php');
include('include/includejavascript.php');    
ob_start();
    //$_REQUEST['skill'];
    $_SESSION['skill_sent'];
    $Skill = $_SESSION['skill_sent'];
    $_POST['skill'] = $Skill;
    //echo $Skill;
    // echo $_SESSION['expire'];
    // echo $_POST['skill'];
    $Skill = $_POST['skill'];
    $_SESSION['expire'];
    //echo $_SESSION['expire'];


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>GFG User Details</title>

    
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="nevbar.php">
    <link rel="stylesheet" href="web/style.php">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> <!-- link เลือก css-->
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="include/CSS/styles.css?v=<?php echo filemtime('include/CSS/styles.css'); ?>"
        type=" text/css">
    <link rel="icon" href="img/index/icon.png">
    <title>Main V.0.2</title>
    </head>

    <body>

    <div class="container">
        <form name="form" action="" method="GET">
            <button type="submit" class="btn-success" name="Submit1">logout</button>
        </form>
    </div>
    <?php
    // $Skill = $_POST['skill'];
    str_replace(' ','',$Skill);
    //echo $Skill;
    ?>
    
    <?php
    //id        44838374
    //pass      44838374
    //echo $_SESSION['skill_sent'];
    // $now = time();
    // if ($now > $_SESSION['expire']) {
    //     session_destroy();
    //     //echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
    //     Session_Logout();

    // }else{
        ?>
        <?php
        $url = "http://10.183.252.51/sing9/web/HomeBack.php?skill=" . $_POST['skill'];
        $i='';
        $r='';
        $count=0;
            $jsoned = file_get_contents($url);
            $jsoned = str_replace('][',",", $jsoned);
            $jsoned = str_replace('[{',"", $jsoned);
            $jsoned = str_replace('}]',"", $jsoned);
            $jsoned = explode('},{',$jsoned);
            // $jsoned = json_decode($jsoned,true);
            // echo $jsoned;
               //print_r($jsoned); 
               foreach($jsoned as $k=>$item){
                   $item2 = explode('","',$item);
                   
                   //print_r($item2);
                foreach($item2 as $k2=>$item4){
                    $item3 = explode('":',$item4);
                    
                    // echo"<pre>";
                    foreach($item3 as $k3=>$result){
                        $r++;
                        str_replace('"','',$result);
                        //echo($result);
                        //echo $k3;
                        //echo $k3,'  - ',$result;
                        $FinResult = str_replace('\r\n','<br>',str_replace('\/','/',$result));
                        $FinResult = str_replace('\t',"",$FinResult);
                        //echo($FinResult);
                        if($k3 == 1){
                            
                            
                            // $count = 0;
                            //echo $result;
                            //str_replace('"','',$FinResult);
                            //echo $FinResult;
                            ?> 
                                   <!-- แสดงตรงนี้นะครับ -->
                            <div class="container"  >
                                
                                       
                                           <?php 
                                           $id='RES'.$r;
                                           $ress = '';
                                           
                                        //    echo $FinResult;
                                                
                                               if($count !==20){
                                                 echo('<div class="card">');
                                                 
                                                
                                                echo('<div class="card-header" >');
                                                 //echo('<div class="card-body">');
                                                // echo($result)
                                                // echo('<div class="card">');   
                                                //echo($FinResult);
                                                //echo($k2);
                                                //topic
                                                //echo $item3[1];
                                                //print_r($item3[0]);
                                                // if($k2==0){
                                                //     //echo $FinResult;

                                                //     echo $item3[1];
                                                //     //$k2=1;
                                                //     echo $k2;
                                                //     $k2=1;
                                                //     if($k2==1&&$item3[1]){
                                                //     $result = str_replace('\r','',$result);
                                                //     $result = str_replace('\n','',$result);
                                                //     $result = str_replace('"','',$result);
                                                //     echo $result;
                                                //     // echo "<br>";
                                                //     // echo "test";
                                                // }
                                                //}
                                                
                                                
                                                

                                                if($k2==0&&$item3[1]){
                                                    $result = str_replace('\r','',$result);
                                                    $result = str_replace('\n','',$result);
                                                    $result = str_replace('"','',$result);
                                                    
                                                    echo $result;
                                                }
                                                    
                                                    
                                                //     // echo "<br>";
                                                //     // echo "test";
                                                // }
                                                // // //echo('</div>');
                                                // // //echo('</div>');
                                                // // //subcate
                                                if($k2==1&&$item3[1]){
                                                    $result = str_replace('\r','',$result);
                                                    $result = str_replace('\n','',$result);
                                                    $result = str_replace('"','',$result);
                                                    echo $result;
                                                    // echo "<br>";
                                                    // echo "test";
                                                }
                                                
                                                
                                                //description
                                                if($k2==2&&$item3[1]){
                                                    $result = str_replace('\r','',$result);
                                                    $result = str_replace('\n','',$result);
                                                    $result = str_replace('"','',$result);
                                                    $result = str_replace('\/','',$result);
                                                    $result = str_replace('\t','',$result);
                                                    $result = str_replace('<b>','',$result);
                                                    $result = str_replace('</b>','',$result);




                                                    echo $result;
                                                    // echo "<br>";
                                                    // echo "test";
                                                }
                                               

                                                
                                               //echo"test";
                                                //echo $item3[0];
                                                
                                                // if($k2==0&&$item3[2]){
                                                //     $result = str_replace('\r','',$result);
                                                //     $result = str_replace('\n','',$result);
                                                //     $result = str_replace('"','',$result);
                                                //     echo $result;
                                                // }
                                                $count++;
                                                
                                                
                                                //continue;
                                               } 
                                               //echo("test");
                                               echo('</div>');
                                               echo('</div>');
                                               echo('</div>');
                                               echo('</div>');
                                               echo('</div>');
                                               echo('</div>');

                                           //echo $FinResult;

                                                ?> 
                                           </div>
                                           <!-- <div class="card-body">
                                               ลอง2
                                           </div>
                                           <div class="card-body">
                                               ลอง3
                                           </div> -->
                                      
                               
                                   
                                 
                            <?php
                        }?>
                        
                        
                            
                            <?php
                            
                      
                    }
                    // print_r($item3);
                     //echo"<hr>";
                }
                
                //echo"<hr style='border-top: 2px double #FF2222;'>";
                ?>
               
                                    <?php
               }
                    // echo $k3;
                                            //echo $result;
                                            //print_r($item3);
                                            //echo '<div id="div' . $i .'">' . $result . '<div>';
                                        // $i++;
                                            //echo"<br>";
                                            //echo $i;


            //echo $jsoned;

            //$jsoned = str_replace('&quot;', '"', $jsoned);

            //$arr = json_decode($jsoned);
            // var_dump($arr);
            //echo($jsoned);
            // print_r($arr);
            // foreach($jsoned as $item){
            //     $topic = $item['topic'];
            //     $cate_id = $item['cate_id'];
            //     $sub_catename = $item['subcatename'];
            //     $cate_name = $item['cate_name'];
            // }
            
            //$jsoned = json_encode($jsoned,JSON_UNESCAPED_UNICODE);
            //$jsoned = json_decode($jsoned,true);
            
            // $ss=(is_array($jsoned))? 'OK':'NO';
            // echo $ss;
            //echo($jsoned);

            //echo $yummy['topic'][0]['cate_name ']; //Maple

            //$jsoned = json_decode($json,JSON_UNESCAPED_UNICODE);
            //print_r($json);
            //print_r($jsoned);
            //var_dump($jsoned);
            
            // $jsoned = (strip_tags($jsoned,'<p><br>'));
            // $jsoned = str_replace('\t',"", $jsoned);
            // $jsoned = str_replace('\n',"", $jsoned);
            // $jsoned = str_replace('\r',"", $jsoned);
            // $jsoned = str_replace('(',"", $jsoned);
            // $jsoned = str_replace(')',"", $jsoned);
            // $jsoned = str_replace('\=',"", $jsoned);
            // $jsoned = str_replace('{',"[", $jsoned);
            // $jsoned = str_replace('}',"]", $jsoned);

            //echo $jsoned;   
            //echo $jsoned;
            //echo str_replace('"', "'", $jsoned);


            //  var_dump($jsoned);
    //}
    ?>
    
 
   
    
  



<body>

    <?php
    
    if(isset($_GET['Submit1'])){
        Session_Logout();
    }

    function Session_Logout(){
        unset($_SESSION["luser"]);
        unset($_SESSION["start"]);
        unset($_SESSION["expire"]);
        unset($_SESSION["skill_sent"]);

        session_destroy();
        header("Location: http://10.183.252.51/sing9/web/login_front.php");
        
    }
    ?>
    </body>

</html>