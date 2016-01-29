<?php
namespace App\Facades\Goods;
use Illuminate\Support\Facades\Facade;
class Product extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'product';
	}
}