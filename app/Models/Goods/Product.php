<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['id','name','price','props','input_str','input_pids','cid','code'];
	public $model1;
	
	public function bindprops()
	{
		$model1=$this->hasOne('App\Models\Goods\CategoryBindProp','cid','cid');
		return $model1;
	}
}
