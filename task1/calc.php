<?php 

$number1 ="";
$number2 = "";
$operator;


if($_POST){
    $number1 = $_POST['number1'] ;
    $number2 =  $_POST['number2'] ;
    $operator =$_POST['op'];
}



?>


<!doctype html>
<html lang="en">
  <head>
    <title>calculator</title>
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
      <div class="h1 text-center text-capitalize text-primary mb-4">calculator</div>
    <form method="post">
<div class="form-group">
<h5 class="text-success">number1</h5>
<input type="number" name ="number1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

</div>
<div class="form-group">
  <h5 class="text-success">number2</h5>
<input type="number" name= "number2" class="form-control" id="exampleInputPassword1">
</div>
<div class="form-group">

<input type="submit" name= "op" class="btn btn-warning" value="+">
<input type="submit" name= "op" class="btn btn-warning" value="-">
<input type="submit" name= "op" class="btn btn-warning" value="*">
<input type="submit" name= "op" class="btn btn-warning" value="/">
<input type="submit" name= "op" class="btn btn-warning" value="^">
</div>

<!-- <button type="submit" class="btn btn-primary mb-5">calculate</button> -->
</form>
<?php 
if(isset($_POST['op'])){
$message =0;

if($operator == "+"){
    $message = $number1 + $number2;

}elseif($operator == "-"){
    $message = $number1 - $number2;

}elseif( $operator == "*"){
    $message = $number1 * $number2;
  
}elseif($operator == "/"){
    $message = $number1 / $number2;

}elseif($operator == "^"){
    $message = $number1 ** $number2;

}
echo "Result is :" .$message ;
}?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>