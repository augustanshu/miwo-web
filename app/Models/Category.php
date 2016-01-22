<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
 #protected $table='categories';   //
 protected $fillable=['name','parent_id','is_parent','id','description','order','type_id'];
 protected $guard=[];
 protected $dates=['delete_at'];
 
 public function __construct()
 {
	 parent::__construct();
 }
}
