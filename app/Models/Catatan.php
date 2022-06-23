<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model 
{
 protected $table = 'catatan';
 protected $primaryKey = 'id';
 protected $fillable = ['nama_catatan', 'deskripsi', 'date'];
 public $timestamps = false;
}
