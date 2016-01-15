<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use Former;
use App\Http\Requests;
use Response;
use App\Interfaces\Goods\BrandRepositoryInterface;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\AdminController as AdminController;
use App\Models\Goods\Brand;
use App\Models\Category;

class BrandAdminController extends AdminController
{
	
	public function __construct(BrandRepositoryInterface $brand)
	{
		$this->model=$brand;
		parent::__construct();
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandRequest $request)
    {
		if($request->wantsJson()){
			$array=$this->model->getBrandAll();
			return ['data'=>$array];
		}
      return $this->theme->of('Goods.brand.admin.index')->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BrandRequest $request)
    {
	 $category=Category::where('parent_id', '=', 1)->get()->lists('name','id')->toArray(); 
	$brand=$this->model->findOrNew(0);
	 Former::populate($brand);
	 return view('Goods.brand.admin.create',compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
       try {
           $attributes = $request->all();
		   $brand = $this->model->create($attributes);
            return Response::json(['message' => 'Brand created sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
            
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BrandRequest $request,Brand $brand)
    {
        if(!$brand->exists)
		{
			if($request->wantsJson())
			{
				return [];
			}
			return view('Goods.brand.admin.new');
		}
		if($request->wantsJson())
		{
			return $brand;
		}
		Former::populate($brnad);
		return 111;
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
    public function destroy(BrandRequest $request, $id)
    {
       try{
		   $this->model->delete($id);
		   return Response::json(['message' => 'Menu deleted sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
		   }
		   catch(Exception $e)
		   {
			   return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
		   }
    }
}
