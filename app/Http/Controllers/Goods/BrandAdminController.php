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
    public function show(BrandRequest $request,$id=2)
    {
		 if ($request->ajax()) {
            $brand = $this->model->findOrNew($id);
			if(!$brand->exists)
			{
				 return view('Goods.brand.admin.new');
			}
			$category=Category::where('parent_id', '=', 1)->get()->lists('name','id')->toArray(); 
            Former::populate($brand);
			return view('Goods.brand.admin.show', compact('brand','category'));
        }
		return 'ddd';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandRequest $request,$id)
    {
       $category=Category::where('parent_id', '=', 1)->get()->lists('name','id')->toArray(); 
        $brand = $this->model->find($id);
        Former::populate($brand);
        return  view('Goods.brand.brand.edit',compact('brand','category'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        try {
            $row = $this->model->update($request->all(), $id);
			   return Response::json(['message' => 'Category updated sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
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
