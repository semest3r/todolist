<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model 
{
 protected $table = 'login';
 protected $fillable = ['username', 'password'];
 public $timestamps = false;
}
