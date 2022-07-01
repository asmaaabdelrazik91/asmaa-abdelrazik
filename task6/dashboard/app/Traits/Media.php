<?php
namespace App\Traits;
 trait Media {
    public function upload_photo($image,$folder)
    {
        $photo_name = $image->hashName();
        $image->move(public_path("images\\{$folder}"), $photo_name);
        return $photo_name;
    }
    public function delete_photo($path){
        if (file_exists($path)) {
            unlink($path);
            return true ;
    }
    return false ;
 }

 }
















?>
