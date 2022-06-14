<?php
if($_POST){
}

?>



<!doctype html>
<html lang="en">
  <head>
    <title>supermarket

    </title>
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
        <div class="h1 text-center text-capitalize text-primary mb-4">supermarket</div>

        <form action="" method="POST">
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?=$_POST['name'] ?? ""?>">
  </div>
  <div class="form-group">
  <label for="city">City</label>

  <select class="form-select form-control" aria-label="Default select example" name="city">
  <option selected value="<?=$_POST['city'] ?? ""?>"><?=$_POST['city'] ?? ""?></option>
  <option value="cairo">Cairo</option>
  <option value="giza">Giza</option>
  <option value="alex">Alex</option>
  <option value="others">Others </option>
</select>
</div>
  <div class="form-group">
    <label for="numberofvariables">Number Of varieties</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="varieties" value="<?=$_POST['varieties'] ?? ""?>">
  </div>

  <button type="submit" class="btn btn-primary offset-4" name="enter" value="enterproducts">Enter Products</button> 
  <?php
if(isset($_POST['enter'])){ ?>
<table  class="table mt-5"><thead class="table-primary">
<tr>
  
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr>
</thead>
<tbody>
<?php 
if(isset($_POST['varieties'])){

for($i = 0 ; $i < $_POST['varieties'] ; $i++ ){?>
<tr>
      <td><input type="text" name="productname" class="form-control" value=""></td>
      <td><input type="number" name="price" class="form-control" value=""></td>
      <td><input type="number" name="quantity" class="form-control" value=""></td>
    </tr>
    <?php
        

    } 
  
}?>
</tbody></table>
<button type="submit" class="btn btn-primary offset-4" name="recipt" value="enterproducts">Recipt</button> 
<?php  } ?>

<?php 
if(isset($_POST['recipt'])){ ?>
<table  class="table mt-5"><thead class="table-primary">

<tr>
  
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr> 
    
</thead>
<tbody>
<?php
if(isset($_POST['productname']) && ($_POST['price']) && ($_POST['quantity'])){
  $result =0 ;

for($i = 0 ; $i < $_POST['varieties'] ; $i++ ){?>
<tr>
      <td><?=$_POST['productname'] ?></td>
      <td><?=$_POST['price'] ?></td>
      <td><?=$_POST['quantity'] ?></td>
    </tr>

<?php 

$total =
$_POST['quantity'] * $_POST['price']   ;
$result += $total;

} 
?>
 </tbody></table>
<?php 
switch($_POST['city']){
  case 'cairo' : 
    $delivery = 0;
    break;
    case 'giza' :
      $delivery = 30;
        break;
  case 'alex' :
    $delivery = 50;
    break;
    case 'others' :
      $delivery = 100;
      break;
 }
 $totalBeforediscount =$result ;
if ($totalBeforediscount <1000 ){
$discount = 0 ;
}elseif($totalBeforediscount >=1000 && $totalBeforediscount < 3000){
$discount = 0.1 ;
}
elseif($totalBeforediscount >=3000 && $totalBeforediscount < 4500){

$discount = 0.15 ;
}
elseif($totalBeforediscount > 4500 ){
$discount = 0.2 ;

}
$discountValue = $totalBeforediscount *   $discount ;
$totalAfterdiscount = $totalBeforediscount - $discountValue ;
$finaltotal = $totalAfterdiscount + $delivery ;

?>
<table class="table mt-3">
          <tr>
            <td>User Name</td>
          <td><?php echo $_POST['name'] ?></td>
        </tr>
          <tr>
          <td>city</td>
          <td><?=$_POST['city']?></td>
          </tr>
          <tr>
          <td>Total</td>
          <td><?=$totalBeforediscount?></td>
          </tr>
          <tr>
          <td>Discount</td>
          <td><?=$discountValue?></td>
          </tr>
          <tr>
          <td>Total After Discount</td>
          <td><?=$totalAfterdiscount?></td>
          </tr>
          <tr>
          <td>Delivery</td>
          <td><?=  $delivery ?></td>
          </tr>
          <tr>
          <td class="h5 text-danger ">Final Total</td>
          <td class="h5 text-danger "><?=$finaltotal?></td>
          </tr>
        </table>
<?php }} ?>




        </form>
        </div></div></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>