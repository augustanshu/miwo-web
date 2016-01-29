<?php
namespace App\Tools\Goods;
use View;
use App\Interfaces\Goods\ProductRepositoryInterface;
class Product
{
	protected $model;
	protected $productBulider;
	public function __construct(ProductRepositoryInterface $product)
	{
		$this->model=$product;
	}
	public function model()
	{
		return $this->model->getModel();
	}
	public function product($key,$view='default')
	{
		
    }
}