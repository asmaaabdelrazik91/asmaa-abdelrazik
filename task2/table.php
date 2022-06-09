<?php
// dynamic table 10
// dynamic rows 4
// dynamic columns 4
// check if gender of user == m ==> male 1
// check if gender of user == f ==> female 1


// collection => laravel => array of objects
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',


        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]

    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],


    ],
    
];

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Dynamic Table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5 ">
  <table class="table  table-striped table-bordered">
        <thead>
            <tr class="table-info">
        <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobbies</th>
      <th scope="col">activities</th>
          
            </tr></thead>
        <tbody>
            
        <?php foreach($users As $user){ ?>

        <tr>
        <?php 
        
        
        
        foreach($user As $value){ ?>
        
<td><?php

$checkedvalue=gettype($value);
            
if($checkedvalue == "array" || $checkedvalue == "object"){

    settype($checkedvalue, "string");
    if($checkedvalue == "array"){
        foreach($value as $new){
            echo $new ."," ;
        }
    }
    if($checkedvalue == "object"){
        foreach($value as $New){
            echo $New  ;
        
                if($New == 'm'){
                    echo "ale";
                }elseif($New == 'f'){
                    echo "emale";
     
                }
            
        }
        
    }
}
else {
    echo $value ;
}    

 ?></td>
<?php } ?>

          
    </tr>
    <?php } ?>

        </tbody>
    </table></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>