<!-- Button trigger modal -->

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
  <script href="bootstrap-5.0.0-beta1-dist/maual/js1.js"></script>
  <script href="bootstrap-5.0.0-beta1-dist/maual/js2.js"></script>


  <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Main V.1</title>
  <!-- <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

        body {
            font-family: 'Prompt', sans-serif;
        }
    </style> -->
</head>
<!-- Button trigger modal -->
<?php 
for($i=1;$i<10;$i++){
  echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop',$i,'">
  Launch static backdrop modal ',$i,'
</button><br>';
}
?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        modalBody<?php echo $i; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>