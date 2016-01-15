<?php
namespace App\Repositories\Goods;
use Request;
use URL;
use App\Models\Goods\Brand as Brand;
use App\Interfaces\Goods\BrandRepositoryInterface;
use App\Repositories\BaseRepository;
use DB;
class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
	
   public $tempHolder;
	 
	public function model()
	{
		return 'App\\Models\\Goods\\Brand';
	}
	
	/*
	/联合查询
	/
	*/
	public function getBrandAll()
	{	
           $brand=DB::table('brands')->select('brands.id','brand_name','brand_initial','name','brand_pic')->join('categories','class_id','=','categories.id')->get();

            return $brand;	
	}
	

	

}