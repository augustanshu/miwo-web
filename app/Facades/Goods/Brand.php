<?php
namespace App\Facades\Goods;

use Illuminate\Support\Facades\Facade;

class Brand extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'brand';
	}
}