<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class CategoryBindProp extends Model
{
   protected $table='category_bind_props';
   protected $fillable=['id,cid,props'];
}
