<?php
if($_POST){
if($_POST['loan_years'] <=3){
  $loan_amount = $_POST['loan_amount'] * $_POST['loan_years'] ;
  $interest_rate =  $loan_amount *0.1 ;
} else{
  $loan_amount = $_POST['loan_amount'] * $_POST['loan_years'] ;
  $interest_rate =  $loan_amount *0.15 ;
}

  $loan_after_interest = $_POST['loan_amount'] +  $interest_rate ;
  $Monthly = $loan_after_interest / 24 ;
 
  $table = "
  
  <table class='table mt-3'>
  <thead class = 'table-primary'>
    <tr>
      <th scope='col'>User Name</th>
      <th scope='col'>Interest Rate</th>
      <th scope='col'>Loan After Interest</th>
      <th scope='col'>Monthly</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td>
   {$_POST['name']}
    </td>
    <td>{$interest_rate}</td>
      <td>{$loan_after_interest}</td>
      <td>{$Monthly}</td>
    </tr>
  
  
  
  
  ";
          

}






?>
<!doctype html>
<html lang="en">
  <head>
    <title>Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  </head>
  <body>
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-2  ">
        <div class="h1 text-center text-capitalize text-primary mb-4">bank</div>

        <form method="POST">
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?=$_POST['name'] ?? ""?>">
  </div>
  <div class="form-group">
    <label for="loanamount">Loan amouunt</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="loan_amount" value="<?=$_POST['loan_amount'] ?? ""?>">
  </div>
  <div class="form-group">
    <label for="loanyears">Loan Years</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="loan_years" value="<?=$_POST['loan_years'] ?? ""?>">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary offset-4">Calculate</button>
</form>

<?php

if(isset($_POST['submit'])){
echo $table;
}

?>

        </div>
       
    </div>
</div>    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>