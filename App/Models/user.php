<?php

namespace App\Models;

use Config\Model;

class user extends Model{
    
    protected $table = 'user';
    protected $fields = ['id','name','username'];
    
    
}

?>