<?php 


 $title = "Review" ;
 include "layouts/header.php";
  $_SESSION['number'] =$_POST['number'] ;
    
?>

<div class="container mt-5">
      
      
      
      <div class="row mt-5">
    <div class="col-12  mt-5">
    <form action="Result.php" method="POST">
  <div class="form-group ">  
<table class="table">
  <thead class ="table-primary">
    <tr>
      <th scope="col">Question</th>
      <th scope="col">Bad</th>
      <th scope="col">Good</th>
      <th scope="col">Very Good</th>
      <th scope="col">Excellent</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"  class="text-primary">Are you satisfied with the level of cleanliness?</th>
      <td><input type="radio"   name="name1" value="0"> </td>
      <td><input type="radio"  name="name1"  value="3"></td>
      <td><input type="radio"  name="name1"  value="5"></td>
      <td><input type="radio"  name="name1"  value="10"> </td>

    </tr>
    <tr>
      <th scope="row"  class="text-primary">Are you satisfied with the service price ?</th>
      <td><input type="radio" value="0" name="name2"></td>
      <td><input type="radio" value="3" name="name2"> </td>
      <td><input type="radio" value="5" name="name2"> </td>
      <td><input type="radio" value="10" name="name2"></td>

    </tr>
    <tr>
      <th scope="row"  class="text-primary">Are you satisfied with the nurssing service?</th>
      <td><input type="radio" value="0" name="name3"> </td>
      <td><input type="radio" value="3" name="name3"> </td>
      <td><input type="radio" value="5" name="name3"> </td>
      <td><input type="radio" value="10" name="name3"></td>

    </tr>
    <tr>
      <th scope="row"  class="text-primary">Are you satisfied with the level of doctors in the hospital?</th>
      <td> <input type="radio" value="0" name="name4"></td>
      <td> <input type="radio" value="3" name="name4"></td>
      <td> <input type="radio" value="5" name="name4"></td>
      <td> <input type="radio" valuue="10" name="name4"></td>

    </tr>
    <tr>
      <th scope="row"  class="text-primary">Are you satisfied with the level of calm in the hospital?</th>
      <td> <input type="radio" value="0" name="name5"></td>
      <td><input type="radio" value="3" name="name5"> </td>
      <td> <input type="radio" value="5"  name="name5"></td>
      <td> <input type="radio" value="10"  name="name5"></td>
    </tr>
   
  </tbody>
</table>
<button type="submit" class="btn btn-primary  btn-block">Check</button>
</form>
    </div></div></div>

<?php 


// function sumresult($value1 , $value2 , $value3 , $value4 ,$value5 ) {
// return $value1 + $value2 + $value3 + $value4 + $value5  ;
// }

// $_SESSION['$result'] = $result;






   include "layouts/footer.php";

?>