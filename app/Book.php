<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['user_name', 'email', 'home_page', 'text', 'ip_address', 'user_agent'];

}
