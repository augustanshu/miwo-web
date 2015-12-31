<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsClass extends Model
{
   
 protected $table='goodsclasses';   //
 protected $fillable=['name','parent_id'];
 protected $guard=['order'];
 protected $dates=['delete_at'];
 public function scopePopular($query)
 {
	 return $query->where('order','>=','0');
 }
}
