<?php

namespace App\Http\Controllers\Goods;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController as AdminController;
use Former;
use Response;
use App\Http\Requests\ProductAdminRequest;
use App\Models\Goods\Product as Product;
use App\Interfaces\Goods\ProductRepositoryInterface;
class ProductAdminController extends AdminController
{
	 public function __construct(ProductRepositoryInterface $product)
    {
        $this->model = $product;

        parent::__construct();
    }
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductAdminRequest $request)
    {
      if($request->wantsJson())
	  {
		 $array=DB::table('products')
		 ->join('categories','products.cid','=','categories.id')
		 ->select('products.*','categories.name as cname')
		 ->get();
		  return['data'=>$array];
	  }
       return $this->theme->of('Goods.product.admin.index')->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductAdminRequest $request)
    {
            $product=$this->model->findOrNew(0);
		    Former::populate($product);
			return view('Goods.product.admin.partial.create_init', compact('product'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAdminRequest $request,$id=0)
    {
       try {
            $row = $this->model->update($request->all(), $id);
			   return Response::json(['message' => 'Category updated sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
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
    public function show(ProductAdminRequest $request,$id=0)
    { 

       if($request->ajax())
	   {
		   $product=$this->model->findOrNew($id);
		   if(!$product->exists)
		   {
			   return view('Goods.product.admin.new');
		   }
		    $product=$this->model->getBinds($product);
			$product=$product[0];
            $array=$this->model->getPropEnumValue($product);
			$array_input=$this->model->getPropInputValue($product);
		    Former::populate($product);
			return view('Goods.product.admin.show', compact('product','array','array_input'));
	      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAdminRequest $request, $id)
    {
            $product=$this->model->findOrNew($id);
		    $product=$this->model->getBinds($product);
			$product=$product[0];
            $array=$this->model->getPropEnumValue($product);
			$array_input=$this->model->getPropInputValue($product);
		    Former::populate($product);
			return view('Goods.product.admin.edit', compact('product','array','array_input'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductAdminRequest $request, $id)
    {
		 try {	
              $row = $this->model->update($request->all(), $id);
			   return Response::json(['message' =>'success', 'type' => 'success', 'title' => "name"], 201);
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
    public function destroy(ProductAdminRequest $request, $id)
    {
     try
	 { 
		 $this->model->delete($id);
		 return Response::json(['message'=>'商品已删除','type'=>'success','title'=>'success'],201);
	 }
	  catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }
	
	/*
	* for test
	*
	*
	*/
	public function test(ProductAdminRequest $request)
	{
		 $array=DB::table('products')
		 ->join('categories','products.cid','=','categories.id')
		 ->select('products.*','categories.name as cname')
		 ->get();
		 dd($array);
	}
	
	public function onoff(ProductAdminRequest $request,$id)
	{
		 $product = $this->model->findOrNew($id);
		 $product->status=$product->status=="on"?"off":"on";
		 $product->save();		 	
	}
}
