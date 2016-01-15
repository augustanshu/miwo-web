<?php
namespace App\Tools\Goods;
use View;
use App\Interfaces\Goods\BrandRepositoryInterface;
class Brand
{
	protected $model;
	protected $brandBulider;
	public function __construct(BrandRepositoryInterface $brand)
	{
		$this->model=$brand;
	}
	public function model()
	{
		return $this->model->getModel();
	}
	public function brand($key,$view='default')
	{
		if($key=='all')
		{
		 $brand = $this->model->getBrandAll();
		}
         return View::make("Goods.brand.brand.$view", compact('brand'));
    }
}