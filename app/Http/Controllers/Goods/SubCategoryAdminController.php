<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController as AdminController;
use Former;
use App\Http\Requests\CategoryRequest;
use App\Models\Category as Category;
use App\Interfaces\CategoryRepositoryInterface;
class SubCategoryAdminController extends AdminController
{
	public function __construct(CategoryRepositoryInterface $category)
	{
		$this->model=$category;
		parent::__construct();
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $request)
    {
	  $parent_id=$request->get('parent_id',0);
      $category=$this->model->findOrNew(0);
	  $category->parent_id=$parent_id;
	  $parent=$this->model->findOrNew($parent_id);
	  Former::populate($category);
	  return view('Goods.category.admin.sub.create',compact('category','parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryRequest $request,$id)
    {
	  if($id!=1)
	  {
       $category=$this->model->findOrNew($id);
	   Former::populate($category);
	   return view('Goods.category.admin.sub.show',compact('category'));
	  }
	  else
	  {
	$category=$this->model->findOrNew($id);
	   Former::populate($category);
	   return view('Goods.category.admin.show',compact('category'));
	  }
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
}
