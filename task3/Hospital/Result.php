<?php


$title = "Result";
include "layouts/header.php";
$value1 ; $value2 ; $value3 ; $value4 ; $value5 ;
switch($_POST["name1"]) {
    case "0":
        $value1 = 0;
        break;
    case "3":
        $value1 = 3;
        break;
    case "5":
        $value1 = 5;
        break;
        case "10":
            $value1 = 10;
            break;
    // default:
    //     $value1 = "No radio has been selected for name1";
}
$_SESSION ['name1'] =   $value1 ;
switch($_POST['name2']) {
    case "0":
        $value2 = 0;
        break;
    case "3":
        $value2 = 3;
        break;
    case "5":
        $value2 = 5;
        break;
        case "10":
            $value2 = 10;
            break;
    // default:
    //     $value2 = "No radio has been selected for name2";
}
$_SESSION ['name2'] =   $value2 ;

switch($_POST['name3']) {
    case "0":
        $value3 = 0;
        break;
    case "3":
        $value3 = 3;
        break;
    case "5":
        $value3 = 5;
        break;
        case "10":
            $value3 = 10;
            break;
    // default:
    //     $value3 = "No radio has been selected for name3";
}
$_SESSION ['name3'] =   $value3 ;

switch($_POST['name4']) {
    case "0":
        $value4 = 0;
        break;
    case "3":
        $value4 = 3;
        break;
    case "5":
        $value4 = 5;
        break;
        case "10":
            $value4 = 10;
            break;
    
}
$_SESSION ['name4'] =  $value4 ;

switch($_POST['name5']) {
    case "0":
        $value5 = 0;
        break;
    case "3":
        $value5 = 3;
        break;
    case "5":
        $value5 = 5;
        break;
        case "10":
            $value5 = 10;
            break;
    // default:
    //     $value5 = "No radio has been selected for name5";
}
$_SESSION ['name5'] =   $value5 ;




function  sum( $x ,  $y , $z , $f , $d){
    return $x +  $y + $z + $f + $d ;
}









?>






<div class="container mt-5">



    <div class="row mt-5">
        <div class="col-12  mt-5">
           
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Review</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-primary">Are you satisfied with the level of cleanliness?</th>
                                <td>
                                   <?php 
                                   switch($_SESSION['name1']) {
                                    case "0":
                                        echo "bad";
                                        break;
                                    case "3":
                                        echo "good";
                                        break;
                                    case "5":
                                        echo "very good";
                                        break;
                                        case "10":
                                            echo "Excellent";
                                            break;
                                        }
                                   
                                   ?> 
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-primary">Are you satisfied with the service price ?</th>
                                <td>
                                <?php 
                                   switch($_SESSION['name2']) {
                                    case "0":
                                        echo "bad";
                                        break;
                                    case "3":
                                        echo "good";
                                        break;
                                    case "5":
                                        echo "very good";
                                        break;
                                        case "10":
                                            echo "Excellent";
                                            break;
                                        }
                                   
                                   ?> 
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" class="text-primary">Are you satisfied with the nurssing service?</th>
                                <td>
                                <?php 
                                   switch($_SESSION['name3']) {
                                    case "0":
                                        echo "bad";
                                        break;
                                    case "3":
                                        echo "good";
                                        break;
                                    case "5":
                                        echo "very good";
                                        break;
                                        case "10":
                                            echo "Excellent";
                                            break;
                                        }
                                   
                                   ?> 
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" class="text-primary">Are you satisfied with the level of doctors in the hospital?</th>
                                <td>
                                <?php 
                                   switch($_SESSION['name4']) {
                                    case "0":
                                        echo "bad";
                                        break;
                                    case "3":
                                        echo "good";
                                        break;
                                    case "5":
                                        echo "very good";
                                        break;
                                        case "10":
                                            echo "Excellent";
                                            break;
                                        }
                                   
                                   ?> 
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" class="text-primary">Are you satisfied with the level of calm in the hospital?</th>
                                <td>
                                <?php 
                                   switch($_SESSION['name5']) {
                                    case "0":
                                        echo "bad";
                                        break;
                                    case "3":
                                        echo "good";
                                        break;
                                    case "5":
                                        echo "very good";
                                        break;
                                        case "10":
                                            echo "Excellent";
                                            break;
                                        }
                                   
                                   ?> 
                                </td>

                            </tr>
                            <tr>
                            <th scope="row" class="table-primary" >Total Review</th>

                                <td  class="table-primary" >
<?php 
 if(sum($_SESSION ['name1'] , $_SESSION ['name2'] , $_SESSION ['name3'] , $_SESSION ['name4'] , $_SESSION ['name5']) < 25){
    echo "<h2>bad</h2>" ;

}else{
    echo "<h2>Good</h2>" ;

}
?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                   
<div class=" btn-primary  btn-block text-center"><?php
if(sum($_SESSION ['name1'] , $_SESSION ['name2'] , $_SESSION ['name3'] , $_SESSION ['name4'] , $_SESSION ['name5']) < 25){
    echo "<h2 class='text-danger'>We Will Call you later on this number</h2>" .$_SESSION['number'];

}else{
    echo "<h2 class='text-success'>Thank you</h2>" ;

}


?></div>            
    </div>
</div>
