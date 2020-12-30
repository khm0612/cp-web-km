<!DOCTYPE html>
<html lang="en">
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

    <body>
        <div class="container mt-3">
            <h1>Search in webkm</h1>

            <form name="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="input-group mb-3 input-group-lg">
                    <input type="text" class="form-control" placeholder="Search" name="txt">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="submit"><i class="fa fa-bug"></i></button>  
                    </div>
                </div>

            </form>

            <div id="showData"></div>
        </div>

        

        <script type="text/javascript">
            $(function(){
                var txt="<?php echo $_POST['txt']; ?>";
                var x='';
                if(txt.length>0){
                    x='?x='+txt;
                }
                $.getJSON("http://localhost/sing9/web/Test/json_search_kmOG.php"+x,function(data){
                    if(data!=null && data.length>0){ // ถ้ามีข้อมูล
                    var ress='';
                    var rf=1;
                    ress+='<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $.each(data,function(idx,obj){
                        ress+='<div class="card">';
                            ress+='<div class="card-header" role="tab" id="heading'+rf+'">';
                                ress+='<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse'+rf+'" aria-expanded="true" aria-controls="collapse'+rf+'">';
                                    ress+='<h5>'+data[idx].topic+'</h5>';
                                 ress+='</a>';
                                
                                ress+='<p style="font-size:9pt;color:#aaaaaa;"> Category : <span style="color:#0000AF;">'+data[idx].cate+'</span>&nbsp;&nbsp;&nbsp;';
                                ress+='Sub-Category : <span style="color:#0000AF;">'+data[idx].subcate+'</span>&nbsp;&nbsp;&nbsp;';
                                ress+='Last update : <span style="color:#0000AF;">'+data[idx].lastupdate+'</span></p>';
                                
                            ress+='</div>';

                            ress+='<div id="collapse'+rf+'" class="collapse" role="tabpanel" aria-labelledby="heading'+rf+'" data-parent="#accordionEx">';
                                ress+='<div class="card-body">';
                                ress+=data[idx].description;
                                ress+='</div>';
                            ress+='</div>';

                        ress+='</div>';
                        rf++;
                        });
                    ress+='</div>'
                    $("#showData").html(ress);
                    }
                });
            });
        </script>

    </body>
</html>
