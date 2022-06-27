<?php 


namespace App\Database\Models;

use App\Database\Models\Cruds\Crud;
use App\Database\Models\Model;

class Review extends Model implements Crud
{
    private $user_id,$product_id,$rate,$comment,$created_at,$updated_at;

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        $querry =" SELECT * FROM `reviews` WHERE user_id = ? ";
        $statment = $this->conn->prepare($querry);
        $statment->bind_param('i',$this->user_id);
        $statment->execute();
                   return $statment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
       $querry = "INSERT INTO reviews (comment) VALUES (?) WHERE user_id = ?";
       $statment = $this->conn->prepare($querry);
        $statment->bind_param('si',$this->comment,$this->user_id);
       
                   return $statment->execute();
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
   public function create(){

   }

   public function update(){

   }
   
   public function read(){

   }
   public function delete(){

   }
   public function get_reviews(){
    $querry = "SELECT CONCAT(`users`.`first_name`,'',`users`.`last_name`) AS 'full_name',
    `reviews`.`product_id`,
    `reviews`.`rate`,
    `reviews`.`comment`,
    `reviews`.`created_at`,
    `reviews`.`updated_at`
    FROM `reviews`JOIN `users`
    ON `reviews`.`user_id`= `users`.`id`
    WHERE`reviews`.`product_id`= ? " ;
    $statment = $this->conn->prepare($querry);
    $statment->bind_param('i',$this->product_id);
    $statment->execute();
    return $statment;
   }
}




?>