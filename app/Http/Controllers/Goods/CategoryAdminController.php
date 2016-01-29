<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use Former;
use App\Http\Requests;
use Response;
use App\Http\Controllers\AdminController as AdminController;
use App\Interfaces\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;

class CategoryAdminController extends AdminController
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
    public function index(CategoryRequest $request,$parent=0)
    {
		 $parent=$this->model->findOrNew($parent);
		 return $this->theme->of('Goods.category.admin.index',compact('parent'))->render();
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
    public function store(CategoryRequest $request)
    {
      try{
		    $row = $this->model->create($request->all());
			
            $parent_id=$request->get('parent_id',0);
			$parent=$this->model->find($parent_id);
			$parent->is_parent="1";
			$parent->save();
            return Response::json(['message' => 'Category created sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
	     }
	  catch(Exception $e)
	  {
		  return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
	  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryRequest $request,$id)
    {
        if($request->ajax())
		{
			$category=$this->model->findOrNew($id);
			$countall=$this->model->countItem('parent_id',1);
			Former::populate($category);
			return view('Goods.category.admin.show',compact('category','countall'));
		}
		return "123";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryRequest $request,$id)
    {
        $category=$this->model->find($id);
	    $items=$this->model->getProp($category);
		Former::populate($category);
		return view('Goods.category.admin.edit',compact('category','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
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
    public function destroy(CategoryRequest $request,$id)
    {
       if ($this->model->where('parent_id', '=', $id)->exists()) {
            return Response::json(['message' => 'Child menu exists.', 'type' => 'warning', 'title' => 'Warning'], 400);
        }

        try {
            $this->model->delete($id);

            return Response::json(['message' => 'Menu deleted sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }
}
