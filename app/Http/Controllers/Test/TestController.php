<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goods\GoodsClass;
use Cache;
use App;
use App\Interfaces\TestRepositoryInterface;
use Test;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 #protected $guarded=['parent_id'];
	 public function __construct(TestRepositoryInterface $test)
	 {
		 $this->model=$test;
	 }
	 
	 public function test0()
	 {
	    #$this->test->call();
		$test=App::make('test');
		$test->something();
		#Test::dosomething();
	 }
	 
    public function index()
    {
	    GoodsClass::chunk(2,function($goodsclass){
          foreach ($goodsclass as $post) {
        echo $post->name.'<br>';
    }
});
    }

	 public function create_1()
    {
		$goodsclass=new GoodsClass();
       $goodsclass->name='新大类';
	   $goodsclass->parent_id=0;
	   $goodsclass->order=0;
	   if($goodsclass->save()){
		   echo 'ok';
	   }
	   else
	   {
		   echo 'fail';
	   }
    }
	public function create_2()
	{
		$input = [
    'name'=>'test5',
    'order'=>1,
    'parent_id'=>100

      ];
	  
$goodclass = GoodsClass::create($input);
dd($goodclass);
	}
	
	public function update_1()
	{
		$goodsclass=GoodsClass::where('name','=','大类5')->first();
		$goodsclass->name='大类55';
		if($goodsclass->save())
		{
			echo 'ok';
		}
		else
		{
			echo 'fail';
		}
	}
	public function update_2()
	{
		$goodclass=GoodsClass::where('name','=','大类5')->first();
		$input=['name'=>'大类55'];
		if($goodclass->update($input))
		{
			echo 'okk';
		}
		else
		{
			echo 'fail';
		}
	}
	
	public function delete_1()
	{
		$goodclass=GoodsClass::where('name','=','test5')->first();
		$goodclass->delete();
		if($goodclass->trashed())
		{
			echo 'ok';
		}
		else
		{
			echo 'fail';
		}
	}
	public function get_1()
	{
		$goodsclasses=GoodsClass::Popular()->orderBy('order','desc')->get();
		foreach($goodsclasses as $goodsclass)
		{
			echo $goodsclass->name;
		}
	}
	
	public function get_request(Request $request)
	{
		$input=$request->all();
		dd($input);
	}
	
	public function get_cache($id)
	{

		
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function request(Request $request)
	{
		$name=$request->input('name','default');
		return '名字为：'.$name;
	}
	
	public function request2(Request $request,$name)
	{
		#$name=$request->path();
		return '名字为：'.$name;
	}
	
	public function method(Request $request)
	{
		$method=$request->method();
		return $method;
	}
	
	public function requestall(Request $request)
	{
		$input=$request->all();
		return $input;
	}
	public function cookie(Request $request)
	{
		$input=$request->cookie('Name');
		return $input;
	}
	
	public function getPage()
	{
		$goodsclass=GoodsClass::all();
		dd($goodsclass);
	}
}
