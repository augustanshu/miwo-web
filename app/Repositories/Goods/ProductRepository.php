<?php
namespace App\Repositories\Goods;
use Request;
use URL;
use App\Models\Goods\Product as Product;
use App\Interfaces\Goods\ProductRepositoryInterface;
use App\Repositories\BaseRepository;
use DB;
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
	
   public $tempHolder;
	 
	public function model()
	{
		return 'App\\Models\\Goods\\Product';
	}
	
    
	/*
	*返回绑定的Prop表值（暂时没用）
	*
	*
	*/
	 /*
    public function hasOneC($model)
	{
		return $model->hasOne('App\Models\Category','id','cid');
	}
	*/
	
	/**
	*返回绑定的Prop属性值
	*
	*
	*/
	public function getBinds($model)
	{
	     $result=DB::table('products')
	     ->join('categories','products.cid','=','categories.id')
		 ->select(1)
		 ->select('products.*','categories.name as cname')
		 ->where('products.id',$model->id)		 
		 ->get();
		  return $result;
	}
	
	
	/**
    *通过props中的PID返回绑定的属性
	*
	*
	*
	*/
	public function _getProp($pid)
	{
		$result=DB::table('category_item_props')
		->select('*')
		->where('id',$pid)
		->get();
		return $result;
	}
	
    /**
    *通过props中的VID返回绑定的属性值
	*
	*
	*
	*/
	public function _getValue($vid)
	{
		$result=DB::table('category_prop_values')
		->select('*')
		->where('id',$vid)
		->get();
		return $result;
	}
	
	    /**
    *通过props中可枚举PID值获取其下的可选值
	*
	*
	*
	*/
	public function _getEnum($pid)
	{
		$result=DB::table('category_prop_values')
		->select('*')
		->where('pid',$pid)
		->get();
		return $result;
	}
	
	/*
	*获取可枚举的商品属性以及值
	*
	*
	*/
	public function getPropEnumValue($model)
	{
			$product=$model;
			$props=explode(',',$product->props);
			$array=[];
			foreach($props as $prop)
			{
				$item=explode(':',$prop);
				$pid=intval($item[0]);
				$vid=intval($item[1]);
				$p=$this->_getProp($pid);
				$v=$this->_getValue($vid);
				$s=$this->_getEnum($pid);
				$val=array($p[0],$v[0]->id,$s);
                Array_push($array, $val); 
			}
			return $array;
	}
	
	/*
	*获取可输入的商品属性以及值
	*$model $model->input_pids  $model->input_str
	*
	*/
	public function getPropInputValue($model)
	{
			
			$props=explode(',',$model->input_pids);
			$values=explode(',',$model->input_str);
			$array=[];
			$i=0;
			foreach($props as $prop)
			{
				$pid=intval($prop);
				$p=$this->_getProp($pid);
				$v=$values[$i];
				$val=array($p[0],$v);
                Array_push($array, $val); 
				$i++;
			};
			return $array;
	}
	
	    /**
     * Retrive users list based on role
     *
     * @param string $role
     * @param array $columns
     * @return mixed
     */
    public function category( $columns = ['*'])
    {
        $results = $this->model->with('bindprops')->first();
        $this->resetModel();
        return $results->bindprops;
    }

}