<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

class Lampen extends Model
{
 protected $table = 'parts'; // koppelt aan tabel dagmeting
 public $timestamps = false; // tabel bevat geen timestamps
}
