<?php

namespace App\HTTP\Requests;

use App\Database\Models\Model;

class validation {

    private array $errors = [] ;
private $value_name ;
private $value ;

    public function required(){
if(empty($this->value)){
$this->errors[$this->value_name][__FUNCTION__] = $this->value_name ." is Required" ;
}
return $this ;
    }
    public function max(int $max){
      if(strlen($this->value) > $max)  {
        $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ."is greater than " .$max ." Character" ;

      }
      return $this ;
    }
    public function unique(string $table , string $col){
        $model = new Model ;
        $query = "SELECT * FROM {$table} WHERE {$col} = ?" ;
        $statment = $model->conn->prepare($query);
        $statment->bind_param('s',$this->value);
        $statment->execute();
      if ( $statment->get_result()->num_rows != 0 ){
        $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ." Is Already Existe" ;

      }
      return $this ;
    }
    
    
    public function regex(string $pattern){
        if(!preg_match($pattern,$this->value)){
        $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ." Invalid " ;

        }
        return $this ;
    }
    public function in(array $values){
        if(!in_array($this->value,$values)){
            $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ."Must be in" .implode(",",$values) ;

        }
        return $this ;
    }

    public function existes(string $table,string $col){

        $model = new Model ;
        $query = "SELECT * FROM {$table} WHERE {$col} = ?" ;
        $statment = $model->conn->prepare($query);
        $statment->bind_param('s',$this->value);
        $statment->execute();
      if ( $statment->get_result()->num_rows == 0 ){
        $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ." Is Not Existe" ;

      }
      return $this ;
    }
    public function confirmed($comparedvalue){
        if($this->value != $comparedvalue){
            $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ."is Not Confirmed" ;
   
        }
        return $this ;

    }

/**
 * Set the value of value_name
 *
 * @return  self
 */ 
public function setValue_name($value_name)
{
$this->value_name = $value_name;

return $this;
}

/**
 * Set the value of value
 *
 * @return  self
 */ 
public function setValue($value)
{
$this->value = $value;

return $this;
}

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    public function getError(string $error)
    {
        if(isset($this->errors[$error])){
            foreach($this->errors[$error] as $error){
            return "<p class='uppercase font-weight-bold text-danger'>" .$error ."</p>";
            }
        }
        return null;
    }



public function num_digit(int $num_digit){
    if(strlen($this->value) != $num_digit)  {
      $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ." Must be Equal to  " .$num_digit ." Digits" ;

    }
    return $this ;
  }
  public function int(){
    if(!ctype_digit($this->value)){
      $this->errors[$this->value_name][__FUNCTION__] = $this->value_name ." Must be Integer" ;

    }
    return $this ;
  }

}