

<!doctype html>
<html lang="en">
  <head>
    <title>grade</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
      <div class="row mt-5 border border-primary rounded">
    <div class="col-4 offset-4 mt-5">
      <div class="h2 text-center text-capitalize text-primary mb-4">calculate percentage and grade per year</div>
    <form method="post">
    <div class="form-group">
  <h5 class="text-success">Physics</h5>
<input type="number" name= "physics" class="form-control" id="exampleInputPassword1">
</div>
<div class="form-group">
<h5 class="text-success">Chemistry</h5>
<input type="number" name ="chemistry" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

</div>
<div class="form-group">
  <h5 class="text-success">Biology</h5>
<input type="number" name= "biology" class="form-control" id="exampleInputPassword1">
</div>
<div class="form-group">
  <h5 class="text-success">Mathmatics</h5>
<input type="number" name= "mathmatic" class="form-control" id="exampleInputPassword1">
</div>
<div class="form-group">
  <h5 class="text-success">Computer</h5>
<input type="number" name= "computer" class="form-control" id="exampleInputPassword1">
</div>


<button type="submit" class="btn btn-primary mb-5" name="submit">calculate</button>
</form>
<?php
if(isset($_POST['submit'])){


  $physics = "{$_POST['physics']}";
  $chemistry = "{$_POST['chemistry']}";
  $biology = "{$_POST['biology']}";
  $mathmatic = "{$_POST['mathmatic']}";
  $computer = "{$_POST['computer']}";

$total= 0;

$total = $physics + $chemistry + 
$biology + $mathmatic + $computer ;

    define('maxGrade',500);
    $percentage = 0;
    $percentage = ($total / maxGrade)*100 ;

    if ($percentage >= 90){
        echo " Your Grade Is : Grade A ";
    }
    elseif($percentage <90 && $percentage>=80 ){
        echo " Your Grade Is : Grade B ";
    }
    elseif($percentage <80 && $percentage>=70 ){
        echo " Your Grade Is : Grade C " ;
    }
    elseif($percentage <70 && $percentage>=60 ){
            echo " Your Grade Is : Grade D " ;
    }
    elseif($percentage <60 && $percentage>=40 ){
        echo " Your Grade Is : Grade E ";
    }
    elseif($percentage <40){
        echo " Your Grade Is : Grade F ";
    }

  }
    
    ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>