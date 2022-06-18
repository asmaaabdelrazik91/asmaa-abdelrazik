<?php

 $title = "Number" ;
 include "layouts/header.php";
 

?>
     <div class="container mt-5">
      
      
      
      <div class="row mt-5">
    <div class="col-4 offset-3   mt-5">
      
      <div class="card  mt-5" style="width: 28rem;">
  <div class="card-body"> 
  <form action="Review.php" method="POST">
  <div class="form-group">
    <label for="phonenumber">Phone Number</label>
    <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    <small id="emailHelp" class="form-text text-muted">We'll never share your phone with anyone else.</small>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>   
  </div>
 

    </div>
    
</div>
</div>
  
   <?php
   
   include "layouts/footer.php";
   ?>