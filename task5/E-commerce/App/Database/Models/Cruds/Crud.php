<?php
namespace App\Database\Models\Cruds;

interface Crud {
    function create();

    function update();
   
    function read();
    function delete();
   
}